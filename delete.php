<?php
require 'db.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "DELETE FROM users WHERE id = :id";
    $stmt = $pdo->prepare($sql);
    
    if ($stmt->execute(['id' => $id])) {
        echo "Utilisateur supprimé.";
    } else {
        echo "Erreur de suppression.";
    }
}
?>
<a href="read.php">Retour</a>
