<?php

#caminhos absolutos 
# variavel : dirInt (poderia o ser host do meu site por exemplo www.stylemodas.com.br),
# mas como ainda não tem pode deixar vazia para funcionar com o localhost
$dirInt="";



define('DIRPAGE',"http://{$_SERVER['HTTP_HOST']}/{$dirInt}");  #quando for mandar para um host que posssua SSL precisará de  acrescentar https
$bar=(substr($_SERVER['DOCUMENT_ROOT'],-1)=='/')?"":"/";
define('DIRREQ',"{$_SERVER['DOCUMENT_ROOT']}{$bar}{$dirInt}");


# Banco de dados 

define('HOST','localhost');
define('DB','calendario');
define('USER','root');
define('PASS','');

#incluir arquivos 

include(DIRREQ.'lib/composer/vendor/autoload.php');



?>