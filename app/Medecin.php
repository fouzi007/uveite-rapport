<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Medecin extends Model
{
    protected $table = 'users';

    public function formulaire ()
    {
      return $this->hasOne(Formulaire::class,'id','user_id');
    }
}
