<nav class="navbar navbar-default" role="navigation">
    <div class="container-fluid">
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li <?=(isset($_GET['sPagina']) && $_GET['sPagina'] != "" && $_GET['sPagina'] == "inicial") ? 'class="active"' : ""; ?>><a href="index.php?sPagina=inicial">Home</a></li>
                <li <?=(isset($_GET['sPagina']) && $_GET['sPagina'] != "" && $_GET['sPagina'] == "empresa") ? 'class="active"' : ""; ?>><a href="index.php?sPagina=empresa">Empresa</a></li>
                <li <?=(isset($_GET['sPagina']) && $_GET['sPagina'] != "" && $_GET['sPagina'] == "produtos") ? 'class="active"' : ""; ?>><a href="index.php?sPagina=produtos">Produtos</a></li>
                <li <?=(isset($_GET['sPagina']) && $_GET['sPagina'] != "" && $_GET['sPagina'] == "servicos") ? 'class="active"' : ""; ?>><a href="index.php?sPagina=servicos">Serviços</a></li>
                <li <?=(isset($_GET['sPagina']) && $_GET['sPagina'] != "" && $_GET['sPagina'] == "contato") ? 'class="active"' : ""; ?>><a href="index.php?sPagina=contato">Contato</a></li>
            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>