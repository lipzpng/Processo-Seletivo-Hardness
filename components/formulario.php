<link rel="stylesheet" href="./css/formulario.css" />

<?php
$obCliente = $obCliente ?? (object)[
    'nome_cliente' => '',
    'telefone_cliente' => '',
    'endereco_cliente' => ''
];
?>

<main class="formulario">

    <h2><?=TITLE?></h2>

    <div>
        <a href="listagem.php">
            <button>VOLTAR</button>
        </a>
    </div>

    <form method="post">
        <section>
            <div>
                <label>Nome</label>
                <input type="text" name="nome" placeholder="Nome" value="<?=$obCliente->nome_cliente?>" required>
            </div>
            <div>
                <label>Telefone</label>
                <input type="tel" name="telefone" placeholder="(00) 0000-0000" maxlength="15" oninput="mascaraTelefone(this)" value="<?=$obCliente->telefone_cliente?>" required>
            </div>
        </section>

        <div>
            <label>Endereço</label>
            <input type="text" name="endereco" placeholder="Endereço" value="<?=$obCliente->endereco_cliente?>"required>
        </div>

        <div>
            <button type="submit">ENVIAR</button>
        </div>
    </form>

    <script>
    function mascaraTelefone(input) {
        let telefone = input.value;

        telefone = telefone.replace(/\D/g, '');

        telefone = telefone.replace(/^(\d{2})(\d)/, '($1) $2');
        telefone = telefone.replace(/(\d{4})(\d)/, '$1-$2');

        input.value = telefone.substring(0, 14);
    }
</script>
</main>