<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class author extends Model
{
  public function book()
  {
    return $this->hasOne('App\book','author_id');
  }
}
