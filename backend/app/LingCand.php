<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LingCand extends Model
{
    public $timestamps = false;

    protected $fillable = ['id_cand','id_linguagem'];
}
