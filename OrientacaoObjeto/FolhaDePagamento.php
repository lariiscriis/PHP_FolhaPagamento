<?php

    class FolhaDePagamento{
       public $funcionarios = [];
        public function addFuncionario($funcionario){
            $this->funcionarios[] = $funcionario;
        }

        public function listarFuncionario(){
            return  $this->funcionarios;
        }
    }
?>