<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class genre extends Model
{
  public function book()
  {
    return $this->hasOne('App\book','genre_id');
  }
}
