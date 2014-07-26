<?php

    if(isset($_POST['fLogin']) && $_POST['fLogin'] != ""){
        $sSqlLogin = "SELECT * FROM usuario WHERE login = :sLogin ;";
        $rConsultaLogin = $oConexao->prepare($sSqlLogin);
        $rConsultaLogin->bindParam(":sLogin",$_POST['fLogin'],PDO::PARAM_STR);
        $rConsultaLogin->execute();
        $vLogin = $rConsultaLogin->fetch(PDO::FETCH_ASSOC);
        if(isset($vLogin) && is_array($vLogin) && count($vLogin) > 0){
            if(password_verify($_POST['fSenha'],$vLogin['senha'])){
                $_SESSION['oLoginAdmin'] = $vLogin['login'];
            }else{
                $_SESSION['sMsg'] = "O login ou a senha informados não foram encontrados no banco de dados!";
            }
        }else{
            $_SESSION['sMsg'] = "O login ou a senha informados não foram encontrados no banco de dados!!";
        }
    }

    if((isset($_POST['fLogin']) && $_POST['fLogin'] == "") || (isset($_POST['fSenha']) && $_POST['fSenha'] == ""))
        $_SESSION['sMsg'] = "Nenhum dos campos devem estar vazios!";

    if(!isset($_SESSION['oLoginAdmin'])){

?>
        <div class="row" style="margin-left: 5%;">
        <div class="col-sm-4">
            <?php
            if(isset($_SESSION['sMsg']) && $_SESSION['sMsg'] != ""){
                echo '<p class="bg-danger">'.$_SESSION['sMsg'].'</p>';
            }
            $_SESSION['sMsg'] = "";
            unset($_SESSION['sMsg']);
            ?>
        <form role="form" name="formLogin" id="formLogin" method="post" action="admin">
            <div class="form-group">
                <label for="fLogin">Login: <small>Utilize o login "admin"</small></label>
                <input type="text" class="form-control" id="fLogin" name="fLogin" placeholder="Digite o login">
            </div>
            <div class="form-group">
                <label for="fSenha">Senha: <small>Utilize a senha "123456"</small></label>
                <input type="password" class="form-control" id="fSenha" name="fSenha" placeholder="Digite a senha">
            </div>
            <button type="submit" class="btn btn-default">Logar</button>
        </form>
            </div>
        </div>

<?php
    }else{
        if(isset($_POST['fIdPagina']) && $_POST['fIdPagina'] != "" && $_POST['fIdPagina'] != "0"){
            if(isset($_POST['fConteudoPagina']) && $_POST['fConteudoPagina'] != ""){
                $sConteudoPagina = utf8_decode($_POST['fConteudoPagina']);
                $sSqlAtualizaPagina = 'UPDATE `paginas` SET conteudo = :sConteudoPagina WHERE id = :nIdPagina';
                $rAtualizaPagina = $oConexao->prepare($sSqlAtualizaPagina);
                $rAtualizaPagina->bindParam(':sConteudoPagina', $sConteudoPagina, PDO::PARAM_STR);
                $rAtualizaPagina->bindParam(':nIdPagina', $_POST['fIdPagina'], PDO::PARAM_INT);
                $rAtualizaPagina->execute();

                $_SESSION['sMsgAtualiza'] = "A página foi atualizada com sucesso!";
            }else{
                echo '<p class="bg-danger">O campo de Conteúdo da página não pode estar vazio!</p>';
            }
        }

        if(isset($nIdPagina) && $nIdPagina != "" && $nIdPagina != "0" && is_numeric($nIdPagina)){
            require_once("admin_pagina.php");
        }else{
?>
        <div class="row" style="margin-left: 5%;">
            <h3>Clique nas páginas abaixo para editar seu conteúdo!</h3>
            <br/>
            <?php
            if(isset($_SESSION['sMsgAtualiza']) && $_SESSION['sMsgAtualiza'] != ""){
                echo '<p class="bg-success" style="width:20%;">'.$_SESSION['sMsgAtualiza'].'</p>';
            }
            $_SESSION['sMsgAtualiza'] = "";
            unset($_SESSION['sMsgAtualiza']);
            ?>
            <br/>
            <div class="col-sm-4">
                <div class="list-group">
<?php
            $sSqlPaginaAdmin = "SELECT * FROM paginas;";
            $rConsultaPaginaAdmin = $oConexao->prepare($sSqlPaginaAdmin);
            $rConsultaPaginaAdmin->execute();
            $vvPaginaAdmin = $rConsultaPaginaAdmin->fetchAll(PDO::FETCH_ASSOC);
            if(isset($vvPaginaAdmin) && is_array($vvPaginaAdmin) && count($vvPaginaAdmin) > 0){
                foreach($vvPaginaAdmin as $nIndicePaginaAdmin => $vPaginaAdmin){
?>
                    <a href="../admin/<?php echo $vPaginaAdmin['id'];?>" class="list-group-item"><?php echo utf8_encode($vPaginaAdmin['pagina']); ?></a>
<?php
                }
            }
?>
                </div>
            </div>
        </div>
<?php
        }
    }
?>