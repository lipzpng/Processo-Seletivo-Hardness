<?php
//Pagina de CREATE do CRUD

require("./vendor/autoload.php");

//Define titulo especifico pois o editar.php usa o mesmo Component para fazer a interface
define("TITLE","CADASTRAR CLIENTE");

use \App\Entity\Cliente;

//Validação do POST
if(isset($_POST["nome"], $_POST["telefone"], $_POST["endereco"], $_POST["cidade"])){
    if (empty($_POST["cidade"])) {
        // Exibe uma mensagem de erro e interrompe o processo de inserção
        echo "<script>alert('O campo cidade não pode estar vazio.');</script>";
        
    } else {
        $obCliente = new Cliente;

        $obCliente->nome_cliente = $_POST["nome"];
        $obCliente->telefone_cliente = $_POST["telefone"];
        $obCliente->endereco_cliente = $_POST["endereco"];
        $obCliente->cidade_cliente = $_POST["cidade"];

        // echo "<pre>"; print_r($obCliente); echo "</pre>"; exit;
        
        //Função de Post
        $obCliente->cadastrar();

        //Status da ação de post
        header("location: listagem.php?status=success");
        exit;
    }
}

include("./components/header.php");
include("./components/formulario.php");
include("./components/footer.php");