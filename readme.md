# clients-viva
Projeto em Laravel com banco de dados PostgreSQL
<br>
Build Setup
# GIT clone do Projeto
git clone https://github.com/alunardi/clients-viva.git

# CD no projeto
cd clients-viva/

# Crie um banco de dados com o nome 'viva' no PostgreSQL
psql -U postgres -W
create database viva;

# Na raiz do projeto, execute
php artisan serve

# Na raiz do projeto, execute a migration para criar as tabelas
php artisan migrate
