# Trabalho Prático: Parte 3 - Conexão via Framework (Laravel/Eloquent)

Este repositório contém **apenas a Parte 3 (Framework)** do trabalho prático sobre "Estratégias de Conexão com Banco de Dados". Ele demonstra a abordagem de conexão abstraída usando o ORM Eloquent do Laravel.

## 🎯 Objetivo deste Projeto

O objetivo deste código é demonstrar como um framework moderno e seu ORM (Object-Relational Mapper) abstraem a complexidade do banco de dados.

O foco é mostrar como:
* As consultas SQL são substituídas por chamadas de métodos (ex: `Livro::find(1)`).
* O gerenciamento da conexão é totalmente automático.
* Os resultados são retornados como objetos PHP, e não arrays (ex: `$livro->titulo`).
* O gerenciamento do banco (criação de tabelas e população) pode ser feito inteiramente com código PHP, usando **Migrations** e **Seeders**.

## 🗂️ O "Jeito Laravel": Migrations e Seeders

Diferente da Parte 2 (Nativa), onde usamos um script `.sql` manual, este projeto usa as ferramentas do próprio Laravel para gerenciar o banco de dados:

1.  **Migrations (As "CREATE TABLE"):** Os arquivos em `database/migrations/` descrevem a *estrutura* das tabelas (`editoras`, `livros`) em código PHP. O Laravel converte isso em SQL automaticamente.
2.  **Seeders (As "INSERT INTO"):** O arquivo `database/seeders/DatabaseSeeder.php` descreve os *dados de exemplo* em código PHP (usando o Eloquent).

Isso torna o banco de dados parte do controle de versão do projeto.

## 🛠️ Tecnologias Utilizadas

* **Linguagem:** PHP
* **Framework:** Laravel
* **ORM:** Eloquent
* **SGBD:** SQLite
* **Gerenciamento de DB:** Migrations e Seeders
* **Demonstração:** `php artisan tinker` (REPL do Laravel)

---

## 🚀 Instruções de Instalação e Execução

Para rodar este projeto do zero e ver a mágica acontecer:

### 1. Instalação do Projeto

1.  Clone este repositório.
2.  Navegue até a pasta do projeto: `cd projeto-laravel`
3.  Instale as dependências do Composer:
    ```bash
    composer install
    ```
4.  Copie o arquivo de ambiente:
    ```bash
    cp .env.example .env
    ```
5.  Gere a chave de segurança do Laravel:
    ```bash
    php artisan key:generate
    ```

### 2. Configuração do Banco de Dados (Automático)

1.  Crie um arquivo de banco de dados **vazio** que o Laravel irá usar:
    ```bash
    touch database/laravel_db.sqlite
    ```
2.  Abra o arquivo `.env` e configure-o para usar este novo banco.
    * Mude `DB_CONNECTION` para `sqlite`.
    * Mude `DB_DATABASE` para o **caminho absoluto** do arquivo que você acabou de criar.
    *(Ex: `C:\Users\admin\...\projeto-laravel\database\laravel_db.sqlite`)*

### 3. Execução da "Mágica" (Migrate + Seed)

Este é o comando que cria as tabelas E popula os dados, tudo de forma automática.

1.  Execute no terminal:
    ```bash
    php artisan migrate:fresh --seed
    ```
    * `migrate:fresh`: Apaga todas as tabelas e recria (usando as **Migrations**).
    * `--seed`: Popula as tabelas (usando os **Seeders**).

**Seu banco de dados agora está 100% pronto e com dados de exemplo!**

---

## 🔬 Demonstração do CRUD (Usando Tinker)

Para demonstrar o CRUD (conforme pedido na atividade), usamos o `php artisan tinker`, que é o console interativo do Laravel.

1.  Inicie o Tinker:
    ```bash
    php artisan tinker
    ```
2.  Importe os Models que você vai usar:
    ```php
    > use App\Models\Livro;
    > use App\Models\Editora;
    ```
3.  Execute os comandos do Eloquent (o "código" da Parte 3):

    * **READ (Listar todos):**
        ```php
        > Livro::all()->toArray();
        ```
        *(Substitui: `SELECT * FROM livros` e o loop `while`)*

    * **READ (Relação 1:N - A Mágica do JOIN):**
        ```php
        > $livro = Livro::find(1);
        > echo $livro->editora->nome;
        ```
        *(Substitui: `SELECT ... FROM livros LEFT JOIN editoras ...`)*

    * **READ (Relação N:1 - A Mágica da Sub-query):**
        ```php
        > $editora = Editora::find(1);
        > $editora->livros->toArray();
        ```
        *(Substitui: `SELECT * FROM livros WHERE editora_id = ?`)*

    * **CREATE:**
        ```php
        > Livro::create(['titulo' => 'Livro Novo', 'ano' => 2025, 'autor_texto' => 'Novo Autor', 'editora_id' => 1]);
        ```
        *(Substitui: `INSERT INTO ...`)*

    * **UPDATE:**
        ```php
        > $livro = Livro::find(1);
        > $livro->titulo = "Novo Título";
        > $livro->save();
        ```
        *(Substitui: `UPDATE ... SET ... WHERE ...`)*

    * **DELETE:**
        ```php
        > $livro = Livro::find(1);
        > $livro->delete();
        ```
        *(Substitui: `DELETE FROM ...`)*

## 🧑‍💻 Autores

* Aluno 1: João Vitor do Amaral Pichetti
* Aluno 2: Marco Antonio Zamboni Acosta
* Aluno 3: Nícolas Bitencourt Boeira
