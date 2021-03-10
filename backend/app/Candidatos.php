<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Candidatos extends Model
{
    public $timestamps = false;

    protected $fillable = ['nome','cpf','telefone','endereco','email'];
}
