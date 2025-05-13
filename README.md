
---

## 🧑‍💼 Login de Teste

Para acessar o sistema, utilize as credenciais de teste:

- **Login:** `admin`  
- **Senha:** `admin`

---

## 🛠️ Funcionalidades

### 🔐 1. Login e Logout
- Implementados com orientação a objetos via a classe `Login` em `login.php`.
- Logout é chamado na classe login. 

### 📦 2. Cadastrar Produtos
- Acesso via botão "Cadastrar Produto" em `home.php`.
- Redireciona para `cadastrar.php`, onde um formulário coleta:
  - Nome do Produto
  - Preço (decimal)
  - Descrição
  - Categoria
- Os dados são enviados para a classe `DB` (`classes/DB.php`) para inserção no banco.

### ❌ 3. Remover Produto
- Acesso via botão "Remover Produto" em `home.php`.
- Redireciona para `excluirProduto.php`, onde é informado o ID do produto a ser removido.
- O ID é enviado para a classe `DB`, que executa a remoção do banco.
- Caso o usuário não saiba o id do produto será direcionado para 'ler.php' onde poderá acessar a lista e deletar

### 📋 4. Listar Produtos
- Acesso via botão "Visualizar Produtos" em `home.php`.
- Redireciona para `ler.php`, que mostra todos os produtos cadastrados.
- Somente acessível com sessão ativa (usuário logado).
- Foi implementado a possibilidade de excluir na lista também

---

## 🧱 Estrutura do Banco de Dados

Incluída no arquivo `loja.sql`.
### Banco de dados: 'artesanato_db'
### Tabela: `produtos_artesanais`
| Campo       | Tipo           |
|-------------|----------------|
| id          | INT AUTO_INCREMENT PRIMARY KEY |
| nome        | VARCHAR(100)   |
| preco       | DECIMAL(10,2)  |
| descricao   | VARCHAR(255)   |
| categoria   | VARCHAR(30)    |

---

## ⚙️ Classe DB

Local: `classes/DB.php`

- Conexão com o banco de dados é estabelecida no construtor.
- Métodos públicos:
  - `getProdutos()`
  - `insertProdutos($nome_produto, $preco, $descricao, $categoria)`
  - `buscarProdutoPorId($id)`
  - `deleteProduto($id)`

Toda manipulação do banco de dados é feita exclusivamente nesta classe. Nenhum comando SQL é exposto fora dela.

---

## ✅ Requisitos

- PHP 7.x ou superior
- MySQL/MariaDB
- Servidor Apache (ex: XAMPP)

---

## 🚀 Instruções para Rodar

1. Clone ou baixe o repositório.
2. Importe o arquivo `loja.sql` no seu banco de dados MySQL.
3. Atualize as credenciais do banco na classe `DB.php` conforme necessário.
4. Execute o projeto em um servidor PHP local (como `localhost` no XAMPP).
5. Acesse `index.php` e utilize as credenciais de teste.

---

## 📄 Licença

Este projeto é apenas para fins educacionais.
