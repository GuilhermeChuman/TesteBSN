<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LingVagas extends Model
{
    public $timestamps = false;

    protected $fillable = ['id_vaga','id_linguagem'];
}
