<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Routes extends Model
{
    use HasFactory;
    protected $appends = ['route'];
    protected $fillable = ['name', 'route_alias','position'];
    public function getRouteAttribute()
    {
        return route($this->route_alias);
    }
}
