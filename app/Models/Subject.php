<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'result', 'depositable','showable','parent_id'];
    protected $appends = ['route'];
    public function scopeChildless($q)
    {
        $q->has('child', '=', 0);
    }
    public function registros()
    {
        return $this->belongsToMany(Registro::class)->where('eprint_status', 'archive');
    }
    public function parent()
    {
        return $this->belongsTo(Subject::class,'parent_id', 'id');
    }
    public function childrenCount() {
        return $this->hasMany(Subject::class, 'parent_id');
    }

    public function children() {
        return $this->hasMany(Subject::class, 'parent_id')->select('id', 'result as label','parent_id')->withCount('childrenCount')->with(['children' => function ($q) {
            $q->select('id', 'result as label','parent_id');
        }]);
    }
    public function recursive_tree(){
        return $this->children()->with('recursive_tree');
    }
    public function getRouteAttribute()
    {
        return route('subject.show', $this);
    }

}
