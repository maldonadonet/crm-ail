<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Leaflet extends Model
{
    
    
    // Relaciones
    public function user() {
        return $this->hasOne('App\User');
    }

    public function quotes() {
        return $this->hasMany('App\Quote');
    }

}
