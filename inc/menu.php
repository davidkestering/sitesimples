<nav class="navbar navbar-default" role="navigation">
    <div class="container-fluid">
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li <?=(isset($sPagina) && $sPagina != "" && $sPagina == "inicial") ? 'class="active"' : ""; ?>><a href="index">Home</a></li>
                <li <?=(isset($sPagina) && $sPagina != "" && $sPagina == "empresa") ? 'class="active"' : ""; ?>><a href="empresa">Empresa</a></li>
                <li <?=(isset($sPagina) && $sPagina != "" && $sPagina == "produtos") ? 'class="active"' : ""; ?>><a href="produtos">Produtos</a></li>
                <li <?=(isset($sPagina) && $sPagina != "" && $sPagina == "servicos") ? 'class="active"' : ""; ?>><a href="servicos">Serviços</a></li>
                <li <?=(isset($sPagina) && $sPagina != "" && $sPagina == "contato") ? 'class="active"' : ""; ?>><a href="contato">Contato</a></li>
            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>