
<?php
session_start();

require_once "conecta.php";


if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    header("Location: index.php");
    exit;
}

$cpf = trim($_POST["cpf"] ?? "");
$senha = $_POST["senha"] ?? "";

if ($cpf === "" || $senha === "") {
    die("Preencha todos os campos. <a href='index.php'>Voltar</a>");
}


$sql = "SELECT id, nome FROM aluno WHERE cpf = ? AND senha = ?";

$stmt = $conexao->prepare($sql);

if (!$stmt) {
    die("Erro ao preparar a consulta.");
}

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
    echo "<br><a href='index.php'>Tentar novamente</a>";
}

$stmt->close();
$conexao->close();
?>
