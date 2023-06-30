<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Giocatore extends Model{
    protected $table = 'giocatori';

    public function partite() {
        return $this->hasMany(\App\Models\Partite::class, 'giocatore_id');
    }

}
