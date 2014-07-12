<?php

date_default_timezone_set('America/Belem');
session_start();

$sDsn = "mysql:host=localhost;dbname=site_simples";
$sUsuario = "root";
$sSenha = "1ZlhHRO2";

try{
    $oConexao = new \PDO($sDsn,$sUsuario,$sSenha);
}catch (\PDOException $e){
    echo utf8_decode("Erro código: ".$e->getCode().": ".$e->getMessage());

    echo utf8_decode("<br /><br />Olá, aparentemente o banco de dados para o funcionamento do site simples não foi encontrado, <br />por favor clique no link abaixo para iniciar a fixture de criação e inserção de conteúdo para o funcionamento do site simples!  <br /> <br />");

    echo utf8_decode("<strong>Não esqueça de alterar a senha de acesso ao mysql no arquivo <font color='blue'>conexao.php</font> e no arquivo <font color='blue'>fixture.php</font></strong> <br /> <br />");

    echo '<a href="fixture.php">Link para Iniciar a fixture</a>';

    die();
}