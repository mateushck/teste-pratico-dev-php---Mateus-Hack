<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <title>Desafio iClinic</title>
        <meta charset="utf-8">
        <!-- Bootstrap 3.3.7 -->
        <link rel="stylesheet" href="https://adminlte.io/themes/AdminLTE/bower_components/bootstrap/dist/css/bootstrap.min.css">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="https://adminlte.io/themes/AdminLTE/bower_components/font-awesome/css/font-awesome.min.css">
        <!-- Ionicons -->
        <link rel="stylesheet" href="https://adminlte.io/themes/AdminLTE/bower_components/Ionicons/css/ionicons.min.css">
        <!-- Theme style -->
        <link rel="stylesheet" href="https://adminlte.io/themes/AdminLTE/dist/css/AdminLTE.min.css">
        <!-- AdminLTE Skins. Choose a skin from the css/skins
            folder instead of downloading all of them to reduce the load. -->
        <link rel="stylesheet" href="https://adminlte.io/themes/AdminLTE/dist/css/skins/_all-skins.min.css">
    </head>


    <body>
        <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Lista de Dados:</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table class="table table-bordered">
                <tbody><tr>
                  <th style="width: 10px">#</th>
                  <th>Nome</th>
                  <th>Sobrenome</th>
                  <th>CPF</th>
                  <th>E-mail</th>
                  <th>Data Nacimento</th>
                  <th>Genero</th>
                  <th>Tipo Sanguíneo</th>
                  <th>Endereço</th>
                  <th>Cidade</th>
                  <th>Estado</th>
                  <th>CEP</th>
                </tr>
                @foreach ($lista as $paciente)
                    <tr>
                        <td>{{$paciente->id ?? ''}}</td>
                        <td>{{$paciente->nome ?? ''}}</td>
                        <td>{{$paciente->sobrenome ?? ''}}</td>
                        <td>{{$paciente->cpf ?? ''}}</td>
                        <td>{{$paciente->email ?? ''}}</td>
                        <td>{{$paciente->data_nascimento ?? ''}}</td>
                        <td>{{$paciente->genero ?? ''}}</td>
                        <td>{{$paciente->tiposanguineo->descricao ?? ''}}</td>
                        <td>{{$paciente->endereco ?? ''}}</td>
                        <td>{{$paciente->cidade ?? ''}}</td>
                        <td>{{$paciente->estado ?? ''}}</td>
                        <td>{{$paciente->cep ?? ''}}</td>
                    </tr>
                @endforeach
              </tbody></table>
            </div>
          </div>
    </body>
</html>
    
    
    