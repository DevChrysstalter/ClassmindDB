
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ClassMind - Login</title>

    <style>
        * {
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }

        body {
            margin: 0;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            background: #f1f5f9;
        }

        .login {
            background: white;
            width: 360px;
            padding: 35px;
            border-radius: 12px;
            box-shadow: 0 5px 20px #00000015;
        }

        .logo {
            text-align: center;
            color: #2563eb;
            font-size: 28px;
            font-weight: bold;
            margin-bottom: 8px;
        }

        .subtitle {
            text-align: center;
            color: #64748b;
            margin-bottom: 30px;
        }

        label {
            display: block;
            margin-bottom: 7px;
            color: #334155;
        }

        input {
            width: 100%;
            padding: 12px;
            margin-bottom: 18px;
            border: 1px solid #cbd5e1;
            border-radius: 7px;
        }

        button {
            width: 100%;
            padding: 13px;
            border: none;
            border-radius: 7px;
            background: #2563eb;
            color: white;
            font-weight: bold;
            cursor: pointer;
        }

        button:hover {
            background: #1d4ed8;
        }
    </style>
</head>

<body>

    <div class="login">

        <div class="logo">ClassMind</div>
        <div class="subtitle">Acesse sua conta acadêmica</div>

        <form action="login.php" method="POST">

            <label>CPF</label>
            <input type="text" name="cpf"
                   placeholder="Digite seu CPF"
                   maxlength="11" required>

            <label>Senha</label>
            <input type="password" name="senha"
                   placeholder="Digite sua senha" required>

            <button type="submit">Entrar</button>

        </form>

    </div>

</body>
</html>
