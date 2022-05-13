<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Funcionarios extends Model
{

    public function empresas() {
        return $this->belongsTo('App\Empresas');
    }

    protected $primaryKey = 'cd_funcionario';
    protected $fillable = ['cd_emp','cd_funcionario','nome','sobrenome','email','telefone'];
}
