<?php
//Pagina de DELETE do CRUD

require("./vendor/autoload.php");

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

//Validação do POST para DELETE
if(isset($_POST["excluir"])){

    //Função de Delete
    $obCliente->excluir();

    //Status da ação de delete
    header("location: listagem.php?status=success");
    exit;
}

include("./components/header.php");
include("./components/confirmar-exclusao.php");
include("./components/footer.php");