Uello
===================================

Esse projeto disponibiliza uma funcionalidade de importações de taxas de fretes de n clientes, no projeto é possível gerenciar clientes e importar um arquivo com as taxas atualizadas para 1 ou mais clientes.

Tecnologias Utilizadas
----------------------

- [Laravel](https://laravel.com/)
- [Github](https://github.com/)
- [Compose](https://docs.docker.com/compose/)

Instalação
-----------

1. Clonar o repositório:

    ```sh
    git clone https://github.com/gelsonlmj/uello.git
    ```

2. Execute o comando abaixo para subir o projeto

    ```sh
    cd uello
    ./bin/build-and-up.sh
    ```

Projeto
--------------

Para ter acesso ao projeto basta acessar a seguinte url http://localhost:8080/

- Clientes

    No menu "Clientes" é possível gerenciar os cliente, podendo listar, adicionar, editar e remover um cliente.

- Importação de Ceps

    No menu "Importações > Ceps", podemos fazer a atualização das taxas de fretes para os clientes.


Teste
--------------

- 1 Passo: Acesse o gerenciamento de clientes, cadastre um ou mais clientes e depois vá para a importação de ceps.

- 2 Passo: Na importação de ceps, selecione os clientes que deseja atualizar as taxas de fretes, e selecione o arquivo com as as taxas atualizadas.

- 3 Passo: Abra o terminal e digite o comando abaixo.
    ```
    docker exec -it uello-app-1 bash
    ```
- 4 Passo: Dentro do container digite o comando abaixo.
    ```
    cd /usr/share/nginx
    ```

- 5 Passo: Após acessar a pasta nginx, digite o comando abaixo.
    ```
    php artisan queue:work
    ```

- 6 Passo: Abra seu software de banco de dados e acesse o banco de dados da aplicação chamado de laravel, após selecionado o banco, execute a query "SELECT * FROM postal_codes" para verificar se a importação está importando as taxas de fretes corretamente 
