<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Author;
use App\Models\Subject;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use App\Models\Registro;
use App\Models\User;
use Illuminate\Support\Collection;
use Spatie\Searchable\ModelSearchAspect;
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
        foreach ($query as $item) {
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
            ->with('subjects:id,name', 'author');
        $registros
            ->whereHas('subjects', function ($query) use ($ids) {
                $query->whereIn('parent_id', $ids);
            })->paginate(18);
        return $registros;
    }

    public function showArray(Request $request)
    {
        $ids = new Collection();
        $query = Subject::with('children:id,parent_id')
            ->find($request->input('ids'));
        foreach ($query as $item) {
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
            ->with('subjects:id,name', 'author')
            ->whereHas('subjects', function ($query) use ($ids) {
                $query->whereIn('parent_id', $ids);
            })->paginate(18);
        return $registros;
    }

    public function simpleSearch(Request $request)
    {
//        $searchResult = (new Search())
//            ->registerModel(Registro::class, function(ModelSearchAspect $modelSearchAspect){
//                $modelSearchAspect->addSearchableAttribute('title')
//                ->with('subjects:id,name','author');
//            });
//        //validate that $request->input('subjectId') is not empty
//        $searchResult = $searchResult->perform($request->input('query'));
//        dd($searchResult);
//        return response()->json([
//            'registro' => $searchResult
//        ]);


        $registrosResult = Registro::select(
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
        );
        if ($request->has('subjectId')) {
            $ids = new Collection();
            $queryIds = explode(',', $request->input('subjectId'));
            $subjects = Subject::with('children:id,parent_id')
                ->whereIn('id', $queryIds)
                ->get();
            foreach ($subjects as $item) {
                $ids = $ids->merge($this->subjectIdsRecursiveChildren($item));
            }
            $ids = $ids->unique();
            $registrosResult = $registrosResult->whereHas('subjects', function ($query) use ($ids) {
                $query->whereIn('id', $ids);
            });
        }

        $registrosResult = $registrosResult->where(function (Builder $query) use($request){
           return $query->where('title', 'like', '%' . $request->input('query') . '%')
           ->orWhere('publication', 'like', '%' . $request->input('query') . '%')
           ->orWhere('event_location', 'like', '%' . $request->input('query') . '%');
        });

        $registrosResult = $registrosResult
            ->with('subjects:id,name', 'author')
            ->paginate(18);
        return response()->json([
            'results' => $registrosResult
        ]);
    }
}
