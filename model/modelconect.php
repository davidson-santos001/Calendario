<?php 
namespace models;
// metodo de segurança abstract para não ser instanciada 
 abstract class ModelConect
{
    // conexão com o banco de dados,atraves  do config.php 
   protected function conectDB()
    {
        try{
            $con=new \PDO("mysql:host=".HOST.";dbname=".DB."",USER,PASS);
            return $con;

        }catch (\PDOException $erro){
            return $erro->getMessage();
        }
    }
}

?>