<!-- CSS especifico deste Component -->
<link rel="stylesheet" href="./css/lista.css" />

<?php

//Mensagem de Status caso tenha sido feita alguma ação
$mensagem = "";
if (isset($_GET["status"])) {
    switch ($_GET["status"]) {
        case "success":
            $mensagem = "<div id='alerta' class='positivo'>Ação executada com sucesso!</div>";
            break;

        case "error":
            $mensagem = "<div id='alerta' class='negativo'>Ação não executada!</div>";
            break;
    }
}

//Configura as informações vindas do banco
$resultados = "";
foreach ($clientes as $cliente) {
    $resultados .= 
    "<tr>
        <td>$cliente->id</td>
        <td>$cliente->nome_cliente</td>
        <td>$cliente->telefone_cliente</td>
        <td>$cliente->endereco_cliente</td>
        <td>$cliente->cidade_cliente</td>
        <td class='btn-tabela'>
            <a href='editar.php?id=$cliente->id'><button class='edit-btn'><i class='fa-regular fa-pen-to-square'></i></button></a>
            <a href='excluir.php?id=$cliente->id'><button class='delete-btn'><i class='fa-regular fa-trash-can'></i></button></a>
        </td>
    </tr>";
}

//Se não houver nenhum dado no banco aparece uma mensagem na tabela
$resultados = strlen($resultados) ? $resultados :   
"<tr>
    <td colspan='6' class='sem-nada'>Nenhum cliente encontrado</td>
</tr>";

?>

<!-- Inicio do Html -->
<!-- Conteudo da listagem.php -->
<main class="lista">

    <!-- Mensagem de Status -->
    <?= $mensagem ?>

    <!-- Script para que a mensagem seja encondida -->
    <script>
        window.onload = function() {
            var alerta = document.getElementById('alerta');
            if (alerta) {
                setTimeout(function() {
                    alerta.style.opacity = 0;
                }, 2000);

                setTimeout(function() {
                    alerta.classList.add('hide');
                }, 3000);
            }
        };
    </script>

    <!-- Botão de redirecionamento para novo cadastro -->
    <div class="btn-novoCliente">
        <a href="cadastrar.php">
            <button>NOVO CLIENTE</button>
        </a>
    </div>

    <!-- Tabela para READ-->
    <section>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>NOME</th>
                    <th>TELEFONE</th>
                    <th>ENDEREÇO</th>
                    <th>Cidade</th>
                    <th>AÇÕES</th>
                </tr>
            </thead>
            <tbody>
                <!-- Exibe dados vindo do banco -->
                <?= $resultados ?>
            </tbody>
        </table>
    </section>

</main>