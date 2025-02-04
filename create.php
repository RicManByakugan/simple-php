<?php
require 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];

    $sql = "INSERT INTO users (name, email) VALUES (:name, :email)";
    $stmt = $pdo->prepare($sql);
    
    if ($stmt->execute(['name' => $name, 'email' => $email])) {
        echo "Utilisateur ajouté avec succès !";
    } else {
        echo "Erreur lors de l'ajout.";
    }
}
?>
<h1>Créer utilisateur </h1>
<form method="POST">
    <input type="text" name="name" placeholder="Nom" required>
    <input type="email" name="email" placeholder="Email" required>
    <button type="submit">Ajouter</button>
</form>
<a href='read.php'>Liste</a><br>
