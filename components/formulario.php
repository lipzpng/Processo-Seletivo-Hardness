<!-- CSS especifico deste Component -->
<link rel="stylesheet" href="./css/formulario.css" />

<!-- Configuração necessaria para que quando este Component for usado para cadastro não exibir nenhum dado nos inputs -->
<?php
$obCliente = $obCliente ?? (object)[
    'nome_cliente' => '',
    'telefone_cliente' => '',
    'endereco_cliente' => '',
    'cidade_cliente' => ''
];
?>

<!-- Inicio do Html -->
<!-- Conteudo da cadastrar.php e editar.php -->
<main class="formulario">

    <!-- Exibe o titulo conforme a pagina utilizando este Component -->
    <h2><?=TITLE?></h2>

    <div>
        <a href="listagem.php">
            <button>VOLTAR</button>
        </a>
    </div>

    <!-- Formulario de POST / UPDATE -->
    <form method="post">

        <!-- Inputs -->
        <section>
            <div>
                <label>Nome</label>
                <input type="text" name="nome" placeholder="Nome" value="<?=$obCliente->nome_cliente?>" >
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
            <label>Cidade</label>
            <input type="text" name="cidade" placeholder="Cidade" value="<?=$obCliente->cidade_cliente?>">
        </div>

        <!-- Botão enviar -->
        <div>
            <button type="submit">ENVIAR</button>
        </div>
    </form>

    <!-- Mascara para que o input de telefone coloque os parenteses, espaços e hifen de forma automatica -->
    <script>
        function mascaraTelefone(input) {
            let telefone = input.value;

            //Remove qualquer caractere que não seja número
            telefone = telefone.replace(/\D/g, '');

            //Adiciona os parenteses, espaço e o hhfen
            telefone = telefone.replace(/^(\d{2})(\d)/, '($1) $2');
            telefone = telefone.replace(/(\d{4})(\d)/, '$1-$2');

            //Limita o comprimento para 14 caracteres no máximo "(00) 0000-0000")
            input.value = telefone.substring(0, 14);
        }
    </script>
</main>