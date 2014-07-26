<?php

date_default_timezone_set('America/Belem');
session_start();

$sDsn = "mysql:host=localhost";
$sUsuario = "root";
$sSenha = "1ZlhHRO2";
$sBancoDados = "site_simples";

try{
    $oConexao = new \PDO($sDsn,$sUsuario,$sSenha);
    $oConexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sBancoDados = "`".$sBancoDados."`";
    $oConexao->exec("CREATE DATABASE IF NOT EXISTS $sBancoDados DEFAULT CHARACTER SET utf8 DEFAULT COLLATE utf8_general_ci;");
    $oConexao->exec("use $sBancoDados");
    echo "Banco de dados ".$sBancoDados." criado com sucesso! <br />";

    $sTabelaUsuario = "`usuario`";
    $sSqlCriaTabela ="DROP TABLE IF EXISTS $sTabelaUsuario;
                        CREATE TABLE IF NOT EXISTS $sTabelaUsuario (
                        `id` int(10) unsigned NOT NULL AUTO_INCREMENT PRIMARY KEY,
                          `login` varchar(255) DEFAULT NULL,
                          `senha` varchar(255) DEFAULT NULL
                        ) ENGINE=InnoDB  DEFAULT CHARSET=utf8;" ;
    $oConexao->exec($sSqlCriaTabela);
    echo "Tabela ".$sTabelaUsuario." criada com sucesso! <br />";

    $sSenha = password_hash("123456",PASSWORD_DEFAULT);
    $sSqlInsereDados = utf8_decode("TRUNCATE TABLE $sTabelaUsuario;
                        INSERT INTO $sTabelaUsuario (`id`, `login`, `senha`) VALUES
                        (1, 'admin', '$sSenha');");
    $oConexao->exec($sSqlInsereDados);
    echo utf8_decode("Usuário <strong>admin</strong> inserido com sucesso! Utilize a senha <strong>123456</strong> para acessar a área administrativa! <br />");

    $sTabela = "`paginas`";
    $sSqlCriaTabela ="DROP TABLE IF EXISTS $sTabela;
                        CREATE TABLE IF NOT EXISTS $sTabela (
                        `id` int(10) unsigned NOT NULL AUTO_INCREMENT PRIMARY KEY,
                          `pagina` varchar(255) DEFAULT NULL,
                          `conteudo` text
                        ) ENGINE=InnoDB  DEFAULT CHARSET=utf8;" ;
    $oConexao->exec($sSqlCriaTabela);
    echo "Tabela ".$sTabela." criada com sucesso! <br />";

    $sSqlInsereDados = utf8_decode("TRUNCATE TABLE $sTabela;
                        INSERT INTO $sTabela (`id`, `pagina`, `conteudo`) VALUES
                        (1, 'index', 'Página Inicial'),
                        (2, 'empresa', 'Página com dados da empresa!'),
                        (3, 'produtos', 'Página com lista de produtos!'),
                        (4, 'serviços', 'Página com lista de serviços!'),
                        (5, 'contato', 'Preencha o formulário!');");
    $oConexao->exec($sSqlInsereDados);
    echo utf8_decode("Dados inseridos com sucesso! <br /><br /> <strong>Aguarde estamos redirecionando para a página inicial!</strong> <br />");

}catch (\PDOException $e){
    die(utf8_decode("Erro código: ".$e->getCode().": ".$e->getMessage()));
}

sleep(5);

echo '<script language="javascript" type="application/javascript">window.location.href = "index";</script>';