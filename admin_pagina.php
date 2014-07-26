<?php
    $sSqlPaginaAdmin = "SELECT * FROM paginas WHERE id = :nIdPagina;";
    $rConsultaPaginaAdmin = $oConexao->prepare($sSqlPaginaAdmin);
    $rConsultaPaginaAdmin->bindValue(":nIdPagina",$nIdPagina,PDO::PARAM_INT);
    $rConsultaPaginaAdmin->execute();
    $vPaginaAdmin = $rConsultaPaginaAdmin->fetch(PDO::FETCH_ASSOC);
    if(isset($vPaginaAdmin) && is_array($vPaginaAdmin) && count($vPaginaAdmin) > 0){
?>

    <div class="row" style="margin-left: 5%;">
        <form method="post" action="admin">
            <input type="hidden" name="fIdPagina" id="fIdPagina" value="<?php echo $nIdPagina;?>" />
            <fieldset>
                <legend>Alterando dados da página <strong><?php echo $vPaginaAdmin['pagina']; ?></strong> </legend>
                <textarea name="fConteudoPagina" id="fConteudoPagina" rows="10" cols="50"><?php echo utf8_encode($vPaginaAdmin['conteudo']); ?></textarea>
                <div class="form-actions">
                    <button type="submit" class="btn btn-primary">Salvar</button>
                </div>
            </fieldset>
        </form>
    </div>

<script>
    jQuery(document).ready(function(){
        bkLib.onDomLoaded(function() {
            nicEditors.allTextAreas({iconsPath:'../js/nicEditorIcons.gif',buttonList:['bold','italic','underline','strikethrough','subscript','superscript','left','center','right','justify','ol','ul','fontSize','fontFamily','fontFormat','indent','outdent','link','unlink','forecolor','bgcolor','xhtml']});
        });
    });
</script>
<?php
    }else{
?>
        <p class="bg-danger" style="width: 10%; margin-left: 5%;">Página não encontrada!</p>
<?php
    }
?>