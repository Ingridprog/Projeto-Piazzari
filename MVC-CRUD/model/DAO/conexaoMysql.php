<?php
    class conexaoMysql{

        private $server;
        private $user;
        private $password;
        private $database;

        // Construtor
        public function __construct(){
            $this->server = "localhost";
            $this->user = "root";
            $this->password = "bcd127";
            $this->database = "dbprojetopizzariafrajolas";
        }

        public function conectDatabase(){

            try{
                $conexao = new PDO('mysql:host='.$this->server.';dbname='.$this->database,
                    $this->user, $this->password);
                return $conexao;
            }catch(PDOException $erro){
                echo("Erro de conexão com o BD 
                    <br/>Linha do ERRO:".$erro->getLine()."
                    <br/>Mensagem do ERRO:".$erro->getMessage()
                    ); 
                die();
            }  
        }
    }

?>