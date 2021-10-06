<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Folder extends Model
{
    use HasFactory;
    protected $fillable = ['eprintid', 'route', 'scanned', 'extracted', 'xmlRevision'];
    /**
     * @var mixed|string
     */
    private String $route;
}
