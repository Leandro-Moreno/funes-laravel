<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Searchable\Searchable;
use Spatie\Searchable\SearchResult;

class AutorInstitucional extends Model implements Searchable
{
  public function getSearchResult(): SearchResult
  {
      $url = route('autor.show', $this->id);
      $title = $this->apellido . " ".$this->nombre . " ".$this->email;
      return new SearchResult(
          $this,
          $title,
          $url
       );
  }
}
