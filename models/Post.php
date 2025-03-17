<?php

class Post {
    // Detalhes do Banco de Dados
    private $conn;
    private $table = 'posts';

    // Propriedades do POST
    public $id;
    public $category_id;
    public $category_name;
    public $title;
    public $body;
    public $author;
    public $created_at;

    // Construtor com Banco de Dados
    public function __contruct($db){
        $this->conn = $db;
    }

    public function read() {
        // Criar query
        $query = 
            'SELECT c.name as category_name,
                p.id,
                p.category_id,
                p.title,
                p.body,
                p.author,
                p.created_at
            FROM
                ' . $this->table . ' p
            LEFT JOIN
                categories c ON p.category_id = c.id
            ORDER BY
                p.created_at DESC';

        // Prepara a declaração
        $stmt = $this->conn-prepare($query);

        // Executa a query
        $stmt->execute();

        return $stmt;
    }

}