<?php

class Database {
    // Parâmetros do Banco de Dados

    private $config = [
        'database' => [
            'host' => 'localhost',
            'port' => '3006',
            'dbname' => 'myblog',
            'charset' => 'utf8'
        ]
    ];

    private $username = 'root';
    private $password = 'root';


    // Conexão com o banco de dados

    public function connect($config, $username, $password) {
        $this->conn = null;
        $dsn = ('mysql:' . http_build_query($config, '', ';'));

        try{
            $this->conn = new PDO($dsn, $username, $password, [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
            ]);
        }catch (PDOExeption $e){
            echo 'Erro de conexão: ' . $e->getMessage();
        }

        return $this->conn;
    }
}