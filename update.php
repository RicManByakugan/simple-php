<?php
require 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $email = $_POST['email'];

    $sql = "UPDATE users SET name = :name, email = :email WHERE id = :id";
    $stmt = $pdo->prepare($sql);
    
    if ($stmt->execute(['id' => $id, 'name' => $name, 'email' => $email])) {
        echo "Utilisateur mis à jour !";
    } else {
        echo "Erreur de mise à jour.";
    }
}

$id = $_GET['id'] ?? '';
?>
<h1>Modifier utilisateur numéro <?= $id ?> </h1>
<form method="POST">
    <input type="hidden" name="id" value="<?= htmlspecialchars($id) ?>">
    <input type="text" name="name" placeholder="Nom" required>
    <input type="email" name="email" placeholder="Email" required>
    <button type="submit">Mettre à jour</button>
</form>

<a href='read.php'>Liste</a><br>