**PROCESSO SELETIVO HARDNESS**

Crud desenvolvido como parte do processo seletivo da Hardness, utilizando as tecnologias PHP, MySQL e JavaScript. O projeto tem como objetivo demonstrar a capacidade de criar, ler, atualizar e deletar informações.

**Desafio**

Desenvolver uma aplicação CRUD para o cadastro de clientes, contendo os seguintes campos:
 * Código (gerado automaticamente)
 * Nome
 * Telefone
 * Endereço

**Tecnologias**
 * PHP
 * MySQL
 * HTML
 * CSS
 * JavaScript

**Requisitos**
 * O CRUD deve permitir cadastrar, listar, atualizar e excluir clientes.
 * O campo "Código" deve ser gerado automaticamente.
 * A aplicação deve ser publicada em um repositório Git (GitHub ou GitLab).

**O que será avaliado**

Além de avaliar o código, estaremos observando sua habilidade de pesquisa e resolução de problemas de forma autônoma. Sabemos que nossa profissão exige estudo contínuo e a busca por soluções técnicas é diária, então essa etapa também visa testar como você lida com desafios e se adapta a novas demandas.

**O PROJETO**
- Foi desenvolvido em PHP usando XAMPP.
- O MySql foi executado no *localhost/phpmyadmin*.
- Busquei manter o design da pagina já existente da Hardness (*https://site.hardness.com.br*).

Estrutura do Banco:
 * Nome do Banco - clientes_hardness_db
 * Nome da Tabela - clientes_tb

  Atributos:
  * id - AUTO_INCREMENT INT
  * nome_cliente - VARCHAR(255) NOT NULL
  * telefone_cliente - VARCHAR(14) NOT NULL
  * endereco_cliente - VARCHAR(255) NOT NULL

**CONFIGURAÇÃO**

- Para exportar o banco de dados basta dar Start no Mysql pelo XAMPP e clicar em Admin.
- No phpMyAdmin clique em *Novo* na parte esquerda da tela.
- Insira o nome do banco de dados: ***clientes_hardness_db***, selecione o ***utf8_general_ci***, e aperte o botão **Criar**.
- No menu superior selecione **Importar**.
- Em **Arquivo a importar:** escolha o arquivo ***clientes_tb.sql***.
- Dessa ate o final da pagina e aperte **Importar**.
- No menu superior clique em **Estrutura**, depois **clientes_tb** (abaixo de **Tabela**).

- Adicione a pasta do crud ao */xampp/htdocs* e abra no navegador ***localhost***.