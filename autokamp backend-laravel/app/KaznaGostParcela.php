<?php

namespace App;

use App\Kazna;
use Illuminate\Database\Eloquent\Model;

class KaznaGostParcela extends Model
{
    protected $guarded=[];

    public function kazna(){
        return $this->BelongsTo(Kazna::class, 'idKazna');
    }

    public function kontrolor(){
        return $this->BelongsTo(User::class, 'idKontrola');
    }

    public function gostparcela(){
        return $this->BelongsTo(GostParcela::class, 'idGostParcela');
    }
}
