# Avaliação Laravel - Sistema Administrativo Hospitalar

Sistema administrativo desenvolvido em Laravel para gerenciamento de usuários, permissões e controle de acesso a módulos operacionais hospitalares.

O projeto foi desenvolvido como parte de uma avaliação técnica, seguindo os requisitos propostos no repositório original.

---

## Tecnologias utilizadas

- PHP 8.2+
- Laravel 12
- MySQL/MariaDB
- Laravel Breeze
- Blade
- Tailwind CSS
- Vite
- Git
- GitHub Actions

---

---

## Testes automatizados

O projeto possui testes automatizados utilizando a estrutura padrão de testes do Laravel.

Para executar os testes localmente, rode:

```bash
    php artisan test
```

## Funcionalidades implementadas

### Autenticação

- Login com e-mail e senha.
- Logout.
- Área interna protegida por autenticação.

A recuperação de senha e o cadastro público foram removidos do fluxo principal, pois a proposta exige que os usuários sejam gerenciados pelo administrador.

---

### Perfis de usuário

O sistema possui dois perfis:

#### Administrador

O administrador pode acessar apenas:

- Usuários
- Permissões
- Perfil

O administrador não acessa os módulos operacionais.

#### Colaborador

O colaborador pode acessar apenas os módulos para os quais recebeu permissão.

O colaborador não acessa:

- Usuários
- Permissões

Para evitar que o colaborador fique sem funcionalidades disponíveis, é obrigatório vincular ao menos uma permissão de módulo no cadastro ou edição.

---

### Usuários

CRUD completo de usuários, permitindo:

- Listar usuários
- Criar usuários
- Editar usuários
- Excluir usuários
- Definir perfil como Administrador ou Colaborador
- Vincular permissões aos colaboradores

Também foram adicionadas proteções e validações, como:

- impedimento de exclusão do próprio usuário logado;
- validação de e-mail com domínio completo;
- validação de nome permitindo apenas letras, espaços, acentos, hífen e apóstrofo;
- obrigatoriedade de confirmação de senha;
- obrigatoriedade de permissões para usuários colaboradores;
- permissões de módulos não aplicáveis para usuários administradores;
- modal de confirmação antes da exclusão de usuários.

---

### Permissões

CRUD completo de permissões, permitindo:

- Listar permissões
- Criar permissões
- Editar permissões
- Excluir permissões

As permissões são utilizadas para controlar o acesso dos colaboradores aos módulos operacionais.

Permissões iniciais:

- Setores Hospitalares
- Especialidades Médicas
- Equipamentos
- Unidades Assistenciais

O campo `slug` segue uma regra específica, aceitando apenas:

- letras minúsculas;
- números;
- hífen.

Exemplo válido:

```text
setores-hospitalares
```

Exemplos inválidos:

```text
Setores Hospitalares
setores hospitalares
setores_hospitalares
```

Também foi adicionada uma modal de confirmação antes da exclusão de permissões.

Ao excluir uma permissão, usuários vinculados a ela perdem acesso ao módulo correspondente até que a permissão seja criada e vinculada novamente.

---

### Módulos operacionais

Foram criadas páginas simples para os módulos solicitados:

- Setores Hospitalares
- Especialidades Médicas
- Equipamentos
- Unidades Assistenciais

Esses módulos não possuem CRUD, pois o requisito solicita apenas páginas simples para validar o controle de acesso.

---

### Controle de acesso

O controle de acesso foi implementado por meio de middlewares.

Foram criados:

- `CheckRole`
- `CheckPermission`

As rotas administrativas são protegidas por perfil.

As rotas dos módulos operacionais são protegidas por perfil e permissão.

Exemplo:

- Administrador acessa `/users` e `/permissions`
- Administrador não acessa `/setores-hospitalares`
- Colaborador não acessa `/users` nem `/permissions`
- Colaborador acessa apenas módulos permitidos

O bloqueio acontece diretamente nas rotas, não apenas no menu.

Dessa forma, mesmo que o usuário tente acessar uma URL diretamente pelo navegador, o Laravel valida o perfil e as permissões antes de permitir o acesso.

As permissões cadastradas no painel são utilizadas para controlar o acesso aos módulos existentes.

Criar uma nova permissão pelo painel não cria automaticamente uma nova página, rota ou módulo no sistema.

Para adicionar um novo módulo, é necessário criar a rota, a view/controller correspondente e aplicar o middleware usando o slug da permissão.

---

## Requisitos para rodar o projeto

Antes de iniciar, é necessário ter instalado:

- PHP 8.2 ou superior
- Composer
- Node.js e npm
- MySQL ou MariaDB
- Git

---

## Como rodar o projeto

### 1. Clonar o repositório

Execute:

```bash
git clone https://github.com/AnaLuizaRChiamenti/avaliacao_santa_casa.git
```

Entre na pasta do projeto:

```bash
cd avaliacao_santa_casa
```

---

### 2. Instalar as dependências PHP

Execute:

```bash
composer install
```

---

### 3. Instalar as dependências front-end

Execute:

```bash
npm install
```

---

### 4. Criar o arquivo `.env`

