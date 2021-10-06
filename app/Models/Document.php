<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    use HasFactory;
    protected $fillable = ['docid', 'pos', 'eprintid','format','language','security','license','main','filename','filesize','hash','url', 'registro_id'];

}
