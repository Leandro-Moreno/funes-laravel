<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Subject;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\Registro;
use App\Models\User;
use Spatie\Searchable\Search;

class RegistroApiController extends Controller
{

    public function latest()
    {
        $registros = Registro::where('eprint_status', 'archive')
            ->select(
                'title',
                'eprintid',
                'id',
                'date_year',
                'event_location',
                'publication',
                'volume',
                'type',
                'issn',
                'isbn',
                'publisher as editor',
                'number',
                'pagerange as page',
                'created_at',
                'updated_at'
            )
            ->where(
                'created_at', '>=', Carbon::now()->subDays(80)->firstOfMonth()->toDateTimeString()
            )
            ->with('author')
            ->latest()->paginate(18);
        return response()->json([
            'registro' => $registros
        ]);
    }
    public function registroFilters(Request $request)
    {
        $query = Subject::with('children:id,parent_id')
            ->find($request->input('ids'));
        $ids = new Collection();
        foreach ($query as $item){
            $ids = $ids->merge($this->subjectIdsRecursiveChildren($item));
        }
        $ids = $ids->unique();
        $registros = Registro::select(
            'title',
            'eprintid',
            'id',
            'date_year',
            'event_location',
            'publication',
            'volume',
            'type',
            'issn',
            'isbn',
            'publisher as editor',
            'number',
            'pagerange as page',
            'created_at',
            'updated_at'
        )
            ->with('subjects:id,name','author');
        $registros
            ->whereHas('subjects', function($query) use ($ids) {
                $query->whereIn('parent_id', $ids);
            })->paginate(18);
        return $registros;
    }
    public function showArray(Request $request)
    {
        $ids = new Collection();
        $query = Subject::with('children:id,parent_id')
            ->find($request->input('ids'));
        foreach ($query as $item){
            $ids = $ids->merge($this->subjectIdsRecursiveChildren($item));
        }
        $ids = $ids->unique();
        $registros = Registro::select(
            'title',
            'eprintid',
            'id',
            'date_year',
            'event_location',
            'publication',
            'volume',
            'type',
            'issn',
            'isbn',
            'publisher as editor',
            'number',
            'pagerange as page',
            'created_at',
            'updated_at'
        )
            ->with('subjects:id,name','author')
            ->whereHas('subjects', function($query) use ($ids) {
                $query->whereIn('parent_id', $ids);
            })->paginate(18);
        return $registros;
    }
    public function simpleSearch(Request $request){
        $searchResult = (new Search())->registerModel(Registro::class, 'title')
            ->perform($request->input('query'));

        return response()->json([
            'registro' => $searchResult
        ]);
    }
}
