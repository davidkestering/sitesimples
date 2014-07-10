<?php
    $sSqlMenu = "SELECT pagina FROM paginas;";
    $rConsultaMenu = $oConexao->prepare($sSqlMenu);
    $rConsultaMenu->execute();
    $vMenu = $rConsultaMenu->fetchAll(PDO::FETCH_ASSOC);
?>
<nav class="navbar navbar-default" role="navigation">
    <div class="container-fluid">
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <?php
                    if(isset($vMenu) && is_array($vMenu)){
                        foreach($vMenu as $nIndice => $vsPagina){
                            if(isset($vsPagina) && is_array($vsPagina) && $vsPagina['pagina'] != ""){
                ?>
                <li <?=(isset($sPagina) && $sPagina != "" && $sPagina == strtolower(str_replace("ç","c",utf8_encode($vsPagina['pagina'])))) ? 'class="active"' : ""; ?>>
                    <a href="<?=strtolower(str_replace("ç","c",utf8_encode($vsPagina['pagina'])))?>">
                        <?=(strtolower($vsPagina['pagina']) == "index") ? "Home" : ucfirst(utf8_encode($vsPagina['pagina']))?>
                    </a>
                </li>
                <?php
                            }//if(isset($vsPagina) && is_array($vsPagina) && $vsPagina['pagina'] != ""){
                        }//foreach($rRes as $nIndice => $vsPagina){
                    }//if(isset($rRes) && is_array($rRes)){
                ?>
            </ul>
            <form class="navbar-form navbar-right" action="index" method="post">
                <input type="text" class="form-control" name="fPesquisa" id="fPesquisa" placeholder="Pesquisar">
            </form>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>