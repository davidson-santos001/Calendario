<?php
$date = filter_input(INPUT_POST, 'date', FILTER_DEFAULT);
$time = filter_input(INPUT_POST, 'time', FILTER_DEFAULT);
$date2 = filter_input(INPUT_POST, 'date', FILTER_DEFAULT);
$end = filter_input(INPUT_POST, 'fim', FILTER_DEFAULT);
$title = filter_input(INPUT_POST, 'title', FILTER_DEFAULT);
$description = filter_input(INPUT_POST, 'description', FILTER_DEFAULT);
$campus = filter_input(INPUT_POST, 'campus', FILTER_DEFAULT);
$reserva = filter_input(INPUT_POST, 'reserva', FILTER_DEFAULT);
$cor = filter_input(INPUT_POST, 'cor', FILTER_DEFAULT);
$start = new \DateTime($date . '' . $time, new \DateTimeZone('America/Sao_paulo'));
$fim = new \DateTime($date2 . '' . $end, new \DateTimeZone('America/Sao_paulo'));
$fim = date('y-m-d H:i:s', strtotime("{$date2}{$end}"));
  //Variáveis
  $title = $_POST['title'];
  $start=$_POST['date'];
  $fim=$_POST['fim'];
  $email =$_POST['email'];
  $description = $_POST['description'];
  $campus=$_POST['campus'];
  $reserva=$_POST['reserva'];
  $data_envio = date('y/m/d');
  $hora_envio = date('H:i:s');

  //Corpo E-mail
  $arquivo = "
    <html>
      <p><b>Nome: </b>$title</p>
      <p><b>inicio: </b>$start</p>
      <p><b>fim: </b>$fim</p>
      <p><b>E-mail: </b>$email</p>
      <p><b>Descrição: </b>$description</p>
      <p><b>Campus: </b>$campus</p>
      <p><b>Reserva: </b>$reserva</p>
      <p>Este e-mail foi enviado em <b>$data_envio</b> às <b>$hora_envio</b></p>
    </html>
  ";
  
  //Emails para quem será enviado o formulário
  $destino = "unifenasinformatica@gmail.com";
  $assunto = "Reserva efetuada";

  //Este sempre deverá existir para garantir a exibição correta dos caracteres
  $headers  = "MIME-Version: 1.0\n";
  $headers .= "Content-type: text/html; charset=iso-8859-1\n";
  $headers .= "From: $title <$email>";

  //Enviar
  mail($destino, $assunto, $arquivo, $headers);
  
  echo "<meta http-equiv='refresh' content='10;URL=../index.php'>";
?>