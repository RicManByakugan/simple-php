<?php
require 'db.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "DELETE FROM posts WHERE id = :id";
    $stmt = $pdo->prepare($sql);

    if ($stmt->execute(['id' => $id])) {
        echo "Post supprimé.";
    } else {
        echo "Erreur de suppression.";
    }
}
?>
<a href="read_post.php">Retour</a>
