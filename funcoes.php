<?php
function estáLogado() {
    return isset($_SESSION['logado']) && $_SESSION['logado'] === true;
}
?>

