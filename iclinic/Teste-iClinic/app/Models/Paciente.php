<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Paciente extends Model
{
    use HasFactory;


    protected $fillable = [
        'id', 'nome', 'sobrenome', 'email', 'data_nascimento' ,
        'genero', 'endereco', 'id_tipo_sanguineo', 
        'cidade', 'cpf', 'cep','estado',
    ];
    
    
    protected $primaryKey = 'id';


    public function tipoSanguineo(){
        return $this->hasOne('App\Models\TipoSanguineo', 'id', 'id_tipo_sanguineo');
    }

}
