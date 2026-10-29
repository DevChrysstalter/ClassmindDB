
<?php
session_start();

require_once "conecta.php";

// Verifica se o aluno está logado
if (!isset($_SESSION["aluno_id"])) {
    header("Location: index.php");
    exit;
}

// Busca os alunos cadastrados
$sql = "SELECT id, nome, cpf FROM aluno";
$resultado = $conexao->query($sql);

if (!$resultado) {
    die("Erro ao consultar alunos: " . $conexao->error);
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>ClassMind - Alunos</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f1f5f9;
            padding: 30px;
        }

        h1 {
            color: #2563eb;
        }

        table {
            width: 100%;
            background: white;
            border-collapse: collapse;
        }

        th, td {
            padding: 12px;
            border-bottom: 1px solid #ddd;
            text-align: left;
        }

        th {
            background: #2563eb;
            color: white;
        }

        a {
            color: #2563eb;
        }
    </style>
</head>

<body>

    <h1>ClassMind</h1>

    <h2>Bem-vindo, <?php echo htmlspecialchars($_SESSION["aluno_nome"]); ?>!</h2>

    <h3>Alunos cadastrados</h3>

    <table>
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>CPF</th>
        </tr>

        <?php while ($aluno = $resultado->fetch_assoc()) { ?>
            <tr>
                <td><?php echo htmlspecialchars($aluno["id"]); ?></td>
                <td><?php echo htmlspecialchars($aluno["nome"]); ?></td>
                <td><?php echo htmlspecialchars($aluno["cpf"]); ?></td>
            </tr>
        <?php } ?>

    </table>

    <br>
    <a href="index.php">Voltar ao login</a>

</body>
</html>

<?php
$conexao->close();
?>
