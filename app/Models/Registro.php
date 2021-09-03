<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Registro extends Model
{
    use HasFactory;

    protected $fillable = ['nombre', 'resumen', 'tipo_de_documento', 'titulo_publicacion', 'user_deposito_id',
        'user_edicion_id', 'documento', 'issn', 'isbn', 'editor', 'año_publicacion', 'mes_publicacion',
        'dia_publicacion', 'tipo_de_fecha', 'arbitrado', 'estado_id', 'numero_serie', 'pagina_de', 'pagina_hasta',
        'url_oficial', 'volumen', 'numero_identificacion'];
}