No Windows:

```bash
copy .env.example .env
```

No Linux/Mac:

```bash
cp .env.example .env
```

---

### 5. Gerar a chave da aplicação

Execute:

```bash
php artisan key:generate
```

---

### 6. Configurar o banco de dados

Antes de rodar as migrations, é necessário criar um banco MySQL/MariaDB para o projeto.

O nome do banco utilizado neste projeto é:

```text
avaliacao_santa_casa
```

#### Opção 1: Criar pelo phpMyAdmin usando XAMPP

Se estiver usando XAMPP:

1. Abra o **XAMPP Control Panel**.
2. Inicie o **Apache**.
3. Inicie o **MySQL**.
4. Clique em **Admin** na linha do MySQL para abrir o phpMyAdmin.
5. No phpMyAdmin, clique em **Novo**.
6. No campo de nome da base de dados, informe:

```text
avaliacao_santa_casa
```

7. Clique em **Criar**.

Depois, abra o arquivo `.env` e configure a conexão com o banco:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=avaliacao_santa_casa
DB_USERNAME=root
DB_PASSWORD=
```

No XAMPP, normalmente o usuário padrão é `root` e a senha fica vazia.

---

#### Opção 2: Criar pelo terminal

Se preferir criar o banco pelo terminal, execute:

```bash
mysql -u root -e "CREATE DATABASE avaliacao_santa_casa CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;"
```

Caso o MySQL tenha senha, use:

```bash
mysql -u root -p -e "CREATE DATABASE avaliacao_santa_casa CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;"
```

Depois, configure o `.env`:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=avaliacao_santa_casa
DB_USERNAME=root
DB_PASSWORD=
```

Se o seu banco usar outro usuário ou senha, altere:

```env
DB_USERNAME=seu_usuario
DB_PASSWORD=sua_senha
```

### 7. Rodar migrations e seeders

Execute:

```bash
php artisan migrate:fresh --seed
```

Esse comando irá:

- recriar as tabelas do banco;
- criar o usuário administrador inicial;
- criar as permissões iniciais dos módulos.

---

### 8. Compilar os assets

Execute:

```bash
npm run build
```

---

### 9. Iniciar o servidor local

Execute:

```bash
php artisan serve
```

Acesse no navegador:

```text
http://127.0.0.1:8000
```

---

## Acesso administrador padrão

Após executar:

```bash
php artisan migrate:fresh --seed
```

o sistema cria automaticamente um usuário administrador padrão.

```text
E-mail: admin@santacasa.org.br
Senha: password
```

Esse usuário possui perfil de Administrador e pode acessar as áreas de Usuários e Permissões.

O administrador não acessa os módulos operacionais, conforme a regra da avaliação.

---

## Ordem resumida dos comandos

Para rodar o projeto do zero:

```bash
git clone https://github.com/AnaLuizaRChiamenti/avaliacao_santa_casa.git
cd avaliacao_santa_casa
composer install
npm install
copy .env.example .env
php artisan key:generate
php artisan migrate:fresh --seed
npm run build
php artisan serve
```

No Linux/Mac, substitua:

```bash
copy .env.example .env
```

por:

```bash
cp .env.example .env
```

Depois acesse:

```text
http://127.0.0.1:8000
```

E faça login com:

```text
E-mail: admin@santacasa.org.br
Senha: password
```

---

## Fluxo de teste sugerido

### Administrador

1. Fazer login com o usuário administrador.
2. Acessar Usuários.
3. Criar um usuário colaborador.
4. Definir permissões para esse colaborador.
5. Acessar Permissões.
6. Criar, editar e excluir permissões.
7. Tentar acessar um módulo operacional diretamente pela URL.

Resultado esperado:

- O administrador acessa Usuários e Permissões.
- O administrador não acessa módulos operacionais.
- Ao criar ou editar um administrador, as permissões de módulos não se aplicam.

---

### Colaborador

1. Fazer login com um usuário colaborador.
2. Verificar os módulos disponíveis no dashboard/menu.
3. Acessar um módulo permitido.
4. Tentar acessar um módulo não permitido.
5. Tentar acessar `/users`.
6. Tentar acessar `/permissions`.

Resultado esperado:

- O colaborador acessa apenas módulos autorizados.
- O colaborador recebe erro 403 ao tentar acessar áreas não permitidas.
- O colaborador precisa possuir ao menos uma permissão vinculada.

---

### Testes de validação sugeridos

#### Usuários

Testar:

- criar usuário sem nome;
- criar usuário com números ou caracteres especiais no nome;
- criar usuário com e-mail inválido;
- criar usuário com e-mail sem domínio completo;
- criar usuário com senha menor que 8 caracteres;
- criar usuário com confirmação de senha diferente;
- criar colaborador sem selecionar permissões;
- criar administrador e verificar que permissões de módulos não se aplicam.

Resultado esperado:

- O sistema deve bloquear o cadastro e exibir mensagens de erro.

---

#### Permissões

Testar:

- criar permissão sem nome;
- criar permissão sem slug;
- criar permissão com slug usando espaços;
- criar permissão com slug usando letras maiúsculas;
- criar permissão com slug usando underline.

