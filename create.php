<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $profissao = $_POST['profissao'];

    $stmt = $pdo->prepare("INSERT INTO usuarios (nome, email, profissao) VALUES (?, ?, ?)");
    $stmt->execute([$nome, $email, $profissao]);

    header('Location: index.php');
}
?>
