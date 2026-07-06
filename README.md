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

---

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

---

### Usuários

CRUD completo de usuários, permitindo:

- Listar usuários
- Criar usuários
- Editar usuários
- Excluir usuários
- Definir perfil como Administrador ou Colaborador
- Vincular permissões aos colaboradores

Também foi adicionada uma proteção para impedir que o usuário logado exclua a si mesmo.

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

---

## Requisitos para rodar o projeto

Antes de iniciar, é necessário ter instalado:

- PHP 8.2 ou superior
- Composer
- Node.js e npm
- MySQL ou MariaDB
- Git

---

## Instalação

Clone o repositório:

```bash
git clone https://github.com/AnaLuizaRChiamenti/avaliacao_santa_casa.git
```
