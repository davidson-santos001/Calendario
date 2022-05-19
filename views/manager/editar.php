<?php include("../../config/config.php"); ?>
<?php include(DIRREQ . "lib/html/header.php"); ?>
<?php
$objEvents = new \Classes\ClassEvents();
$date = new DateTime();
$events = $objEvents->buscaEventoPorId($_GET['id']);
// $date = strtotime($events['start']);
// var_dump(intval($events['id']));die;
$date = new \DateTime($events['start']);
$date2 = new \DateTime($events['end']);
$description = ($events['description']);

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
    <link href="<?php echo DIRPAGE . '../../lib/css/form.css'; ?>" rel="stylesheet">
    <script src="../../lib/js/form.js"></script>

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
                                        <span class="modal-title modal-content bg-success text-white modal-title text-center">
                                            <h5>Faça a sua Reserva</h5>
                                        </span>

                                        <div class="shadow p-3 mb-5 bg-body rounded">
                                            <form name="formEditar" id="formEditar" method="post" class="form-control " action="<?php echo DIRPAGE . 'controllers/ControllerEditar.php'; ?>">
                                                <img src="../../img/logo.jpg" id="Uimg" class="img-fluid mx-auto d-block border-bottom" alt="unifenas">
                                                <input type="hidden" name="idForm" id="idForm" class="form-control form-control-sm" value="<?php echo intval($events['id']); ?>"><br>
                                                <!-- Aqui tu vai montar uma mini validação -->
                                                <?php
                                                if ($events['start'] != '' && $events['start'] != null) {
                                                ?>
                                                    <label for="Data" class="form-label">
                                                        <h6>Data:</h5>
                                                    </label><input type="date" name="date" id="date" class="form-control form-control-sm" value="<?php echo  $date->format('Y-m-d'); ?>" required>
                                                <?php } else { ?>
                                                    <label for="Data" class="form-label">
                                                        <h6>Data:</h5>
                                                    </label><input type="date" name="date" id="date" class="form-control form-control-sm" value="<?php echo  $date->format('Y-m-d'); ?>" required>
                                                <?php } ?>
                                                <label for="inicio" class="form-label">
                                                    <h6>Inicio:</h6>
                                                </label><input type="time" name="time" id="time" class="form-control form-control-sm" value="<?php echo $date->format('H:i:s'); ?>" required>

                                                <label for="fim" class="form-label">
                                                    <h6>Final:</h6>
                                                </label><input type="time" name="fim" id="fim" class="form-control form-control-sm" value="<?php echo $date2->format('H:i:s'); ?>" required>

                                                <label for="professor" class="form-label">
                                                    <h6>Professor:</h6>
                                                </label><input type="text" name="title" id="title" placeholder="ex:Prof.Davidson" class="form-control form-control-sm" value="<?php echo $events['title'];
                                                                                                                                                                                ?>" required>
                                                <label for="descricao" class="form-label">
                                                    <h6>Descrição:</h6>
                                                </label>
                                                <br>

                                                <input class="form-control form-control-sm" type="text" name="description" id="description" style="height: 100px" value="<?php echo $events['description']; ?>">

                                                <br>
                                                <h6 class="form-label">
                                                    Escolha o campus:
                                                </h6>

                                                <div class="form-check form-check-inline">
                                                    <input type="radio" id="itapoa" name="campus" required value="Itapoã" value="<?php echo $events['campus'];
                                                                                                                                    ?>" onclick="ver_sala_itapoa()" class="form-check-input">
                                                    <label class="form-check-label" for="inlineRadio1">Itapoã</label>
                                                </div>
                                                <div class="form-check form-check-inline ">
                                                    <input type="radio" id="jaragua" name="campus" required value="Jaraguá" value="<?php echo $events['campus'];
                                                                                                                                    ?>" onclick="ver_sala_jaragua()" class="form-check-input">
                                                    <label class="form-check-label " for="inlineRadio2">Jaraguá</label>
                                                </div>

                                                <h6 id="text" class="form-label" hidden>Selecione a sala ou Laboratorio:
                                                </h6>

                                                <select name="reserva" id="opcao" class="form-select " value="<?php echo $events['reserva'];
                                                                                                                ?>" aria-label="Default select example" hidden>
                                                    <optgroup id="Campus Itapoa" label="Campus Itapoã" class="list-group-item-primary">
                                                        <option id="selecionei" value="selecionei">Selecione</option>
                                                        <option id="sala_01" value="Sala_01">sala 01</option>
                                                        <option id="sala_02" value="Sala_02">sala 02</option>
                                                        <option id="sala_03" value="Sala_03">sala 03</option>
                                                        <option id="sala_04" value="Sala_04">sala 04</option>
                                                        <option id="sala_05" value="Sala_05">sala 05</option>
                                                        <option id="sala_06" value="Sala_06">sala 06</option>
                                                        <option id="sala_07" value="Sala_07">sala 07</option>
                                                        <option id="sala_08" value="Sala_08">sala 08</option>
                                                        <option id="sala_09" value="Sala_09">sala 09</option>
                                                        <option id="sala_10" value="Sala_10">sala 10</option>
                                                        <option id="sala_11" value="Sala_11">sala 11</option>
                                                        <option id="sala_12" value="Sala_12">sala 12</option>
                                                        <option id="sala_13" value="Sala_13">sala 13</option>
                                                        <option id="sala_14" value="Sala_14">sala 14</option>
                                                        <option id="sala_15" value="Sala_15">sala 15</option>
                                                        <option id="sala_16" value="Sala_16">sala 16</option>
                                                        <option id="sala_17" value="Sala_17">sala 17</option>
                                                        <option id="sala_18" value="Sala_18">sala 18</option>
                                                        <option id="sala_info" value="Sala de informática I">Sala da
                                                            informática
                                                        </option>
                                                        <option id="Sala_gt01i" value="Sala GT 01 I">Sala GT 01
                                                        </option>
                                                        <option id="Sala_gt02i" value="Sala GT 02 I">Sala GT 02
                                                        </option>
                                                        <option id="Sala_gt03i" value="Sala GT 03 I">Sala GT 03
                                                        </option>
                                                        <option id="Sala_gt04i" value="Sala GT 04 I">Sala GT 04
                                                        </option>
                                                        <option id="Sala_gt05i" value="Sala GT 05 I">Sala GT 05
                                                        </option>
                                                        <option id="Sala_gt06i" value="Sala GT 06 I">Sala GT 06
                                                        </option>
                                                        <option id="Sala_th01i" value="Sala TH 01 I">Sala TH 01
                                                        </option>
                                                        <option id="Sala_th02i" value="Sala TH 02 I">Sala TH 02
                                                        </option>
                                                        <option id="Sala_th03i" value="Sala TH 03 I">Sala TH 03
                                                        </option>
                                                        <option id="Sala_th04i" value="Sala TH 04 I">Sala TH 04
                                                        </option>
                                                        <option id="Sala_th05i" value="Sala TH 05 I">Sala TH 05
                                                        </option>
                                                        <option id="Sala_th06i" value="Sala TH 06  I">Sala TH 06
                                                        </option>
                                                        <option id="comunicacao_01i" value="Comunicação 01 I">
                                                            Comunicação 01</option>
                                                        <option id="comunicacao_02i" value="Comunicação 02 I">
                                                            Comunicação 02</option>
                                                        <option id="lab_morfo_01i" value="Laboratório Morfo 01 I">Lab
                                                            Morfo 01
                                                        </option>
                                                        <option id="lab_morfo_02i" value="Laboratório Morfo 02 I">Lab
                                                            Morfo 02
                                                        </option>
                                                        <option id="auditorioi" value="Auditório I">Auditorio
                                                        </option>
                                                        <option id="simulacao" value="simulacao">Simulação</option>
                                                    </optgroup>

                                                    <optgroup id="Campus Jaragua" label="Campus Jaraguá" class="list-group-item-success">
                                                        <option id="sala_301" value="Sala_301">sala 301</option>
                                                        <option id="sala_301" value="Sala_301">sala 301</option>
                                                        <option id="sala_302" value="Sala_302">sala 302</option>
                                                        <option id="sala_303" value="Sala_303">sala 303</option>
                                                        <option id="sala_304" value="Sala_304">sala 304</option>
                                                        <option id="sala_305" value="Sala_305">sala 305</option>
                                                        <option id="sala_306" value="Sala_306">sala 306</option>
                                                        <option id="sala_307" value="Sala_307">sala 307</option>
                                                        <option id="sala_308" value="Sala_308">sala 308</option>
                                                        <option id="sala_309" value="Sala_309">sala 309</option>
                                                        <option id="sala_310" value="Sala_310">sala 310</option>
                                                        <option id="sala_311" value="Sala_311">sala 311</option>
                                                        <option id="sala_th01" value="Sala_th01">sala TH 01</option>
                                                        <option id="sala_th02" value="Sala_th02">sala TH 02</option>
                                                        <option id="sala_th03" value="Sala_th03">sala TH 03</option>
                                                        <option id="sala_th04" value="Sala_th04">sala TH 04</option>
                                                        <option id="comunicacao_01" value="Comunicação 01">
                                                            Comunicação 01</option>
                                                        <option id="comunicacao_02" value="Comunicação 02">
                                                            Comunicação 02</option>
                                                        <option id="lab_anatomia_01" value="Laboratório Anatomia 01">
                                                            Laboratório
                                                            Anatomia 01</option>
                                                        <option id="lab_anatomia_02" value="Laboratório Anatomia 02">
                                                            Laboratório
                                                            Anatomia 02</option>
                                                        <option id="lab_morfo_01" value="Laboratório Morfo 01 J">
                                                            Laboratorio morfo 01
                                                        </option>
                                                        <option id="lab_morfo_02" value="Laboratório Morfo 02 J">
                                                            Laboratorio morfo 02
                                                        </option>
                                                        <option id="Sala_gt01" value="Sala GT 01 J">Sala GT 01
                                                        </option>
                                                        <option id="Sala_gt02" value="Sala GT 02 J">Sala GT 02
                                                        </option>
                                                        <option id="Sala_gt03" value="Sala GT 03 J">Sala GT 03
                                                        </option>
                                                        <option id="Sala_gt04" value="Sala GT 04 J">Sala GT 04
                                                        </option>
                                                        <option id="Sala_gt05" value="Sala GT 05 J">Sala GT 05
                                                        </option>
                                                        <option id="Sala_gt06" value="Sala GT 06 J">Sala GT 06
                                                        </option>
                                                        <option id="Sala_gt07" value="Sala GT 07 J">Sala GT 07
                                                        </option>
                                                        <option id="Sala_gt08" value="Sala GT 08 J">Sala GT 08
                                                        </option>
                                                        <option id="Sala_gt09" value="Sala GT 09 J">Sala GT 09
                                                        </option>
                                                        <option id="Sala_gt10" value="Sala GT 10 J">Sala GT 10
                                                        </option>
                                                        <option id="Sala_gt11" value="Sala GT 11 J">Sala GT 11
                                                        </option>
                                                        <option id="Sala_gt12" value="Sala GT 12 J">Sala GT 12
                                                        </option>
                                                        <option id="Sala_gt13" value="Sala GT 13 J">Sala GT 13
                                                        </option>
                                                        <option id="Sala_informática" value="Sala de informática J">
                                                            Sala da
                                                            informática</option>
                                                        <option id="auditorio" value="Auditrio J">Auditorio</option>
                                                    </optgroup>
                                                </select>
                                                <h4 hidden>Selecione uma cor de identificação:</h4>
                                                <P><input type="color" id="cor" name="cor" value="<?php echo $events['color'];
                                                                                                    ?>" hidden></P>

                                                <input class="btn btn-success " type="submit" value="Confirmar Edição">
                                                <a href="<?php echo DIRPAGE . 'controllers/ControllerDeletar.php?id=' . $_GET['id']; ?>"><button class="btn btn-danger " type="button">Deletar</button></a>
                                            </form>



                                            <!-- Bootstrap JavaScript Libraries -->
                                            <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
                                            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
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
</body>

</html>


<?php include(DIRREQ . "lib/html/footer.php"); ?>