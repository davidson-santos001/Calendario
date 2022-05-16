<?php
//Consultar no banco de dados 
include_once("../config/conexao_ao_db.php");

//recebendo dados das variaveis 'pagina','qnt_result_pg'

$pagina=filter_input(INPUT_POST,'pagina',FILTER_SANITIZE_NUMBER_INT);
$qnt_result_pg=filter_input(INPUT_POST,'qnt_result_pg',FILTER_SANITIZE_NUMBER_INT);

// calcular o inicio da visualização

$inicio = ($pagina*$qnt_result_pg)-$qnt_result_pg;

// consultar o banco de dados 
$result_usuario = "select * from events order by id desc limit $inicio,$qnt_result_pg";
$resultado_usuario = mysqli_query($link, $result_usuario);

//verificar se encontrou resultado na tabela "usuarios"
if(($resultado_usuario)AND($resultado_usuario->num_rows !=0)){
    ?>
    <table class="table table-bordered table-striped table-hover">
    <thead>
       <tr>
       <th >ID</th>
         <th >Title</th>
         <th >Inicio do evento</th>
         <th >Final do evento</th>
         <th >Desrição</th>
         <th >Campus</th>
         <th >Reserva</th>
         <th >Editar</th>
         <th >Deletar</th>
       </tr>
     </thead>
     <tbody>
    <?php
while($row_usuario = mysqli_fetch_assoc($resultado_usuario)){
    ?>
    <tr>
    <th><?php
      echo $row_usuario ['id']; ?></th>
      <td><?php
      echo $row_usuario ['title']; ?></th>
      <td><?php
      echo $row_usuario ['start']; ?></td>
      <td><?php
      echo $row_usuario ['end']; ?></td>
      <td><?php
      echo $row_usuario ['description']; ?></td>
      <td><?php
      echo $row_usuario ['campus']; ?></td>
      <td><?php
      echo $row_usuario ['reserva']; ?></td>
      <td><?php
      echo "<a href='../views/manager/editar.php?id=" . $row_usuario['id'] ."'>Editar</a>";?></td>
      <td><?php
      echo "<a href='controllerDeletar.php?id=" . $row_usuario['id'] ."'>Deletar</a>";?></td>
    </tr>
    <?php

} ?>
</tbody>
</table>
<?php
// Paginação -Somar a quantidade de usuários
$result_pg="select count(id) as num_result from events";
$resultado_pg=mysqli_query($link,$result_pg);
$row_pg =mysqli_fetch_assoc($resultado_pg);

// quantidade de paginas 
$quantidade_pg = ceil($row_pg['num_result'] / $qnt_result_pg);

//Limitar os link antes depois
$max_links=2;
echo '<nav aria-label="paginacao">';
  echo '<ul class="pagination">';
   echo '<li class="page-item">';
    echo"<span class='page-link'><a href='#' onclick='Listar_usuario(1, $qnt_result_pg)'>Primeira </a></span>";
    echo '</li>';
    for($pag_ant=$pagina-$max_links; $pag_ant<=$pagina-1;$pag_ant++){
        if($pag_ant>=1){
            echo"<li class='page-item'><a class='page-link' href='#' onclick='Listar_usuario($pag_ant, $qnt_result_pg)'> $pag_ant</a></li>";
        }
        }
    
    echo '<li class="page-item active" aria-current="page">';
    echo ' <span class="page-link">';
    echo "$pagina";
    echo '</span>';
    echo '</li>';
    for($pag_dep=$pagina+1;$pag_dep<=$pagina+$max_links;$pag_dep++){
        if($pag_dep <=$quantidade_pg){
            echo" <li class='page-item'><a class='page-link' href='#' onclick='Listar_usuario($pag_dep, $qnt_result_pg)'> $pag_dep</a></li>";
        }
    }
    
   echo ' <li class="page-item">';
   echo"<span class='page-link'><a href='#' onclick='Listar_usuario($quantidade_pg, $qnt_result_pg)'>Última </a></span>";
      echo ' </li>';
      echo ' </ul>';
      echo '</nav>';

}else{
    echo "<div class='alert alert-danger' role='alert'>Nenhum evento encontrado!</div> ";
}
?>