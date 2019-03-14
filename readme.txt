Padronizar tudo em inglês, menos o html (cliente)

--- GIT ---
Para trabalhar no código siga essas etapas

git clone https://github.com/geovannepad/tcc-ecommerce
composer install
php artisan key:generate
-- ligar xampp --
configurar arquivo .env (se não estiver)

    --- PARA ENVIAR SUAS ALTERACOES NO CODIGO ---
    git add .
    git commit -m "mensagem das suas alteracoes"
    git push

    --- PARA PUXAR AS MUDANÇAS NO CODIGO ---
    git pull
    ----------------------------------------
-----------

Subindo o servidor: php artisan serve

Criando model/view/controller
php artisan make:model (nome)
Exemplo: php artisan make:model Dog

para criar view ou controller apenas substituir no lugar da "model" no código,
o mesmo para criar migration

--- GUSTAVO ---
Caminho para views e layouts
/resources/views

Caminho para imagens, css e js
/public
---------------

Caminho para tabelas do banco de dados
/database/migrations/

Caminho para controllers
/app/http

Caminho para models
/app