<?php
require 'db.php';

$sql = "SELECT posts.id, posts.title, posts.content, posts.created_at, 
               users.name AS author, users.email
        FROM posts
        JOIN users ON posts.user_id = users.id
        ORDER BY posts.created_at DESC";

$stmt = $pdo->prepare($sql);
$stmt->execute();
$posts = $stmt->fetchAll(PDO::FETCH_ASSOC);

echo "
<h1>Liste publication</h1>
<a href='create_post.php'>Créer</a><br>
<a href='read.php'>Liste utilisateur</a><br>
";

foreach ($posts as $post) {
    echo "<h3>" . htmlspecialchars($post['title']) . "</h3>";
    echo "<p>" . htmlspecialchars($post['content']) . "</p>";
    echo "<small>Écrit par : " . htmlspecialchars($post['author']) . " (" . $post['email'] . ") le " . $post['created_at'] . "</small><br><br>";
    echo "<a href='update_post.php?id=". $post['id']. "'>Modifier</a> | ";
    echo "<a href='delete_post.php?id=". $post['id']. "'>Supprimer</a><br><br>";
}
?>
