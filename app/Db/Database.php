<?php

namespace App\Db;

use \PDO;
use \PDOException;
use \PDOStatement;

class Database {
    
    /**
     * Host da conexão com o banco
     * @var string
     */
    const HOST = "localhost";

    /**
     * Nome do banco
     * @var string
     */
    const NAME = "clientes_hardness_db";

    /**
     * Usuario do banco
     * @var string
     */
    const USER = "root";

    /**
     * Senha do banco
     * @var string
     */
    const PASS = "";

    /**
     * Nome da tabela
     * @var string
     */
    private $table;


    /**
     * Instancia de conexão com o banco
     * @var PDO
     */
    private $connection;

    /**
     * Define a tabela, instacia e conexão
     * @var string
     */
    public function __construct($table = null) {
        $this->table = $table;
        $this->setConnection();
    }

    private function setConnection() {
        try{
            $this->connection = new PDO("mysql:host=".self::HOST.";dbname=".self::NAME,self::USER,self::PASS);
            $this->connection->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        }catch(PDOException $e){
            die("ERROR: ".$e->getMessage());
        }
    }

    /**
     * Executa as queries dentro do banco
     * @param string
     * @param array
     * @return PDOStatement
     */
    public function execute($query,$params = []) {
        try{
            $statment = $this->connection->prepare($query);
            $statment->execute($params);
            return $statment;
        }catch(PDOException $e){
            die("ERROR: ".$e->getMessage());
        }
    }

    /**
     * Insert no banco
     * @param array $values [ field => value ]
     * @return integer Id inserido
     */
    public function insert($values) {

        //Dados da Query
        $fields = array_keys($values);
        $binds = array_pad([], count($fields),"?");

        //Monta a Query
        $query = "INSERT INTO ".$this->table." (".implode(",",$fields).") VALUES (".implode(",",$binds).")";

        //Executa o insert
        $this->execute($query,array_values($values));

        //Retorna o Id inserido
        return $this->connection->lastInsertId();
    }

     /**
     * Responsavel por executar uma consulta
     * @param string $where
     * @param string $order
     * @param string $limit
     * @return PDOStatement
     */
    public function select($where = null, $order = null, $limit = null, $fields = "*") {
        //Dados da query
        $where = strlen($where) ? "WHERE ".$where : "";
        $order = strlen($order) ? "ORDER BY ".$order : "";
        $limit = strlen($limit) ? "LIMIT ".$limit : "";

        //Monta a query
        $query = "SELECT ".$fields." FROM ".$this->table." ".$where." ".$order." ".$limit;

        //Executa a query
        return $this->execute($query);
    }

    /**
     * Executa atualizações no banco
     * @param string $where
     * @param array $values [ field => value ]
     * @return boolean
     */
    public function update($where, $values) {
        //Dados da query
        $fields = array_keys($values);

        //Monta a query
        $query = "UPDATE ".$this->table." SET ".implode("=?,",$fields)."=? WHERE ".$where;

        //Executa query
        $this->execute($query,array_values($values));
        return true;
    }

    /**
     * Exclui dados do banco
     * @param string $where
     * @return boolean
     */
    public function delete($where) {
        //Monta query
        $query = "DELETE FROM ".$this->table." WHERE ".$where;

        $this->execute($query);
        return true;
    }
}