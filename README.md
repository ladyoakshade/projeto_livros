**Visão Geral**

Projeto simples em PHP para gerenciar uma pequena biblioteca de livros. Fornece páginas para listar, cadastrar, editar e excluir livros, além de autenticação de usuários (login/registro).

**Tecnologias**

- **PHP**: código servidor (puro)
- **MySQL/MariaDB**: banco de dados (`bibliotecalivro.sql`)
- **HTML/CSS**: interface básica em `public/`

**Requisitos**

- **PHP** >= 7.4 (ou compatível com sua distribuição)
- **MySQL** ou **MariaDB**
- Servidor web (Apache/Nginx) ou o servidor embutido do PHP

**Instalação Rápida**

1. Clone ou copie o projeto para o diretório do seu servidor web (ex.: `/var/www/html/projeto_livros`).

2. Importe o banco de dados:

```
mysql -u SEU_USUARIO -p SEU_BANCO_DE_DADOS < bibliotecalivro.sql
```

3. Configure a conexão com o banco de dados editando o arquivo `config/conexao.php` e ajustando host, usuário, senha e nome do banco.

4. Ajuste permissões se necessário (ex.: para Apache):

```
sudo chown -R www-data:www-data /var/www/html/projeto_livros
sudo find /var/www/html/projeto_livros -type d -exec chmod 755 {} \\\;
sudo find /var/www/html/projeto_livros -type f -exec chmod 644 {} \\\;
```

5. Acesse pelo navegador apontando para a pasta `public/` (ex.: `http://localhost/projeto_livros/public/`), ou rode o servidor embutido do PHP a partir da raiz do projeto:

```
php -S localhost:8000 -t public
```

**Configuração do Banco de Dados**

- O arquivo `bibliotecalivro.sql` contém a estrutura e dados iniciais. Caso já exista um banco, ajuste o nome no `config/conexao.php`.
- Arquivo principal de configuração: `config/conexao.php`.

**Estrutura do Projeto**

- `bibliotecalivro.sql`: dump do banco de dados
- `config/`:
  - `auth.php` — lógica de autenticação
  - `conexao.php` — configurações de conexão com o banco
- `modelos/`:
  - `Livro.php` — modelo/DAO para livros
  - `Usuario.php` — modelo/DAO para usuários
- `paginas/`:
  - `cadastrar.php`, `editar.php`, `excluir.php`, `listar.php` — CRUD de livros
  - `login.php`, `logout.php`, `registrar.php` — autenticação de usuários
- `public/`:
  - `cabecalho.php`, `rodape.php` — templates
  - `estilo.css` — estilos
  - `index.php` — ponto de entrada público

**Como Usar**

- Abra `public/index.php` no navegador após configurar o servidor.
- Use as páginas em `paginas/` para gerenciar livros e usuários:
  - Cadastrar novo livro: `paginas/cadastrar.php`
  - Listar livros: `paginas/listar.php`
  - Editar: `paginas/editar.php?id=...`
  - Excluir: `paginas/excluir.php?id=...`
  - Registrar usuário: `paginas/registrar.php`
  - Login: `paginas/login.php`

**Sugestões de melhoria**

- Separar lógica de apresentação e acesso a dados (usar MVC mais estrito)
- Usar prepared statements em todas as consultas (proteção contra SQL Injection)
- Adicionar validação e tratamento de erros mais robustos
- Adicionar rotas amigáveis e proteção CSRF nos formulários

**Contribuição**

- Abra uma issue descrevendo a melhoria ou correção.
- Envie um pull request com alterações pequenas e documentadas.

**Licença**

Adicione um arquivo `LICENSE` se desejar publicar com uma licença (por exemplo, MIT).

**Contato**

Para dúvidas e suporte, abra uma issue neste repositório.
