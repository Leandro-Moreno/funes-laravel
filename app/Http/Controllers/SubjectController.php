<?php

namespace App\Http\Controllers;

use App\Models\Registro;
use App\Models\Subject;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

class SubjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subjects = Subject::withCount('registros')->orderBy('registros_count', 'desc')->paginate(20);
        return view('subjects.index',['subjects' => $subjects]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
            ->with('subjects:id,name,result','author')
            ->whereHas('subjects', function($query) use ($ids) {
            $query->whereIn('id', $ids);
        })->paginate(18);
        return $registros;
    }
    public function subjectIdsRecursiveChildren(Subject $subject)
    {
        $ids = new Collection();
        $ids->push($subject->id);
        if($subject->children->count()>0)
        {
            foreach( $subject->children as $children){
                $ids->push($children->id);
                $ids = $ids->merge($this->subjectIdsRecursiveChildren($children));
            }
        }
        return $ids;
    }
    public function removeChildreKeyIfEmpty($subjects)
    {
       if($subjects->children->count()>0)
       {
           foreach( $subjects->children as $children){
               $this->removeChildreKeyIfEmpty($children);
           }
       }
       else{
           unset($subjects->children);
       }
       return $subjects;
    }
    public function indexApi()
    {
        return cache()->remember('subjectRegistros', 10000, function () {
            $subjects =  Subject::where('id',1)->with('children')->get();

            return [$this->removeChildreKeyIfEmpty($subjects[0])];
        });
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Subject  $subject
     * @return \Illuminate\Http\Response
     */
    public function show(Subject $subject)
    {
        $registros = $subject->registros()->paginate(18);
        $subject->alias = $subject->result;
        $subject->children = Subject::first()->recursive_tree()->get();


        return view('registros.index',[
            'registros' => $registros,
            'title'=> 'Registros por tematica '.$subject->name,
            'subject' => $subject
                ]
        );
    }
    public function showApi(Subject $subject)
    {
        $children = $subject->recursive_tree()->get();
        $subject->alias = $subject->result;
        $subject->children = $children;
//        $registros = $subject->registros()->paginate(18);

        return $subject;
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Subject  $subject
     * @return \Illuminate\Http\Response
     */
    public function edit(Subject $subject)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Subject  $subject
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Subject $subject)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Subject  $subject
     * @return \Illuminate\Http\Response
     */
    public function destroy(Subject $subject)
    {
        //
    }
}
