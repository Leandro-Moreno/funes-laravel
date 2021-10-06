<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Registro extends Model
{
    use HasFactory;

    /**
     * The name of the "status_changed" column.
     *
     * @var string|null
     */
    const STATUS_CHANGED = 'status_changed';

    protected $fillable = ['title','eprintid', 'abstract', 'type', 'titulo_publicacion', 'user_deposito_id',
        'user_edicion_id', 'issn', 'isbn', 'editor', 'año_publicacion', 'mes_publicacion',
        'dia_publicacion', 'tipo_de_fecha', 'arbitrado', 'estado_id', 'number', 'pagerange',
        'url_oficial', 'volume', 'numero_identificacion','referencetext','official_url',
        'metadata_visibility','date','date_type','user_deposito_id','user_edicion_id','created_at','updated_at','status_changed'];
    /**
     * Get the route key for the model.
     *
     * @return string
     */
    public function getRouteKeyName()
    {
        return 'eprintid';
    }
}
