<?php
    date_default_timezone_set('America/Belem');
    session_start();

    function verificaRota($sPagina) {
        $vPaginas = ["index","inicial","empresa","produtos","servicos","contato"];
        if(in_array($sPagina,$vPaginas)){
            if(is_file(__DIR__."/".$sPagina.".php")){
                if($sPagina == "index")
                    $sPagina = "inicial";
                require_once($sPagina.".php");
            }
        }else{
            if($sPagina == "")
                require_once("inicial.php");
            else
                require_once("erro.php");
        }//if(in_array($sPagina,$vPaginas)){
    }//function verificaRota($sPagina) use $vPaginas {

    $vRota = parse_url("http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);

    $sPaginaRota = $vRota['path'];
    $sPagina = substr($sPaginaRota,1);
    $sPagina = strtolower($sPagina);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap 101 Template</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
<?php
    require_once("inc/menu.php");
    verificaRota($sPagina);
?>

<div class="panel-footer">Todos os direitos reservados - <?php echo date("Y")?></div>

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="js/bootstrap.min.js"></script>
</body>
</html>