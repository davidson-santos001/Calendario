<?php

$objEvents = new  \Classes\ClassEvents();
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <title>Calendario de provas </title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="<?php echo DIRPAGE . 'lib/css/calendario.css'; ?>" rel="stylesheet">
    <link href="<?php echo DIRPAGE . 'lib/js/FullCalendar/main.min.css' ?>" rel="stylesheet">
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../../lib/js/eventos.js"></script>
    <script src="../../lib/js/form.js"></script>
    <script src="../../lib/js/index.js"></script>
    <link href="<?php echo DIRPAGE . '../../lib/css/modal.css'; ?>" rel="stylesheet">


</head>

<body>
<!-- Modal -->
<div class="modal fade" id="visualizar_M" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <!-- 'RecebIdModal' pega o Id do evento selecionado para direcionar para o editar -->
    <input id='recebeIDModal' hidden>
        <div class="modal-dialog ">
            <div class="modal-content">
                <div class="modal-header">

                    <h5 class="modal-title" id="exampleModalLabel">Detalhes do Evento </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body text-center  modal-dialog-centered" style="border-radius: 8px;">
                    <div class="shadow p-3 mb-18 bg-body rounded">
                        <div class="row d-flex justify-content-center">
                        <dt class="col-md-5">ID </dt>
                            <dd class="col-md-9" id="id_M"></dd>

                            <dt class="col-md-5">Nome do Professor</dt>
                            <dd class="col-md-9" id="title_M"></dd>

                            <dt class="col-md-5">Inicio do evento</dt>
                            <dd class="col-md-9" id="start_M"></dd>

                            <dt class="col-md-5">Fim do evento</dt>
                            <dd class="col-md-9" id="end_M"></dd>

                            <dt class="col-md-5">Descrição do evento</dt>
                            <dd class="col-md-9" id="description_M" style="text-align:center;"></dd>

                            <dt class="col-md-5">Campus do evento</dt>
                            <dd class="col-md-9" id="campus_M"></dd>

                            <dt class="col-md-5">Espaço reservado</dt>
                            <dd class="col-md-9" id="reserva_M"></dd>

<hr>
                        </div>
                        <a href="../../controllers/listar_usuario.html"><button class="btn btn-primary" type="button">Listar eventos </button></a>
                        <a><button type="button" class="btn btn-success" onclick="editar()">Editar</button></a>
                        <a><button type="button" class="btn btn-danger" onclick="deletar()">Deletar</button></a>
                    </div>
                </div>
            </div>
        </div>  
    </div>
    <!-- Modal -->
    <div class="modal fade" id="visualizar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog ">
            <div class="modal-content">
                <div class="modal-header">

                    <h5 class="modal-title " id="exampleModalLabel">Detalhes do Evento </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body text-center  modal-dialog-centered" style="border-radius: 8px;">
                    <div class="shadow p-3 mb-18 bg-body rounded">
                        <div class="row d-flex justify-content-center">

                            <dt class="col-md-5">Nome do Professor</dt>
                            <dd class="col-md-9" id="title"></dd>

                            <dt class="col-md-5">Inicio do evento</dt>
                            <dd class="col-md-9" id="start"></dd>

                            <dt class="col-md-5">Fim do evento</dt>
                            <dd class="col-md-9" id="end"></dd>

                            <dt class="col-md-5">Descrição do evento</dt>
                            <dd class="col-md-9" id="description" style="text-align:center;"></dd>

                            <dt class="col-md-5">Campus do evento</dt>
                            <dd class="col-md-9" id="campus"></dd>

                            <dt class="col-md-5">Espaço reservado</dt>
                            <dd class="col-md-9" id="reserva"></dd>


                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>