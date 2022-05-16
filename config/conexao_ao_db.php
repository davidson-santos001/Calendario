<?php
# fazendo a conexao com o banco de dados com nome do servidor, 
# usuario , senha e o banco de dados

$servidor="localhost";
$usuario="root";
$senha="";
$dbname="calendario";

#criando a conexão e atribuindo  para a variavel link ou como  (são padrão )

$link=mysqli_connect($servidor,$usuario,$senha,$dbname);

?>