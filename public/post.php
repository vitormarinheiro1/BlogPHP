<?php
include '../config/config.php';
include '../templates/header.php';

$id = $_GET['id'];
$stmt = $pdo->prepare('SELECT * FROM posts WHERE id = ?');
$stmt->execute([$id]);
$post = $stmt->fetch();

if (!$post) {
    echo "Post não encontrado!";
    exit;
}
?>

<h1><?= htmlspecialchars($post['title']) ?></h1>
<p><?= nl2br(htmlspecialchars($post['content'])) ?></p>
<a href="index.php">Voltar</a>

<?php include '../templates/footer.php'; ?>
