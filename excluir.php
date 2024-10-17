<?php

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

//Validação do POST
if(isset($_POST["excluir"])){
    $obCliente->excluir();

    header("location: listagem.php?status=success");
    exit;
}

include("./components/header.php");
include("./components/confirmar-exclusao.php");
include("./components/footer.php");