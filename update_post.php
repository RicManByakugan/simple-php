<?php
require 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $title = $_POST['title'];
    $content = $_POST['content'];

    $sql = "UPDATE posts SET title = :title, content = :content WHERE id = :id";
    $stmt = $pdo->prepare($sql);

    if ($stmt->execute(['id' => $id, 'title' => $title, 'content' => $content])) {
        echo "Post mis à jour !";
    } else {
        echo "Erreur de mise à jour.";
    }
}

$id = $_GET['id'] ?? '';
?>
<h1>Modifier post numéro <?= $id ?> </h1>

<form method="POST">
    <input type="hidden" name="id" value="<?= htmlspecialchars($id) ?>">
    <input type="text" name="title" placeholder="Titre" required>
    <textarea name="content" placeholder="Contenu" required></textarea>
    <button type="submit">Mettre à jour</button>
</form>
<a href='read_post.php'>Liste</a><br>
