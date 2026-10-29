
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
    die("Preencha o CPF e a senha.");
}

$sql = "SELECT id, nome FROM aluno WHERE cpf = ? AND senha = ?";

$stmt = $conexao->prepare($sql);

if (!$stmt) {
    die("Erro na consulta: " . $conexao->error);
}

$stmt->bind_param("ss", $cpf, $senha);

if (!$stmt->execute()) {
    die("Erro ao executar a consulta.");
}

// Recupera os resultados sem get_result()
$stmt->bind_result($id, $nome);

if ($stmt->fetch()) {
    $_SESSION["aluno_id"] = $id;
    $_SESSION["aluno_nome"] = $nome;

    $stmt->close();
    $conexao->close();

    header("Location: lista.php");
    exit;
} else {
    echo "CPF ou senha incorretos.";
    echo "<br><a href='index.php'>Voltar ao login</a>";
}

$stmt->close();
$conexao->close();
?>
