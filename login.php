
<?php
session_start();

require_once "conecta.php";

$cpf = $_POST["cpf"] ?? "";
$senha = $_POST["senha"] ?? "";

// Consulta segura ao banco
$sql = "SELECT id, nome FROM aluno WHERE cpf = ? AND senha = ?";

$stmt = $conexao->prepare($sql);
$stmt->bind_param("ss", $cpf, $senha);
$stmt->execute();

$resultado = $stmt->get_result();

if ($aluno = $resultado->fetch_assoc()) {

    $_SESSION["aluno_id"] = $aluno["id"];
    $_SESSION["aluno_nome"] = $aluno["nome"];

    header("Location: lista.php");
    exit;

} else {
    echo "CPF ou senha incorretos.";
    echo "<br><a href='index.php'>Voltar ao login</a>";
}

$stmt->close();
$conexao->close();
?>
