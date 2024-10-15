<?php 
include "Funcionario.php";
include "FolhaDePagamento.php";

session_start();

if($_SERVER['REQUEST_METHOD'] === 'POST'){
$codigo = $_POST['codigo'];
$nome = $_POST['nome'];
$salario = $_POST['salario'];
$cargo = $_POST['cargo'];
$horas = $_POST['horas'];

$funcionario = new Funcionario($codigo,$nome, $salario, $cargo, $horas);
$folha = new FolhaDePagamento();
$folha->addFuncionario($funcionario);

$_SESSION['funcionarios'][] = $funcionario;
}
$funcionarios = $_SESSION['funcionarios'] ?? [];

?>



<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulário Funcionário</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
   <style>
    body{
        background-color: rgba(253, 237, 239, 0.295);
    }
    .container{
        display: grid;
        place-items: center;
        margin-top: 5em;
        background-color: tomato;
        width: 30em;
        background-color: white;
        padding: 2em;
        border-radius: 3em;
        box-shadow: lightpink 0px 3px 8px;
      }
   
    .resumo{
        display: grid;
        place-items: center;
    }
    .btn{
    background-color: lightpink;
     border: none;
     margin: 0.5em;
    }
    .btn:hover{
        background-color: rgba(253, 76, 103, 0.767);
    }
    .form-control:focus {
    outline: none;
    box-shadow: 0 0 0 0.2rem lightpink;
    border-color: lightpink;
}
 
    .card{
            border-color: rgb(247, 194, 202);
            background-color: #ffb6c14b;
    }
    .card:hover{
        box-shadow: lightpink 0px 3px 8px;
        transform: scale(1.02);
        transition: transform 0.2s ease-in-out;
 
    }
 
   
   </style>
</head>
<body>
<form action="#" method="POST">
<div class="container">
<div class="form-group col-md-12 mb-2">
    <label for="exampleInputEmail1">Código</label>
    <input type="text" name="codigo" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Digite o código: ">
  </div>
<div class="form-group col-md-12">
    <label for="exampleInputEmail1">Nome</label>
    <input type="text" name="nome" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Digite o nome: ">
  </div>
  <div class="form-group col-md-12">
  <label for="exampleInputEmail1">Salário</label>
  <div class="input-group mb-3">
  <div class="input-group-prepend">
    <span class="input-group-text">R$</span>
  </div>
  <input type="text" name="salario" class="form-control" placeholder="Digite o salário: ">
</div>
</div>
 
<div class="row">
    <div class="col-md-6">
        <input type="text" name="cargo" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Digite o cargo: ">
</div>
<div class="col-md-6">
    <input type="text" name="horas" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Horas Trabalhadas: ">
</div>
 
</div>
 
<br>
 
<div class="d-flex justify-content-between">
    <form method="post" action="enviar.php">
        <button class="btn btn-primary" type="submit">Enviar</button>
    </form>

    <form method="post" action="destruirsessao.php">
        <button class="btn btn-primary" type="submit">Apagar Registros</button>
    </form>
</div>

</div>
</form><br>

<div class="resumo">
                <div class="row" style="justify-content: space-between;">
                <?php
                if ($funcionarios) {
                    foreach ($funcionarios as $func) {
                        echo "
                    <div class='col-3'>
                        <div class='card' style='width: 20rem; margin: 1em 1em 1em 1em;'>
                            <div class='card-header'>Informações:</div>
                            <ul class='list-group list-group-flush'>
                                <li class='list-group-item'>Código: " . $func->getCodigo() . "</li>
                                <li class='list-group-item'>Nome: " . $func->getNome() . " </li>
                                <li class='list-group-item'>Salário: " . $func->getSalario() . " </li>
                                <li class='list-group-item'>Cargo: " . $func->getCargo() . "</li>
                                <li class='list-group-item'>Horas Trabalhadas: " . $func->getHr() . "</li>
                                <li class='list-group-item'>Salário Total: " . $func->total($func->getHr(), $func->getSalario()) . "</li>
                            </ul>
                        </div>
                    </div>
                ";
    }
?>
                    </div>

            </div>
            <?php
   } else {
    echo "<div class='resumo'>Nenhum funcionário cadastrado.</div>";
}?>

 
   
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>
 