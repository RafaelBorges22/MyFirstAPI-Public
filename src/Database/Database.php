<?php

namespace Alunos\Aula0409\src\Database;


use PDO;
use PDOException;
 class Database{
    private $host = "127.0.0.1";
    private $db = "my_database";
    private $user = "root";
    private $pass = "root";
    private $charset = "utf8mb4";
    private $path = 'banco_de_dados';
 

    public function conecta(){
        $dsn = "mysql:host= $this->host; dbname=$this->db;charset=$this->charset";
        try {
            $pdo = new PDO ($dsn, $this->user, $this->pass,[
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                PDO::ATTR_EMULATE_PREPARES => false
        ]);
        //echo"conexão bem-sucedida"; TESTE
        return $pdo;
        } catch (\PDOException $e) {
            echo "Erro ao conectar: ". $e->getMessage();
        }
    }

    public function conectar(){
        try {
            $pdo = new PDO ("sqlite: $this->path") ;
            echo "Conexão bem-sucedida com SQLite";
        } catch (PDOException $e) {
            echo "Erro ao conectar". $e->getMessage();
        }
    }
}

//Deixar comentado por enquanto;
//$con = new Database();
//$con->conectar();