<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Partite extends Model{
    protected $table = 'partite';

    public function giocatore() {
        return $this->belongsTo(\App\Models\Giocatore::class, 'giocatore_id');
    }
}
