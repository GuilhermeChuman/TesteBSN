<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vagas extends Model
{
    public $timestamps = false;

    protected $fillable = ['Funcao'];
}
