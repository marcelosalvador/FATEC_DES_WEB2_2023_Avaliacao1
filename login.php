<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $login = $_POST['login'];
    $senha = $_POST['senha'];

    if ($login === 'portaria' && $senha === 'FatecAraras') {
        $_SESSION['logado'] = true;
        header('Location: dashboard.php');
        exit;
    } else {
        $mensagemErro = 'Credenciais inválidas. Tente novamente.';
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
</head>
<body>
    <h1>Área de Login</h1>
    <?php if (isset($mensagemErro)): ?>
        <p style="color: red;"><?= $mensagemErro ?></p>
    <?php endif; ?>
    <form method="post" action="login.php">
        <label for="login">Login:</label>
        <input type="text" name="login" required><br>

        <label for="senha">Senha:</label>
        <input type="password" name="senha" required><br>

        <input type="submit" value="Login">
    </form>
</body>
</html>