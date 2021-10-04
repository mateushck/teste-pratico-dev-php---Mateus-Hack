<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use \App\Models\Paciente;
use File;

class BancoDeSangueController extends Controller
{
    //

    private function csvToArray($filename = '', $delimiter = ',')
    {
        if (!file_exists($filename) || !is_readable($filename))
            return false;

        $header = null;
        $data = array();
        if (($handle = fopen($filename, 'r')) !== false)
        {
            while (($row = fgetcsv($handle, 1000, $delimiter)) !== false)
            {
                if (!$header)
                    $header = $row;
                else
                    $data[] = array_combine($header, $row);
            }
            fclose($handle);
        }

        return $data;
    }

    public function lista(){

        $lista = \App\Models\Paciente::orderBy('id')->get();
        return view('lista', [
            'lista' => $lista,
          ]);

    }



    public function cadastra(){

        $erros= [];

        $rules = [
            'nome' => 'required|max:50|string',
            'sobrenome' => 'required|max:50|string',
            'email' => 'email|max:150',
            'datanascimento' => 'date',
            'genero' => 'max:1|string',
            'endereco' => 'max:200|string',
            'tiposanguineo' => 'required|string',
            'cidade' => 'max:50|string',
            'cpf' => 'max:11|string',
            'cep' => 'max:9|string',
            'estado' => 'max:2|string',
        ];
        //"/mnt/c/Users/Usuário/desafio-iClinic/iclinic/Teste-iClinic/public/../../../pacientes2.csv"
        $file = public_path('../../../pacientes2.csv');
       
        $customerArr = $this->csvToArray($file);
        $paciente = new \App\Models\Paciente;

        //apaga todos os registros e re-organiza.
        Paciente::truncate();

        //Lista os Tipos para salvar com a constraints.
        $TipoSanguineos = \App\Models\TipoSanguineo::orderBy('id')->get();
       
        for ($i = 0; $i < count($customerArr); $i ++)
        {
            $validador = Validator::make($customerArr[$i], $rules);
            if($validador->fails()){
               //Erro

              $erros[]=  " Linha: ".strval($i)." Nome:". $customerArr[$i]['nome']." ".$customerArr[$i]['sobrenome']." \n\r";
            }else{
                try {

                    $paciente = new \App\Models\Paciente;
                    $paciente->nome = $customerArr[$i]['nome'];
                    $paciente->sobrenome = $customerArr[$i]['sobrenome'];
                    $paciente->email = $customerArr[$i]['email'];
                    $paciente->data_nascimento = $customerArr[$i]['datanascimento'];
                    $paciente->genero = $customerArr[$i]['genero'];
                    for ($a = 0; $a < count($TipoSanguineos); $a ++){
                        if($TipoSanguineos[$a]['descricao']== $customerArr[$i]['tiposanguineo']){
                            $paciente->id_tipo_sanguineo = $TipoSanguineos[$a]['id'];  
                        }
                    }
                    $paciente->endereco = $customerArr[$i]['endereco'];
                    $paciente->cidade = $customerArr[$i]['cidade'];
                    $paciente->cep = $customerArr[$i]['cep'];
                    $paciente->estado = $customerArr[$i]['estado'];
                    $paciente->cpf = $customerArr[$i]['cpf'];
                    $paciente->save();
                } catch (Exception $e) {
                    echo 'Exceção capturada: ',  $e->getMessage(), "\n";
                }
            }
        }
        if($erros = []){
            return 'Importação Finalizada sem erros!'; 
        }else{
            return 'Importação Finalizada com  erros!'; 
        }
        

    }
}
