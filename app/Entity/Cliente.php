<?php

namespace App\Entity;

use \App\Db\Database;
use \PDO;

class Cliente{
   
    /**
     * Identificador do cliente
     * @var integer
     */
    public $id;

    /**
     * Nome do cliente
     * @var string
     */
    public $nome_cliente;

    /**
     * Numero de telefone do cliente
     * @var string
     */
    public $telefone_cliente;

    /**
     * Endereço do cliente
     * @var string
     */
    public $endereco_cliente;    
    
    /**
    * Endereço do cliente
    * @var string
    */
   public $cidade_cliente;

    /**
     * Cadastrar novo cliente no banco
     * @return void
     */
    public function cadastrar() {
        //Insere cliente no banco
        $obDatabase = new Database("clientes_tb");
        $this->id = $obDatabase->insert([
            "nome_cliente"=> $this->nome_cliente,
            "telefone_cliente"=> $this->telefone_cliente,
            "endereco_cliente"=> $this->endereco_cliente,
            "cidade_cliente"=> $this->cidade_cliente
        ]);

        return true;
    }

    /**
     * Atualiza cliente no banco
     * @return boolean
     */
    public function atualizar() {
        return (new Database("clientes_tb"))->update("id = ".$this->id,[
            "nome_cliente"=> $this->nome_cliente,
            "telefone_cliente"=> $this->telefone_cliente,
            "endereco_cliente"=> $this->endereco_cliente,
            "cidade_cliente"=> $this->cidade_cliente

        ]);
    }

    /**
     * Exclui o cliente
     * @return boolean
     */
    public function excluir() {
        return (new Database("clientes_tb"))->delete("id = ".$this->id);
    }

    /**
     * Responsavel obter clientes do banco
     * @param string $where
     * @param string $order
     * @param string $limit
     * @return array
     */
    public static function getClientes($where = null, $order = null, $limit = null) {
        return (new Database("clientes_tb"))
        ->select($where, $order, $limit)
        ->fetchAll(PDO::FETCH_CLASS,self::class);
    }

    /**
     * Busca cliente com base no Id
     * @param integer $id
     * @return Cliente
     */
    public static function getCliente($id) {
        return (new Database("clientes_tb"))
        ->select("id = ".$id)
        ->fetchObject(self::class);
    }
}