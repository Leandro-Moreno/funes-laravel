<?php
namespace App\Services;

use Illuminate\Support\Facades\App;
use App\Models\Author;
use App\Models\Division;
use App\Models\Document;
use App\Models\Folder;
use App\Models\Project;
use App\Models\Registro;
use App\Models\Subject;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class ImportService{
        protected $documentRules = [
        'format' => ' required',
        'language' => 'required',
        'license' => 'required',
        'main' => 'required',
        'filename' => 'required',
        'filesize' => 'required',
        'docid' => 'required',
        'security' => 'required',
        'pos' => 'required',
        'license' => 'required'
        ];
        protected $registroRules = [
            'title' => 'string',
            'eprintid' => 'required|unique:registros',
            'eprint_status' => 'required',
            'type' => 'string',
            'abstract' => 'string',
            'thesis_type' => 'integer',
            'monograph_type' => 'string',
            'institution' => 'string',
            'department' => 'string',
            'place_of_pub' => 'string',
            'composition' => 'string',
            'data_type' => 'string',
            'exhibitors' => 'string',
            'num_pieces' => 'string',
            'producers' => 'string',
            'conducters' => 'string',
            'accompaniment' => 'string',
            'lyricists' => 'string',
            'refereed' => 'string',
            'ispublished' => 'string',
            'patent_applicant' => 'string',
            'date_year' => 'integer',
            'date_month' => 'string',
            'date_day' => 'string',
            'date_type' => 'string',
            'official_url' => 'string',
            'pages' => 'string',
            'id_number' => 'integer',
            'publisher' => 'string',
            'book_title' => 'string',
            'series' => 'string',
            'volume' => 'string',
            'number' => 'string',
            'isbn' => 'string',
            'pagerange' => 'string',
            'issn' => 'string',
            'publication' => 'string',
            'output_media' => 'string',
            'related_url' => 'string',
            'event_title' => 'string',
            'event_location' => 'string',
            'event_type' => 'string',
            'event_dates' => 'string',
            'pedagogic_type' => 'string',
            'completition_time' => 'string',
            'task_purpose' => 'string',
            'skill_areas' => 'string',
            'learning_level' => 'string',
            'funders' => 'string',
            'referencetext' => 'string',
            'pres_type' => 'string',
            'metadata_visibility' => 'string',
            'item_issues_count' => 'integer',
        ];
    public function scanRegister(){
        $q = 0;
        $routes = Folder::where('status', 0)
            ->orderBy('eprintid')
            ->cursor();
        $routes->each(function ($route) use ($q){
            $folderRoute = $route->route . "/revisions";
            $directories = Storage::allFiles($folderRoute);
            $main = $this->selectMainFromFolder($directories, $folderRoute);
            $route->xmlRevision = $main;
            $validator = Validator::make(['eprintid' => $route->eprintid],['eprintid'=>'unique:registros']);
            if(!$validator->fails()){
                $route->status = 1;
                $q++;
            }
            else{
                $route->status = -1;
            }
            $route->save();
        });
    }
    public function extractRegister()
    {
        $routes = Folder::where('status', 1)
            ->orderBy('eprintid')
            ->cursor();
        $routes->each(function ($route){
            $fileRoute = $route->route . "/revisions/" . $route->xmlRevision . '.xml';
            $xmlContent = $this->loadXmlContent($fileRoute);
            $validator = Validator::make($xmlContent,$this->registroRules);
            if($validator->fails()){
                $route->status = 4;
                $route->save();
                return;
            }
            $validated = $validator->validated();
            $xmlContent['eprintid'] = $validated['eprintid'];
            $registro = new Registro($validated);

            $registro = array_key_exists('date', $xmlContent)?$this->dateSplitColumns($xmlContent['date'], $registro):$registro;
            $registro->save();
            array_key_exists('subjects', $xmlContent)?$this->createSubjects($xmlContent['subjects'], $registro):"";
            array_key_exists('divisions', $xmlContent)?$this->createDivisions($xmlContent['divisions'], $registro):"";
            array_key_exists('creators', $xmlContent)?$this->createAuthors($xmlContent['creators'], $registro):"";
            array_key_exists('projects', $xmlContent)?$this->createProjects($xmlContent['projects'], $registro):"";
            if(!empty($xmlContent['documents'])) {
                $xmlContent['oldRoute'] = $route->route;
                $this->createDocuments($xmlContent, $registro);
            }
            $route->registroid = $registro->id;
            $route->status = 3;
            $route->save();
        });
    }
    public function dateSplitColumns(String $date, Registro $registro){
        if(!empty($date)){
            $explodeDate =explode("-", $date);
            if(count($explodeDate)>=3)
                $registro->date_day = $explodeDate[2];
            if(count($explodeDate)>=2)
                $registro->date_month = $explodeDate[1];
            if(count($explodeDate)>=1)
                $registro->date_year = $explodeDate[0];
        }
        return $registro;
    }

    private function createDocuments(Array $xmlrevision, Registro $eprint)
    {
        //makeFolder
        $mainPath = 'public/document/'.strval($xmlrevision['eprintid']);
        $xmlrevision['dir'] = $xmlrevision['oldRoute'];
        $this->createRoute($mainPath);
        $documents = array_key_exists('pos',$xmlrevision['documents']['document']) ? $documents = $xmlrevision['documents'] : $documents = $xmlrevision['documents']['document'];
        foreach ($documents as $key => $document)
        {
            if(!array_key_exists('file', $document['files']))
                return;
            if(!array_key_exists('filename', $document['files']['file']))
                return;
            $document['filename'] = $document['files']['file']['filename'];
            $document['filesize'] = $document['files']['file']['filesize'];
            $document['url'] = $document['files']['file']['url'];

            $path = $mainPath . '/' . $document['pos'];
            $oldFileRoute = $xmlrevision['dir'] . '/'.str_pad($document['pos'], 2, "0", STR_PAD_LEFT) . '/' . $document['filename'];
            $newFileRoute = $path . '/' . $document['filename'];
            $existsInOldRoute = Storage::exists($oldFileRoute);
            $existsInNewRoute = Storage::exists($newFileRoute);
            if(!$existsInOldRoute){
                return;
            }
            $validator = Validator::make($document, $this->documentRules);
            if(!$validator->fails()){
                if(!$existsInNewRoute){
                    $this->createRoute($path);
                    //TODO change for move // dejarlo por temas de pruebas de ejecuci??n
                    Storage::copy($oldFileRoute, $newFileRoute);
                }
                $doc = new Document($validator->validated());
                $thumbnailOldRoute = $xmlrevision['dir']. "/" . "thumbnails" . "/" . str_pad($document['pos'], 2, "0", STR_PAD_LEFT) . "/preview.png";
                $thumbnailNewRoute = $mainPath . "/" . $document['pos'] . "/preview.png";
                if(Storage::exists($thumbnailOldRoute)) {
                    if( ! Storage::exists($thumbnailNewRoute)){
                        Storage::copy($thumbnailOldRoute, $thumbnailNewRoute);
                    }
                    $doc->thumbnail = $thumbnailNewRoute;
                }
                $doc->hash = sha1_file(Storage::path($newFileRoute));
                $doc->eprintid = $eprint->eprintid;
                $doc->registro_id = $eprint->id;
                $doc->url = $newFileRoute;
                $doc->save();
            }
        }

    }

    public function createRoute(String $path)
    {
        if(!Storage::exists($path)){
            Storage::makeDirectory($path);
        }
    }

    public function createSubjects(Array $subjects, Registro $register)
    {
        if(!is_String($subjects['item'])){
            $subjects = $subjects['item'];
        }
        foreach ($subjects as $subject){
            $subjectTemp = Subject::firstOrCreate(
                ['name' => $subject]
            );

            $register->subjects()->attach($subjectTemp);
        }
    }
    public function createProjects(Array $projects, Registro $register)
    {
        if(!is_String($projects['item'])){
            $projects = $projects['item'];
        }
        foreach ($projects as $project){
            $projectTemp = Project::firstOrCreate(
                ['name' => $project]
            );
            $register->projects()->attach($projectTemp);
        }
    }
    public function createDivisions(Array $divisions, Registro $register)
    {
        if(!is_String($divisions['item'])){
            $divisions = $divisions['item'];
        }
        foreach ($divisions as $division){
            $divisionTemp = Division::firstOrCreate(
                ['name' => $division]
            );

            $register->divisions()->attach($divisionTemp);
        }
    }
    public function createAuthors(Array $authors, Registro $register)
    {
//        dd($authors);
        if(!array_key_exists('name',$authors['item'])){
            $authors = $authors['item'];
        }
        foreach ($authors as $author){

            $email = is_string($author['id'])?$author['id']:"";
            $authorContent = [
                'given' => array_key_exists('given',$author['name'])?$author['name']['given']:'',
                'family' => $author['name']['family'],
                'email' => $email];
            $validator = Validator::make($authorContent, ['email' => 'string', 'given'=>'required|string', 'family'=> 'required|string']);
            if($validator->fails()){
                return;
            }
            $authorsTemp = Author::firstOrCreate($validator->validated());
            $register->authors()->attach($authorsTemp);
        }
    }
    public function findFolder( String $query, int $processid)
    {
        $results = Storage::directories($query);
        $exists = array_filter($results, function($haystack) {
            return stripos($haystack,"revisions");
        });
        if($exists != false){
            return true;
        }
        else{
            foreach ($results as $result)
            {
                if($this->findFolder($result, $processid)){
                    $eprintidArray = array_slice(preg_split("#/#", $result), -3,3 );
                    $route = $eprintidArray[1].$eprintidArray[2];
                    if (App::environment('local')) {
                        $eprintidArray = explode(".",$eprintidArray[0]);
                        $eprintid = $eprintidArray[1].$eprintidArray[2].$route;
                    }
                    else{
                        $eprintid = $eprintidArray[0].$route;
                    }

                    $folderContent = [
                        'route' => $result,
                        'eprintid' => (int)($eprintid),
                        'processid' => $processid
                    ];
                    $validator = Validator::make($folderContent, ['route' => 'unique:folders', 'eprintid'=>'required', 'processid'=> 'required']);
                    if ($validator->fails()){
                        return;
                    }
                    $folder = new Folder( $validator->validated() );
                    $folder->save();
                }
            }
        }
    }

    public function identifyFoldersToExplore()
    {
        $processid = 1;
        $ultimo = Folder::latest()->first('processid');
        if(isset($ultimo)){
            $processid = $ultimo->processid + 1;
        }
        return $this->findFolder("hereforimport", $processid);
    }



    private function selectMainFromFolder(Array $files, String $folderRoute): int
    {
        $xmlNumber = Array();
        foreach ($files as $file)
        {
            $file = explode($folderRoute . "/", $file);
            $file = $file[1];
            $file = explode(".xml", $file);
            array_push($xmlNumber, $file[0]);
        }
        return max($xmlNumber);
    }

    private function loadXmlContent(String $route): Array
    {
        $xmlString = Storage::get($route);
        $xmlObject = simplexml_load_string($xmlString);
        $json = json_encode($xmlObject);
        $content = json_decode($json, true);
        $userId = User::where('old_id',$content['userid'])->pluck('id')->first();
        $content['user_deposito_id'] = $userId;
        $content['user_edicion_id'] = $userId;
        $content['created_at'] = $this->modifyDate(array_key_exists('datestamp', $content)? $content['datestamp'] : $content['lastmod']);
        $content['updated_at'] = $this->modifyDate($content['lastmod']);
        $content['status_changed'] = $this->modifyDate($content['status_changed']);
        return $content;
    }


    public function modifyDate(String $date): String
    {
        $strDate = str_replace("T"," ",$date);
        $strDate = str_replace("Z","",$strDate);
        $dateTime = Carbon::createFromFormat('Y-m-d H:i:s', $strDate);
        return $dateTime->toDateTimeString();
    }
}
