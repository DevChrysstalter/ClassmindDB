
<?php

$host = "SEU_HOST_MYSQL";
$banco = "SEU_NOME_DO_BANCO";
$usuario = "SEU_USUARIO_MYSQL";
$senha = "SUA_SENHA_MYSQL";

$conexao = new mysqli($host, $usuario, $senha, $banco);

if ($conexao->connect_error) {
    die("Erro na conexão com o banco de dados.");
}

$conexao->set_charset("utf8mb4");

?>
