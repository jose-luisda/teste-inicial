<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pessoa extends Model
{
    protected $tabela = ['nome','pis','ctps','cnh',
    'tipo_tel','rg','cpf','telefone','email','tipo_email','titulo','passaporte','operadora'];
}
