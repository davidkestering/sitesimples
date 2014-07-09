<?php
    $sMensagem = "";
    if(isset($_POST['sOP']) && $_POST['sOP'] != "" && $_POST['sOP'] == "Enviar"){
        $sMensagem = '<font color="green">Dados enviados com sucesso, abaixo seguem os dados que você enviou:</font> <br /><br />';

        if(isset($_POST['fNome']) && $_POST['fNome'] != "")
            $sMensagem .= "Nome: ".$_POST['fNome']."<br />";
        if(isset($_POST['fEmail']) && $_POST['fEmail'] != "")
            $sMensagem .= "Email: ".$_POST['fEmail']."<br />";
        if(isset($_POST['fAssunto']) && $_POST['fAssunto'] != "")
            $sMensagem .= "Assunto: ".$_POST['fAssunto']."<br />";
        if(isset($_POST['fMensagem']) && $_POST['fMensagem'] != "")
            $sMensagem .= "Mensagem: ".$_POST['fMensagem']."<br />";

        echo $sMensagem."<br /><br />";
    }
?>

<div class="jumbotron">
<form action="contato" method="post">
    <div class="input-group">
        <input type="text" class="form-control" size="50" placeholder="Nome" name="fNome" id="fNome" />
    </div>
    <div class="input-group">
        <input type="text" class="form-control" size="50" placeholder="Email" name="fEmail" id="fEmail" />
    </div>
    <div class="input-group">
        <input type="text" class="form-control" size="50" placeholder="Assunto" name="fAssunto" id="fAssunto" />
    </div>
    <div class="input-group">
        <textarea cols="52" rows="10" class="form-control" placeholder="Mensagem" name="fMensagem" id="fMensagem"></textarea>
    </div>
    <div class="input-group">
        <input type="submit" class="form-control" name="sOP" id="sOP" value="Enviar" />
    </div>
</form>
</div>