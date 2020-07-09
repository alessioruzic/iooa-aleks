<?php

namespace App;

use App\User;
use App\Parcela;
use Illuminate\Database\Eloquent\Model;

class GostParcela extends Model
{
    protected $guarded=[];

    public function gost(){
        return $this->BelongsTo(User::class, 'idGost');
    }

    public function parcela(){
        return $this->BelongsTo(Parcela::class, 'idParcela');
    }
}
