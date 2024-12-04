<?php
// Inclure la connexion à la base de données
require_once '../config/database.php'; 

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Récupérer les données du formulaire et les sécuriser avec htmlspecialchars
    $title = htmlspecialchars($_POST['title']);
    $content = htmlspecialchars($_POST['content']);
    $author = htmlspecialchars($_POST['author']);

    // Vérification que les champs ne sont pas vides (validation côté serveur)
    if (empty($title) || empty($content) || empty($author)) {
        $error_message = "Tous les champs sont obligatoires.";
    } else {
        // Préparer la requête pour insérer une nouvelle page dans la base de données
        try {
            $stmt = $pdo->prepare("INSERT INTO pages (title, content, author) VALUES (:title, :content, :author)");
            $stmt->execute([
                ':title' => $title,
                ':content' => $content,
                ':author' => $author
            ]);

            // Redirection vers la page nouvellement créée après l'insertion
            header("Location: view_page.php?id=" . $pdo->lastInsertId());
            exit;
        } catch (PDOException $e) {
            $error_message = "Erreur lors de l'ajout de la page : " . $e->getMessage();
        }
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Créer une page</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>

<div class="container mt-5">
    <h2 class="text-center mb-4">Créer une Nouvelle Page</h2>

    <!-- Affichage des messages d'erreur ou de succès -->
    <?php if (isset($error_message)): ?>
        <div class="alert alert-danger">
            <?= htmlspecialchars($error_message) ?>
        </div>
    <?php endif; ?>

    <form method="POST">
        <div class="form-group">
            <label for="title">Titre de la page</label>
            <input type="text" name="title" id="title" class="form-control" placeholder="Titre de la page" required>
        </div>

        <div class="form-group">
            <label for="content">Contenu de la page</label>
            <textarea name="content" id="content" class="form-control" placeholder="Contenu de la page" rows="5" required></textarea>
        </div>

        <div class="form-group">
            <label for="author">Auteur</label>
            <input type="text" name="author" id="author" class="form-control" placeholder="Auteur" required>
        </div>

        <div class="form-group text-center">
            <button type="submit" class="btn btn-primary">Créer la page</button>
        </div>
    </form>
</div>

<!-- Footer -->
<footer class="text-center mt-4">
    <p>&copy; 2024 Mon Site - Tous droits réservés</p>
</footer>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIKWjFf5+M7y3tEjNVSS4B4z0RDi9tAVNGp8FjcJ8T+AV36g2dCo6j" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-pzjw8f+ua7Kw1TIq0wJX9dVZl+5pLjoJl1q9Z9rPz0f6Vzt2sVbz4B5I4Gv3xoA4z" crossorigin="anonymous"></script>

</body>
</html>
