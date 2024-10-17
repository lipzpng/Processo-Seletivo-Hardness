<?php
//Pagina de UPDATE do CRUD

require("./vendor/autoload.php");

//Define titulo especifico pois o cadastrar.php usa o mesmo Component para fazer a interface
define("TITLE","EDITAR CLIENTE");

use \App\Entity\Cliente;

//Validação id
if (!isset($_GET["id"]) or !is_numeric($_GET ["id"])) {
    header("location: listagem.php?status=error");
    exit;
}

//Consulta o cliente
$obCliente  = Cliente::getCliente($_GET["id"]);

//Validação do cliente
if(!$obCliente instanceof Cliente) {
    header("location: listagem.php?status=error");
    exit;
}

//Validação do POST para UPDATE
if(isset($_POST["nome"], $_POST["telefone"], $_POST["endereco"])){

    $obCliente->nome_cliente = $_POST["nome"];
    $obCliente->telefone_cliente = $_POST["telefone"];
    $obCliente->endereco_cliente = $_POST["endereco"];
    
    //Função de Update
    $obCliente->atualizar();

    //Status da ação de update
    header("location: listagem.php?status=success");
    exit;
}

include("./components/header.php");
include("./components/formulario.php");
include("./components/footer.php");