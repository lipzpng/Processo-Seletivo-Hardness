<!-- CSS especifico deste Component -->
<link rel="stylesheet" href="./css/confirmar-exclusao.css" />

<!-- Inicio do Html -->
<!-- Conteudo da excluir.php e editar.php -->
<main class="confirmar-exclusao">

    <h2>EXCLUIR CLIENTE</h2>

    <!-- Form de confirmação de exclusão -->
    <form method="post">
        <p>Você deseja realmente excluir o cliente <strong><?= $obCliente->nome_cliente ?></strong>?</p>

        <section>
            <a href="listagem.php">
                <button type="button">CANCELAR</button>
            </a>
            <button type="submit" name="excluir">EXCLUIR</button>
        </section>
    </form>

</main>