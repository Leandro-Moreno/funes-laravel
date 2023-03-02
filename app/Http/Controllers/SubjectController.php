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
        $subjects = Subject::all();
        return response()->json([
            'subjects' => $subjects
        ]);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:subjects,name|max:255',
            'parent_id' => 'nullable|exists:subjects,id',
            'result' => 'required|max:255'
        ]);

        $subject = Subject::create($request->all());

        return response()->json([
            'message' => 'Subject created successfully',
            'subject' => $subject
        ]);
    }

    public function showArray(Request $request)
    {
        $ids = $this->getSubjectIdsRecursiveChildren($request->input('ids'));

        $registros = $this->getRegistrosBySubjectIds($ids);

        return $registros;
    }

    private function getSubjectIdsRecursiveChildren(array $ids): Collection
    {
        $subjectIds = new Collection();

        $query = Subject::with('children:id,parent_id')->find($ids);

        foreach ($query as $item) {
            $subjectIds = $subjectIds->merge($this->getSubjectIdsRecursiveChildren($item));
        }

        return $subjectIds->unique();
    }

    private function getRegistrosBySubjectIds(Collection $ids): LengthAwarePaginator
    {
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
        )->with('subjects:id,name,result', 'author')->whereHas('subjects', function ($query) use ($ids) {
            $query->whereIn('id', $ids);
        })->orderBy('updated_at', 'desc')->paginate(18);

        return $registros;
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
        $registros = $this->getRegistrosBySubject($subject);

        $subject->alias = $subject->result;
        $subject->children = $this->getRecursiveTreeForSubject(Subject::first());

        return response()->json([
            'registros' => $registros,
            'title' => 'Registros por tematica '.$subject->name,
            'subject' => $subject
        ]);
    }


    /**
     * Get registros related to the subject
     *
     * @param Subject $subject
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    private function getRegistrosBySubject(Subject $subject)
    {
        return $subject->registros()
            ->paginate(18);
    }

    /**
     * Get the recursive tree of subjects
     *
     * @param Subject $subject
     * @return \Illuminate\Database\Eloquent\Collection
     */
    private function getRecursiveTreeForSubject(Subject $subject)
    {
        return $subject->recursive_tree()->get();
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
        $subjects = Subject::all();

        return response()->json([
            'subject' => $subject,
            'subjects' => $subjects
        ]);
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
        $request->validate([
            'name' => 'required|unique:subjects,name,'.$subject->id.'|max:255',
            'parent_id' => 'nullable|exists:subjects,id',
            'result' => 'required|max:255'
        ]);

        $subject->update($request->all());

        return response()->json([
            'message' => 'Subject updated successfully',
            'subject' => $subject
        ]);
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Subject  $subject
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Subject $subject)
    {
        $newParentId = $request->input('new_parent_id');

        if ($newParentId) {
            // Reassign children to new parent
            $newParent = Subject::findOrFail($newParentId);
            $subject->children()->update(['parent_id' => $newParentId]);
        }

        // Delete the subject
        $subject->delete();

        return response()->json(['message' => 'Subject deleted successfully']);
    }

}
