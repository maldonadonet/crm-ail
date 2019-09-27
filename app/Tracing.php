<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tracing extends Model
{
    protected $table = 'tracing';

    // Relaciones
    public function quote() {
        return $this->hasOne('App\Quote');
    }
}
