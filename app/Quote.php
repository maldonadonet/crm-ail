<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Quote extends Model
{
    // Relaciones
    public function quotes_details() {
        return $this->hasMany('App\Quote_Detail');
    }

    public function tracing() {
        return $this->hasMany('App\Tracing');
    }
    
}
