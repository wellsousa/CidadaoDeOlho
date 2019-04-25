# CidadaoDeOlho
Projeto criado a partir de um desafio da empresa Codificar em 2019/Abril.

O projeto foi desenvolvido com as seguintes especificições:

-sistema operacional Ubuntu 18.04 LTS 
-PHP 7.2.15 
-mysql Ver 15.1 Distrib 10.1.38-MariaDB 
-composer 1.8.4 
-Laravel 5.8 
-bootstrap 4.1.3 
-FontAwesome 5.8.1

Para executar o projeto. Siga as instruções abaixo:

Você deverá ter o PHP 7.2.15 e o mysql ou MariaDB instalados no computador.Baixe o projeto para o diretório de sua preferencia. 
Abra o terminal e direciona para a pasta principal do projeto. Digite o comando:

php artisan migrate

Em seguida. Digite:

php artisan DB:seed

Injetar dados no banco levará cerca de 15 minutos.

Para rodar o servidor digite:

php artisan serve

Abra o browser e digite o enderço indicada pelo comando acima, por exemplo:

localhost:8000/


Projeto finalizado e funcional embora o front-end esteja bastante simples. 

Descrição:

Os scripts populam o banco implementado no MariaDB com os dados da API pulbica da ALMG. A injeção de dados é feita através de migrations e seeds. Foram utilizadas classes auxiliares como Repository para busca de dados no banco e criado um diretório exclusivo para classes custumizadas dentro de app\Libraries\ALMG.