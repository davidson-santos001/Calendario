<?php
include("../config/config.php");
$objEvents = new  \Classes\ClassEvents();

$id=filter_input(INPUT_GET,'id',FILTER_DEFAULT);
$objEvents->deleteEvento($id);

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
                    <span class="d-block p-2 bg-success text-white">Evento excluido com sucesso.</span>
                    <div class="shadow p-3 mb-5 bg-body rounded">
                    <img src="../../img/lixeira.gif" id="Uimg" class="img-fluid mx-auto d-block border-bottom" alt="unifenas">

                      <p> <br><a href="../views/manager/"> <button type="button" class="btn btn-success">Calendário</button></a>
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
 
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</body>

</html>
 <!-- Bootstrap JavaScript Libraries -->