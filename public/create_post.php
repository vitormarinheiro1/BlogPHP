<?php
include '../config/config.php';
include '../templates/header.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Captura os dados do formulário
    $title = $_POST['title'];
    $content = $_POST['content'];

    // Prepara a inserção no banco de dados
    $stmt = $pdo->prepare('INSERT INTO posts (title, content) VALUES (?, ?)');
    $stmt->execute([$title, $content]);

    echo "<p>Post criado com sucesso!</p>";
}
?>

<h1>Criar Novo Post</h1>
<form action="" method="POST">
    <label for="title">Título:</label><br>
    <input type="text" id="title" name="title" required><br><br>
    
    <label for="content">Conteúdo:</label><br>
    <textarea id="content" name="content" rows="4" required></textarea><br><br>
    
    <input type="submit" value="Criar Post">
</form>

<a href="index.php">Voltar</a>

<?php include '../templates/footer.php'; ?>
