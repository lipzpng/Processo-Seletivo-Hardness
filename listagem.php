<?php
//Pagina de READ do CRUD

require("./vendor/autoload.php");

use \App\Entity\Cliente;

//Função de get para exibir dados do banco
$clientes = Cliente::getClientes();

include("./components/header.php");
include("./components/lista.php");
include("./components/footer.php");