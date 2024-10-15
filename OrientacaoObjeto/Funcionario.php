<?php
class Funcionario{
private $codigo;
private $nome;
private $cargo;
private $salario;
private $hrsTrabalhada;

    //get e set

 public function setCodigo($cd){
     $this->codigo = $cd;
 }
 public function getCodigo(){
    return $this->codigo;
 }

 public function setNome($nm){
    $this->nome = $nm;
}
public function getNome(){
   return $this->nome;
}

public function setCargo($cargo){
    $this->cargo = $cargo;
}
public function getCargo(){
   return $this->cargo;
}

public function setSalario($sl){
    $this->salario = $sl;
}
public function getSalario(){
   return $this->salario;
}

public function setHr($hr){
    $this->hrsTrabalhada = $hr;
}
public function getHr(){
   return $this->hrsTrabalhada;
}

public function __construct( $codigo, $nome, $salario, $cargo, $hrsTrabalhadas) {
   $this->codigo = $codigo;
   $this->nome = $nome;
   $this->salario = $salario;
   $this->cargo = $cargo;
   $this->hrsTrabalhada = $hrsTrabalhadas;
}

public function total($hr, $salario) {

   $salarioHora = $salario / 160;
   return $salario+= $hr * $salarioHora;
}

}
?>