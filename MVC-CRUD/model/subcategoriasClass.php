<?php
    class Subcategorias{
        private $codigo;
        private $nome;
        private $categoria;
        private $status;

        public function __construct(){
        }

        // Retorna o código
        public function getCodigo(){
            return $this->codigo;
        }

        // Recebe o código
        public function setCodigo($codigo){
            return $this->codigo = $codigo;
        }

        // Retorna o nome
        public function getNome(){
            return $this->nome;
        }

        // Recebe o nome
        public function setNome($nome){
            return $this->nome = $nome;
        }

        // Retorna a categoria
        public function getCategoria(){
            return $this->categoria;
        }

        // Recebe o categoria
        public function setCategoria($categoria){
            return $this->categoria = $categoria;
        }

         // Retorna o status
         public function getStatus(){
            return $this->status;
        }

        // Recebe o status
        public function setStatus($status){
            return $this->status = $status;
        }
    }
?>