<?php
namespace App\Services;

use App\Models\Author;
use App\Models\Division;
use App\Models\Document;
use App\Models\Folder;
use App\Models\Project;
use App\Models\Registro;
use App\Models\subject;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class ImportService{
    public function scanRegister(){
        $q = 0;
        $routes = Folder::where('status', 0)
            ->orderBy('eprintid')
            ->lazy();
        $routes->each(function ($route) use ($q){
            $folderRoute = $route->route . "/revisions";
            $directories = Storage::allFiles($folderRoute);
            $main = $this->selectMainFromFolder($directories, $folderRoute);
            $route->xmlRevision = $main;
            $eprint = new Registro(['eprintid' => $route->eprintid]);
            if(!$eprint->exists()){
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
            ->lazy();
        $routes->each(function ($route){
            $fileRoute = $route->route . "/revisions/" . $route->xmlRevision . '.xml';
            $xmlContent = $this->loadXmlContent($fileRoute);
            $registro = new Registro($xmlContent);
            if($registro->exists())
                return;
            $registro->save();
//            dd($xmlContent);
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

//        $routes = Folder::where('status', 1)
//            ->orderBy('eprintid')
//            ->chunk(100, function($routes){
//                dd($routes);
////                foreach ($routes as $route)
////                {
////                    $fileRoute = $route->route . "/revisions/" . $route->xmlRevision . '.xml';
////                    $xmlContent = $this->loadXmlContent($fileRoute);
////                    $registro = new Registro($xmlContent);
////                    if($registro->exists()){
////                        dd($registro);
////                        return;
////                    }
////                    $registro->save();
////                    $route->registroid = $registro->id;
//////                    $route->status = 2;
////                    $route->save();
////
////                    if(array_key_exists('subjects', $xmlContent))
////                    {
////                        $subjectArray = $xmlContent['subjects'];
////                        if(!is_String($subjectArray['item'])){
////                            $subjectArray = $subjectArray['item'];
////                        }
////                        $this->createSubjects($subjectArray, $registro);
////                    }
////                    if(!empty($xmlContent['documents'])) {
////                        $this->createDocuments($xmlContent, $registro);
////                    }
////                    $route->status = 3;
////                    $route->save();
////                }
//            });
    }
    private function createDocuments(Array $xmlrevision, Registro $eprint)
    {
        //makeFolder
        $path = 'public/document/'.strval($xmlrevision['eprintid']);
        $xmlrevision['dir'] = $xmlrevision['oldRoute'];
        $this->createRoute($path);
        $documents = array_key_exists('pos',$xmlrevision['documents']['document']) ? $documents = $xmlrevision['documents'] : $documents = $xmlrevision['documents']['document'];
//        dd($documents);
        foreach ($documents as $document)
        {
            if(!array_key_exists('file', $document['files']))
                return;
            if(!array_key_exists('filename', $document['files']['file']))
                return;
            $document['filename'] = $document['files']['file']['filename'];
            $document['filesize'] = $document['files']['file']['filesize'];
            $document['url'] = $document['files']['file']['url'];
            $path = $path . '/' . $document['pos'];
            $oldFileRoute = $xmlrevision['dir'] . '/'.str_pad($document['pos'], 2, "0", STR_PAD_LEFT) . '/' . $document['filename'];
            $newFileRoute = $path . '/' . $document['filename'];
            if(Storage::exists($oldFileRoute) && ! Storage::exists($newFileRoute))
            {
                $validator = Validator::make($document,
                    [
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
                    ]);
                if(!$validator->fails()){
                    $this->createRoute($path);
                    $doc = new Document($validator->validated());
                    //TODO change for move // dejarlo por temas de pruebas de ejecución
                    Storage::copy($oldFileRoute, $newFileRoute);
                    $doc->hash = sha1_file(Storage::path($newFileRoute));
                    $doc->eprintid = $eprint->eprintid;
                    $doc->registro_id = $eprint->id;
                    $doc->url = $newFileRoute;
                    $doc->save();
                }
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

            $email = empty($author['id'])?"":$author['id'];
            $authorsTemp = new Author([
                'given' => $author['name']['given'],
                'family' => $author['name']['family'],
                'email' => $email
            ]);
            $authorsTemp = $authorsTemp->existsOrSave();
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
                    $eprintidArray = explode(".",$eprintidArray[0]);
                    $route = $eprintidArray[1].$eprintidArray[2].$route;
                    $folder = new Folder([
                        'route' => $result,
                        'eprintid' => (int)($route),
                        'processid' => $processid
                    ]);
                    if(! $folder->exists()){
                        $folder->save();
                    }
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
        $userId = Auth::id();
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
