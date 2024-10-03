<?php
include 'db.php';

$id = $_GET['id'];
$stmt = $pdo->prepare("SELECT * FROM usuarios WHERE id = ?");
$stmt->execute([$id]);
$usuario = $stmt->fetch(PDO::FETCH_ASSOC);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $profissao = $_POST['profissao'];

    $stmt = $pdo->prepare("UPDATE usuarios SET nome = ?, email = ?, profissao = ? WHERE id = ?");
    $stmt->execute([$nome, $email, $profissao, $id]);

    header('Location: index.php');
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Editar Usuário</title>
</head>
<body>
    <h1>Editar Usuário</h1>
    <form action="" method="POST">
        <input type="text" name="nome" value="<?= $usuario['nome'] ?>" required>
        <input type="email" name="email" value="<?= $usuario['email'] ?>" required>
        <input type="text" name="profissao" value="<?= $usuario['profissao'] ?>" required>
        <button type="submit">Atualizar</button>
    </form>
</body>
</html>
