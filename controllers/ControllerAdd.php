<?php
include("../config/config.php");
$objEvents = new  \Classes\ClassEvents();

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

$objEvents->criarEventos(
  0,
  $title,
  $start->format("y-m-d H:i:s"),
  $fim,
  $description,
  $campus,
  $reserva,
  $cor


);


?>
       
<!DOCTYPE html>
<html lang="pt-br">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>formulario de agendamento</title>

  <script src="../../lib/js/form.js"></script>
  <script src="../../lib/js/eventos.js"></script>
  <link rel="stylesheet" href="../../lib/css/form.css">

</head>

<body>
  <div id="container ">
    <div class="container-sm">
      <div class="container-md">
        <div class="container-lg">
          <div class="container-xl">
            <div class="container-xxl">
              <div class="container-fluid">
                <div class="row d-flex justify-content-center">
                  <div class="col-md-5">
                    <span class="d-block p-2 bg-success text-white">Reserva efetuada com sucesso.</span>
                    <div class="shadow p-3 mb-5 bg-body rounded">
                      <label for="staticEmail" class="form-label">Nome:</label>
                      <input class="form-control form-control-sm" type="text" value="<?php echo  $title ?>" aria-label="Disabled input example" disabled readonly>

                      <label for="staticEmail" class="form-label">Inicio</label>
                      <input class="form-control form-control-sm" type="text" value="<?php echo $start = date('d-m-y H:i:s', strtotime("{$date}{$time}")); ?>" aria-label="Disabled input example" disabled readonly>
                      <label for="staticEmail" class="form-label">Fim </label>
                      <input class="form-control form-control-sm" type="text" value="<?php echo $fim = date('d-m-y H:i:s', strtotime("{$date2}{$end}")); ?>" aria-label="Disabled input example" disabled readonly>
                      <label for="staticEmail" class="form-label">Descri????o</label>
                      <input class="form-control form-control-sm" type="text" value="<?php echo $description ?>" aria-label="Disabled input example" disabled readonly>
                      <label for="staticEmail" class="form-label">Campus</label>
                      <input class="form-control form-control-sm" type="text" value="<?php echo  $campus ?>" aria-label="Disabled input example" disabled readonly>
                      <label for="staticEmail" class="form-label">Sala ou laborat??rio:</label>
                      <input class="form-control form-control-sm" type="text" value="<?php echo  $reserva ?>" aria-label="Disabled input example" disabled readonly>

                      <p> <br><a href="../views/user/"> <button type="button" class="btn btn-success">Calend??rio</button></a>
                        <a href="../index.php"> <button type="button" class="btn btn-success">Home</button></a>
                      </p>

                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Bootstrap JavaScript Libraries -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</body>

</html>