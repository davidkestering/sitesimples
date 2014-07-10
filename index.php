<?php
    require_once("conexao.php");

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

    $sSqlPagina = "SELECT * FROM paginas WHERE pagina = :sPagina ;";
    $rConsultaPagina = $oConexao->prepare($sSqlPagina);
    $rConsultaPagina->bindValue(":sPagina",strtolower(str_replace("ç","c",utf8_encode($sPagina))),PDO::PARAM_STR);
    $rConsultaPagina->execute();
    $vPagina = $rConsultaPagina->fetch(PDO::FETCH_ASSOC);
    if(isset($vPagina) && is_array($vPagina) && count($vPagina) > 0){
?>
    <h1><?=utf8_encode($vPagina['conteudo'])?></h1>
<?php
        if($vPagina['pagina'] == "contato")
            require_once("contato.php");
    }

    if(isset($_POST['fPesquisa']) && $_POST['fPesquisa'] != ""){
        $sTextoPesquisado = $_POST['fPesquisa'];
        $sTextoParaPesquisa = utf8_decode($_POST['fPesquisa']);

        $sSqlPesquisa = "SELECT * FROM paginas WHERE conteudo LIKE :sPesquisa OR pagina LIKE :sPesquisa ;";
        $rConsultaPesquisa = $oConexao->prepare($sSqlPesquisa);
        $rConsultaPesquisa->bindValue(":sPesquisa","%{$sTextoParaPesquisa}%",PDO::PARAM_STR);
        $rConsultaPesquisa->execute();
        $vvResultadoPesquisa = $rConsultaPesquisa->fetchAll(PDO::FETCH_ASSOC);

?>
<br />
<h4>Você pesquisou por "<strong style="color: blue;"><?=$_POST['fPesquisa']?></strong>"</h4>
<?php
        if(isset($vvResultadoPesquisa) && is_array($vvResultadoPesquisa) && count($vvResultadoPesquisa) > 0){
?>
<h4><?=(count($vvResultadoPesquisa) > 1) ? "Foram encontradas ".count($vvResultadoPesquisa)." referências do texto pesquisado!" : "Foi encontrada 1 referência do texto pesquisado!"?></h4>
<br />
<div class="row">
    <div class="col-sm-4">
        <div class="list-group">
<?php
            foreach($vvResultadoPesquisa as $nIndice => $vResultadoPesquisa){
?>
            <a href="<?=strtolower(str_replace("ç","c",utf8_encode($vResultadoPesquisa['pagina'])))?>" class="list-group-item"><?=ucfirst(utf8_encode($vResultadoPesquisa['pagina']))?></a>
<?php
            }
?>
        </div>
    </div><!-- /.col-sm-4 -->
</div>
<?php
        }else{
?>
<h4 style="color: red;">Não foram escontradas referências para a sua pesquisa!</h4>
<?php
        }
    }
?>
<br />
<div class="panel-footer">Todos os direitos reservados - <?php echo date("Y")?></div>

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="js/bootstrap.min.js"></script>
</body>
</html>