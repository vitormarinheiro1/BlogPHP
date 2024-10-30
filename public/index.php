<?php
include '../config/config.php';
include '../templates/header.php';

$stmt = $pdo->query('SELECT * FROM posts ORDER BY created_at DESC');
$posts = $stmt->fetchAll();

?>

<h1>Blog</h1>
<a href="create_post.php">Criar Novo Post</a>
<?php foreach ($posts as $post): ?>
    <h2><a href="post.php?id=<?= $post['id'] ?>"><?= htmlspecialchars($post['title']) ?></a></h2>
    <p><?= htmlspecialchars($post['content']) ?></p>
    <hr>
<?php endforeach; ?>

<?php include '../templates/footer.php'; ?>
