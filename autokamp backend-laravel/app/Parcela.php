<?php

namespace App;

use App\Tip;
use App\Opis;
use App\GostParcela;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Parcela extends Model
{
    protected $guarded=[];

    public function tip(){
        return $this->belongsTo(Tip::class, 'idTipParcela');
    }

    public function opis(){
        return $this->belongsTo(Opis::class, 'idOpisParcela');
    }

    public function gost_parcelas(){
        return $this->hasMany(GostParcela::class, 'idParcela');
    }
}
