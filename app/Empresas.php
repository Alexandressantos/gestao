<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Empresas extends Model
{

    public function funcionarios() {
        return $this->hasMany('App\Funcionarios', 'cd_emp'); 
    }


    protected $primaryKey = 'cd_emp';
    protected $fillable = ['cd_emp','nome','email','site','logo'];
}
