<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Registro extends Model
{
    use HasFactory, Searchable;

    /**
     * The name of the "status_changed" column.
     *
     * @var string|null
     */
    const STATUS_CHANGED = 'status_changed';

    protected $appends = ['route'];

    protected $fillable = ['title','eprintid', 'abstract', 'type', 'titulo_publicacion', 'user_deposito_id', 'eprint_status',
        'item_issues_count', 'metadata_visibility', 'refereed', 'pres_type', 'ispublished',
        'user_edicion_id', 'issn', 'isbn', 'editor', 'año_publicacion', 'mes_publicacion',
        'dia_publicacion', 'tipo_de_fecha', 'arbitrado', 'estado_id', 'number', 'pagerange',
        'url_oficial', 'volume', 'numero_identificacion','referencetext','official_url',
        'date_year','date_month','date_day','date_type',
        'user_deposito_id','user_edicion_id','created_at','updated_at','status_changed',
        //event
        'event_title', 'event_type', 'event_location', 'event_dates',
        'publisher','publication'];
    /**
     * Get the route key for the model.
     *
     * @return string
     */
    public function getRouteKeyName()
    {
        return 'eprintid';
    }
    public function getRouteAttribute()
    {
        return route('registroid', $this);
    }
    /**
     * Get the name of the index associated with the model.
     *
     * @return string
     */
    public function searchableAs()
    {
        return ['title','abstract'];
    }
    public function shouldBeSearchable()
    {
        return $this->eprint_status=="inbox"?true:false;
    }
    public function documents()
    {
        return $this->hasMany(Document::class,'registro_id', 'id');
    }
    public function subjects()
    {
        return $this->belongsToMany(Subject::class);
    }
    public function divisions()
    {
        return $this->belongsToMany(Division::class);
    }
    public function authors()
    {
        return $this->belongsToMany(Author::class)->select(array('given', 'family', 'email'));
    }
    public function projects()
    {
        return $this->belongsToMany(Project::class);
    }
    public function folder()
    {
        return $this->hasOne(Folder::class, 'registroid', 'id');
    }

    public function exists()
    {
        $eprint  = $this::where('eprintid', $this->eprintid)->first();
        return !is_null($eprint);
    }
}
