<?php
require("./vendor/autoload.php");

use \App\Entity\Cliente;

$clientes = Cliente::getClientes();

include("./components/header.php");
include("./components/lista.php");
include("./components/footer.php");