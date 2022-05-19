<?php include("config/config.php"); ?>
<?php include(DIRREQ . "lib/html/header.php"); ?>
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
    <title>Document</title>
    <script src="lib/js/form.js"></script>
    <script src="lib/js/index.js"></script>
    <link rel="stylesheet" href="lib/css/index.css">
</head>

<body>

    <div id="mySidenav" class="sidenav">
        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
        <a href="<?php echo DIRPAGE . 'views/manager'; ?>"><img src="img/admin.png" id="imgadmin" class="img-fluid mx-auto  " alt="Administrador">Admin</a>
        <a href="<?php echo DIRPAGE . 'views/user'; ?>">&nbsp;<img src="img/user.png" id="imguser" class="img-fluid mx-auto " alt="user">&nbsp;User</a>

        <a href="https://webmail.unifenas.br/" target="blank">&nbsp;<img src="img/webmail.png" id="imguser" class="img-fluid mx-auto " alt="Webmail">&nbsp;Webmail</a>
        <a href="https://intranet.unifenas.br/chamada/login.aspx" target="blank">&nbsp;<img src="img/chamada.png" id="imguser" class="img-fluid mx-auto " alt="Chamada">&nbsp;chamada</a>
        <a href="http://tiu.unifenas.br/" target="blank">&nbsp;<img src="img/tiu_web.png" id="imguser" class="img-fluid mx-auto " alt="Tiu Web">&nbsp;Moodle</a>

    </div> 
    <div id="container ">
        <div id="main">

            <span style="font-size:22px;cursor:pointer;font-weight: bolder;" onclick="openNav()">&#9776; Menu</span>








        </div>


        <!-- Bootstrap JavaScript Libraries-->
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</body>

</html>



<?php include(DIRREQ . "lib/html/footer.php"); ?>