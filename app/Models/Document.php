<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\URL;

class Document extends Model
{
    use HasFactory;
    protected $fillable = ['docid', 'pos', 'eprintid','format','language','security','license','main','filename','filesize','hash','url', 'registro_id'];
}
