<?php
session_start();
include 'funcoes.php';

if (estáLogado()) {
    header('Location: login.php');
    exit;
}

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
    <title>Dashboard</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        header {
            background-color: #333;
            color: #fff;
            text-align: center;
            padding: 10px;
        }
        nav {
            background-color: #444;
            color: #fff;
            padding: 10px;
        }
        nav a {
            color: #fff;
            text-decoration: none;
            margin-right: 10px;
        }
        .container {
            max-width: 800px;
            margin: 20px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
        }
        h1 {
            color: #333;
        }
        ul {
            list-style: none;
            padding: 0;
        }
        ul li {
            margin-bottom: 10px;
            padding: 5px;
            border: 1px solid #ccc;
            border-radius: 5px;
            background-color: #f9f9f9;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        ul li span {
            font-weight: bold;
        }
    </style>
</head>
<body>
    <header>
        <h1>Dashboard</h1>
    </header>
    <nav>
        <a href="login.php">Login</a>
        <a href="cadastro.php">Cadastro de Alunos</a>
        <a href="dashboard.php">Dashboard</a>
    </nav>
    <div class="container">
        <h2>Informações</h2>
        <p>Bem-vindo à página inicial do sistema de controle de estacionamento da Fatec Araras. Você pode acessar as seguintes áreas:</p>
        <ul>
            <li><a href="login.php">Área de Login</a></li>
            <li><a href="cadastro.php">Cadastro de Alunos</a></li>
            <li><a href="dashboard.php">Dashboard</a></li>
        </ul>
    </div>
</body>
</html>
