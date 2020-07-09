<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GostKategorija extends Model
{
    protected $guarded=[];

    public function gosti(){
        return $this->hasMany(User::class, 'kategorijaId');
    }
}
