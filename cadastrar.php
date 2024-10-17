<?php
//Pagina de CREATE do CRUD

require("./vendor/autoload.php");

//Define titulo especifico pois o editar.php usa o mesmo Component para fazer a interface
define("TITLE","CADASTRAR CLIENTE");

use \App\Entity\Cliente;

//Validação do POST
if(isset($_POST["nome"], $_POST["telefone"], $_POST["endereco"])){
    $obCliente = new Cliente;

    $obCliente->nome_cliente = $_POST["nome"];
    $obCliente->telefone_cliente = $_POST["telefone"];
    $obCliente->endereco_cliente = $_POST["endereco"];
    
    //Função de Post
    $obCliente->cadastrar();

    //Status da ação de post
    header("location: listagem.php?status=success");
    exit;
}

include("./components/header.php");
include("./components/formulario.php");
include("./components/footer.php");