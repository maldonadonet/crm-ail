<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    // Relaciones
    public function user() {
        return $this->hasOne('App\User');
    }

}
