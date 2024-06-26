# Projeto Laravel - Instruções de Configuração

## Pré-requisitos

- PHP >= 7.3
- Composer
- MySQL
- Git
- XAMPP

## Documentaçao para acesso dos Endpoints

https://documenter.getpostman.com/view/23605124/2sA3drJaFi

## Passo a Passo para Configuração do Projeto

### 1. Clonar o Repositório

Primeiro, clone o repositório para sua máquina local usando o comando `git clone`:

```bash
git clone https://github.com/vitor573/Teste-Infornet.git
```
### 2. Acessar a Pasta do Projeto
Navegue até a pasta do projeto clonado:

```bash
cd Teste-Infornet
```

### 3. Instalar Dependências
Instale todas as dependências do projeto usando o Composer:

```bash
composer install
```

### 4.Configurar o Ambiente
Copie o conteudo do .env.example para .env e configure suas variáveis de ambiente.

### 5.Migrar o Banco de Dados
Execute as migrações para criar as tabelas no banco de dados:

```bash
php artisan migrate
```
### 6.Rodar os Seeders
Popule o banco de dados com dados de exemplo utilizando os seeders:

```bash
php artisan db:seed
```
### 7.Inicialização do Servidor de Desenvolvimento
Finalmente, inicie o servidor de desenvolvimento do Laravel:

```bash
php artisan serve
```
