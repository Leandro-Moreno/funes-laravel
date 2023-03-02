<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Folder extends Model
{
    use HasFactory;

    protected $fillable = ['eprintid', 'route', 'status', 'registroid', 'xmlRevision', 'processid'];


    public function register()
    {
        return $this->belongsTo(Registro::class, 'registroid','id');
    }
    public function status()
    {
        return match((int)$this->status){
            0 => 'Agregado',
            1 => 'Escaneado',
            3 => 'Extraido',
            default => 'undefined',
        };
    }
    public function exists()
    {
        $folder  = $this::where('route', $this->route)->first();
        return !is_null($folder);
    }
    public function registro(){
        return $this->belongsTo(Registro::class);
    }
}