Resultado esperado:

- O sistema deve bloquear slugs inválidos.
- O slug deve aceitar apenas letras minúsculas, números e hífen.

---

#### Controle de acesso por URL direta

Testar como administrador:

```text
/setores-hospitalares
/especialidades-medicas
/equipamentos
/unidades-assistenciais
```

Resultado esperado:

- O administrador deve receber erro 403 nos módulos operacionais.

Testar como colaborador:

```text
/users
/permissions
```

Resultado esperado:

- O colaborador deve receber erro 403 nas áreas administrativas.

Testar módulos como colaborador:

```text
/setores-hospitalares
/especialidades-medicas
/equipamentos
/unidades-assistenciais
```

Resultado esperado:

- O colaborador deve acessar apenas os módulos para os quais possui permissão.
- Módulos sem permissão devem retornar erro 403.

---

## Rotas principais

### Área pública

```text
/
```

Tela inicial do sistema.

```text
/login
```

Tela de login.

---

### Área autenticada

```text
/dashboard
```

Painel principal.

```text
/profile
```

Perfil do usuário.

```text
/users
```

Gerenciamento de usuários.

```text
/permissions
```

Gerenciamento de permissões.

```text
/setores-hospitalares
```

Módulo Setores Hospitalares.

```text
/especialidades-medicas
```

Módulo Especialidades Médicas.

```text
/equipamentos
```

Módulo Equipamentos.

```text
/unidades-assistenciais
```

Módulo Unidades Assistenciais.

---

## Estrutura principal implementada

### Models

- `User`
- `Permission`

### Controllers

- `UserController`
- `PermissionController`
- `ModuleController`
- Controllers de autenticação gerados pelo Laravel Breeze

### Middlewares

- `CheckRole`
- `CheckPermission`

### Tabelas principais

- `users`
- `permissions`
- `permission_user`

---

## Decisões técnicas

### Laravel Breeze

Foi utilizado Laravel Breeze para acelerar a criação da autenticação e manter o projeto alinhado às práticas do Laravel.

---

### Campo `role`

Foi criada a coluna `role` na tabela `users` para representar os dois perfis do sistema:

- `admin`
- `colaborador`

Essa decisão separa claramente o perfil administrativo do perfil operacional.

---

### Relacionamento usuários e permissões

Foi utilizado relacionamento muitos-para-muitos entre usuários e permissões.

Tabelas envolvidas:

- `users`
- `permissions`
- `permission_user`

Essa estrutura permite que um colaborador tenha uma ou mais permissões.

---

### Middlewares

Foram criados middlewares específicos para autorização:

- `CheckRole`
- `CheckPermission`

Isso garante que o controle de acesso ocorra nas rotas e não apenas na interface.

---

### Validações

Foram adicionadas validações no backend para garantir consistência dos dados.

Entre elas:

- e-mail obrigatório, único e em formato válido;
- senha obrigatória no cadastro, com mínimo de 8 caracteres e confirmação;
- nome sem números ou caracteres especiais inválidos;
- perfil limitado aos valores permitidos;
- permissões obrigatórias para colaboradores;
- slug de permissão limitado a letras minúsculas, números e hífen.

---

### Interface

A interface foi mantida simples, responsiva e em português, utilizando Blade e Tailwind CSS.

Também foram adicionadas melhorias de usabilidade:

- mensagens de erro em português;
- feedback visual de sucesso;
- links de retorno em formulários;
- modal de confirmação para exclusões;
- ocultação das permissões quando o perfil selecionado é administrador.

---

## Observações

- O cadastro público foi removido para manter o fluxo administrativo centralizado.
- A recuperação de senha não foi implementada, pois não era requisito obrigatório.
- O controle de acesso foi testado tanto pelo menu quanto por URL direta.
- Os módulos operacionais possuem páginas simples, conforme solicitado no desafio.
- Criar uma permissão pelo painel não cria automaticamente um novo módulo no sistema.
- Para novos módulos, é necessário criar rota, view/controller e aplicar o middleware correspondente.

---

## Possíveis problemas comuns

### Erro de conexão com o banco

Verifique se:

- o MySQL/MariaDB está rodando;
- o banco `avaliacao_santa_casa` foi criado;
- as credenciais do `.env` estão corretas.

Depois rode novamente:

```bash
php artisan migrate:fresh --seed
```

---

### CSS ou JavaScript não carregando

Execute:

```bash
npm install
npm run build
php artisan optimize:clear
```

Depois reinicie o servidor:

```bash
php artisan serve
```

---

### Alterações no `.env` não aplicadas

Execute:

```bash
php artisan optimize:clear
php artisan config:clear
php artisan cache:clear
php artisan view:clear
```

Depois reinicie o servidor:

```bash
php artisan serve
```

---

### `vendor/autoload.php` não encontrado

Execute:

```bash
composer install
```

---

### Assets do Vite não encontrados

Execute:

```bash
npm install
npm run build
```

---

## Licença

Este projeto foi desenvolvido exclusivamente para fins de avaliação técnica.
