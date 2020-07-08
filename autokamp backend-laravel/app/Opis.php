<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Opis extends Model
{
    protected $guarded=[];

    public function parcelas(){
        return $this->hasMany(Parcela::class, 'idOpisParcela');
    }
}
