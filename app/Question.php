<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $table = 'questions';

    public function medecin ()
    {
      return $this->hasOne(Medecin::class,'id','user_id');
    }
}
