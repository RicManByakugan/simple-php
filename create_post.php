<?php
require 'db.php';

$users = $pdo->query("SELECT id, name FROM users")->fetchAll(PDO::FETCH_ASSOC);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user_id = $_POST['user_id'];
    $title = $_POST['title'];
    $content = $_POST['content'];

    $sql = "INSERT INTO posts (user_id, title, content) VALUES (:user_id, :title, :content)";
    $stmt = $pdo->prepare($sql);

    if ($stmt->execute(['user_id' => $user_id, 'title' => $title, 'content' => $content])) {
        echo "Post ajouté avec succès !";
    } else {
        echo "Erreur lors de l'ajout.";
    }
}
?>
<h1>Créer post </h1>

<form method="POST">
    <select name="user_id" required>
        <option value="">Sélectionner un utilisateur</option>
        <?php foreach ($users as $user): ?>
            <option value="<?= $user['id'] ?>"><?= htmlspecialchars($user['name']) ?></option>
        <?php endforeach; ?>
    </select>
    <input type="text" name="title" placeholder="Titre du post" required>
    <textarea name="content" placeholder="Contenu du post" required></textarea>
    <button type="submit">Ajouter</button>
</form>
<a href='read_post.php'>Liste</a><br>

