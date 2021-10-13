<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Searchable\Searchable;
use Spatie\Searchable\SearchResult;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Author extends Model implements Searchable
{
    use HasFactory;
    protected $fillable = ['given','family', 'email'];

    public function registros()
    {
        return $this->belongsToMany(Registro::class);
    }
    public function getSearchResult(): SearchResult
    {
        $url = route('autor.show', $this->id);
        $title = $this->apellido . " " . $this->nombre . " " . $this->email;
        return new SearchResult(
            $this,
            $title,
            $url
        );
    }
    public function existsOrSave()
    {
        $attributes = [
            'given' => $this->given,
            'family' => $this->family
        ];
        if(is_string($this->email)) {
            $attributes['email'] = $this->email;
        }
        if(is_string($attributes)) {
            dd($attributes);
        }
        $author  = $this::firstOrCreate($attributes);
        return $author;
    }
}
