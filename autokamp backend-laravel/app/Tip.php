<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tip extends Model
{
    protected $guarded=[];

    public function parcelas(){
        return $this->hasMany(Parcela::class, 'idTipParcela');
    }
}
