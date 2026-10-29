
<?php

$host = "sql113.infinityfree.com";
$banco = "if0_43107254_meu_banco";
$usuario = "if0_43107254";
$senha = "KnigrLlCuJ";

mysqli_report(MYSQLI_REPORT_OFF);

$conexao = new mysqli(
    $host,
    $usuario,
    $senha,
    $banco,
    3306
);

if ($conexao->connect_error) {
    die("Erro na conexão: " . $conexao->connect_error);
}

$conexao->set_charset("utf8mb4");

?>
