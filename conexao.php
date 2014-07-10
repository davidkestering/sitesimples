<?php

date_default_timezone_set('America/Belem');
session_start();

$sDsn = "mysql:host=localhost;dbname=site_kestering";
$sUsuario = "root";
$sSenha = "1ZlhHRO2";

try{
    $oConexao = new \PDO($sDsn,$sUsuario,$sSenha);
}catch (\PDOException $e){
    die("Erro código: ".$e->getCode().": ".$e->getMessage());
}