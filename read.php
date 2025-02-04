<?php
require 'db.php';

$sql = "SELECT * FROM users";
$stmt = $pdo->prepare($sql);
$stmt->execute();
$users = $stmt->fetchAll(PDO::FETCH_ASSOC);

echo "
<h1>Liste utilisateur</h1>
<a href='create.php'>Créer</a><br>
<a href='read_post.php'>Liste publication</a><br>
";

foreach ($users as $user) {
    echo "ID: " . $user['id'] . " - " . $user['name'] . " - " . $user['email'] . "
    <a href='update.php?id=" . $user['id'] . "'>Modifier</a>
    <a href='delete.php?id=" . $user['id'] . "'>Supprimer</a><br>
    <br>
    ";
}
?>
