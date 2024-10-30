<?php
include '../config/config.php';
include '../templates/header.php';

$stmt = $pdo->query('SELECT * FROM posts ORDER BY created_at DESC');
$posts = $stmt->fetchAll();

function formataMes($mes){
    if($mes === 1) {
        echo "Janeiro";
    } elseif($mes === 2) {
        echo "Fevereiro";
    } elseif($mes === 3) {
        echo "Março";
    } elseif($mes === 4) {
        echo "Abril";
    } elseif($mes === 5) {
        echo "Maio";
    } elseif($mes === 6) {
        echo "Junho";
    } elseif($mes === 7) {
        echo "Julho";
    } elseif($mes === 8) {
        echo "Agosto";
    } elseif($mes === 9) {
        echo "Setembro";
    } elseif($mes === 10) {
        echo "Outubro";
    } elseif($mes === 11) {
        echo "Novembro";
    } elseif($mes === 12) {
        echo "Dezembro";
    } else {
        echo "Mês inválido";
    }
}

function formataData($data){
    $dia = (int)($data[8] . $data[9]);
    $mes = (int)($data[5] . $data[6]);
    $ano = (int)($data[0] . $data[1] . $data[2] . $data[3]);

    echo "$dia de ";
    echo formataMes($mes);
    echo " de $ano";
}
function formataHora($hora){
    echo "$hora[11]$hora[12]$hora[13]$hora[14]$hora[15]";
}
//<?= formataData(htmlspecialchars($post['created_at'])) ?>


<h1>Webinfo</h1>
<a href="create_post.php">Criar Novo Post</a>
<?php foreach ($posts as $post): ?>
    <h2><a href="post.php?id=<?= $post['id'] ?>"><?= htmlspecialchars($post['title']) ?></a></h2>
    <p>Postado por <?= htmlspecialchars($post['author']) ?> às <?= formataHora(htmlspecialchars($post['created_at'])) ?> em <?= formataData(htmlspecialchars($post['created_at'])) ?></p>
    <hr>
<?php endforeach; ?>

<?php include '../templates/footer.php'; ?>
