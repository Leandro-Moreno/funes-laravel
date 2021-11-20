<?php

namespace App\Http\Controllers;

use App\Models\Registro;
use App\Models\Subject;
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
        $query = Subject::with('children:id,parent_id')->find($request->input('ids'));
        $ids = new Collection();
        foreach ($query as $item){
            $ids = $ids->merge($this->subjectIdsRecursiveChildren($item));
        }
        $ids = $ids->unique();
        $registros = Registro::select('id','eprintid','title','abstract')->with('subjects:id,name','documents:registro_id,id,thumbnail')->whereHas('subjects', function($query) use ($ids) {
            $query->whereIn('parent_id', $ids);
        })->paginate(60);
        return $registros;
    }
    public function subjectIdsRecursiveChildren(Subject $subject)
    {
        $ids = new Collection();
        if($subject->children->count()>0)
        {
            foreach( $subject->children as $children){
                $ids->push($children->id);
                $ids = $ids->merge($this->subjectIdsRecursiveChildren($children));
            }
        }
        return $ids;
    }
    public function indexApi()
    {
        return cache()->remember('subjectRegistros', 1, function () {
            return Subject::where('id',1)->with('children')->get();
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
