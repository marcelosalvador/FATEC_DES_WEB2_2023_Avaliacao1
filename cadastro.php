<?php
session_start();

function estáLogado() {
    return isset($_SESSION['logado']) && $_SESSION['logado'] === true;
}

if (!estáLogado()) {
    header('Location: login.php');
    exit;
}
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = $_POST['nome'];
    $ra = $_POST['ra'];
    $placa = $_POST['placa'];

    $arquivo = fopen('alunos.txt', 'a');
    if ($arquivo) {
        fwrite($arquivo, "$nome|$ra|$placa\n");
        fclose($arquivo);
        $mensagemSucesso = 'Cadastro realizado com sucesso.';
    } else {
        $mensagemErro = 'Erro ao abrir o arquivo de alunos.';
    }
}

$alunos = file('alunos.txt', FILE_IGNORE_NEW_LINES);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Cadastro</title>
</head>
<body>
    <h1>Cadastro de Alunos</h1>
    <a href="logout.php">Logout</a>
    
    <?php if (isset($mensagemSucesso)): ?>
        <p style="color: green;"><?= $mensagemSucesso ?></p>
    <?php endif; ?>

    <h2>Cadastrar Novo Aluno</h2>
    <form method="post" action="cadastro.php">
        <label for="nome">Nome Completo:</label>
        <input type="text" name="nome" required><br>

        <label for="ra">Registro Acadêmico (R.A.):</label>
        <input type="text" name="ra" required><br>

        <label for="placa">Placa do Carro/Moto:</label>
        <input type="text" name="placa" required><br>

        <input type="submit" value="Cadastrar">
    </form>

    <h2>Alunos Cadastrados</h2>
    <ul>
        <?php foreach ($alunos as $aluno): ?>
            <li><?= $aluno ?></li>
        <?php endforeach; ?>
    </ul>
</body>
</html>
