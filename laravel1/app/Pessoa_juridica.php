<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pessoa_juridica extends Model
{
    protected $tabela = ['name','namefantasia','cnpj','incricao_estadual','incricao_municipal',
    'simples_nacional','pessoa_id'];

}
