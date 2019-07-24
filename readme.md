# clients-viva
Projeto em Laravel com banco de dados PostgreSQL
<br>
Build Setup
# Faça o clone do projeto
git clone https://github.com/alunardi/clients-viva.git

# CD no projeto
cd clients-viva/

# Instale as depedências do Composer
composer install

# Crie um banco de dados no PostgreSQL. Entre no SHELL
psql -U postgres -W

# Crie um banco de dados com o nome 'viva'
create database viva;

# Na raiz do projeto (/cliets-viva), execute
php artisan serve

# Na raiz do projeto (/cliets-viva), execute a migration para criar as tabelas
php artisan migrate
