<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Collection;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
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
}
