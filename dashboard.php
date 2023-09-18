<?php
session_start();

function estáLogado() {
    return isset($_SESSION['logado']) && $_SESSION['logado'] === true;
}

if (!estáLogado()) {
    header('Location: login.php');
    exit;
}

$alunos = file('alunos.txt', FILE_IGNORE_NEW_LINES);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
</head>
<body>
    <h1>Bem-vindo à Dashboard</h1>
    <a href="logout.php">Logout</a>

    <h2>Alunos Cadastrados</h2>
    <ul>
        <?php foreach ($alunos as $aluno): ?>
            <li><?= $aluno ?></li>
        <?php endforeach; ?>
    </ul>
</body>
</html>

