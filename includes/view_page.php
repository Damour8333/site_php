<?php
// Activer l'affichage des erreurs en développement
ini_set('display_errors', 1);
error_reporting(E_ALL);

// Inclusion de la connexion à la base de données
require_once '../config/database.php';  // Assure-toi que ce chemin est correct

// Récupérer l'ID de la page à partir de l'URL
$page_id = isset($_GET['id']) ? (int)$_GET['id'] : null;  // Vérification de l'ID

if ($page_id) {
    // Préparer la requête pour récupérer la page
    $stmt = $pdo->prepare("SELECT title, content, author, created_at FROM pages WHERE id = :id");
    $stmt->execute([':id' => $page_id]);

    // Vérifier si la page existe
    if ($stmt->rowCount() > 0) {
        // Récupérer les données de la page
        $page = $stmt->fetch();
        $title = htmlspecialchars($page['title']);
        $content = nl2br(htmlspecialchars_decode($page['content'])); // Préserver le formatage du texte
        $author = htmlspecialchars($page['author']);
        $created_at = $page['created_at'];
    } else {
        // Si la page n'existe pas, rediriger vers l'index
        header("Location: ../index.php");  // Utilisation d'un chemin relatif correct
        exit;
    }
} else {
    // Si l'ID est manquant ou invalide, rediriger vers l'index
    header("Location: ../index.php");  // Utilisation d'un chemin relatif correct
    exit;
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?> - Mon Site</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css">
</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
        <a class="navbar-brand" href="../">Jef le cri</a>  <!-- Lien relatif vers l'index -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active">
                    < class="nav-link" href=<a class="nav-link"  href="../public/index.php">Retour à l'index</a>

                    <!-- Lien relatif vers l'index -->
                </li>
            </ul>
        </div>
    </div>
</nav>

<!-- Contenu principal de la page -->
<div class="container mt-5 pt-5"> <!-- pt-5 pour compenser la hauteur du navbar fixe -->
    <div class="row">
        <div class="col-lg-8 mx-auto">
            <div class="card shadow-lg mb-4">
                <div class="card-header bg-primary text-white">
                    <h2 class="card-title"><?= $title ?></h2>
                    <p class="card-subtitle text-light">Créée par <?= $author ?> le <?= date("d M Y", strtotime($created_at)) ?></p>
                </div>
                <div class="card-body">
                    <p><?= $content ?></p> <!-- Affichage du contenu formaté -->
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Footer -->
<footer class="bg-dark text-white text-center py-3">
    <p>&copy; 2024 Mon Site. Tous droits réservés.</p>
</footer>

<!-- Scripts Bootstrap -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIKWjFf5+M7y3tEjNVSS4B4z0RDi9tAVNGp8FjcJ8T+AV36g2dCo6j" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js" integrity="sha384-pzjw8f+ua7Kw1TIq0wJX9dVZl+5pLjoJl1q9Z9rPz0f6Vzt2sVbz4B5I4Gv3xoA4z" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-pzjw8f+ua7Kw1TIq0wJX9dVZl+5pLjoJl1q9Z9rPz0f6Vzt2sVbz4B5I4Gv3xoA4z" crossorigin="anonymous"></script>

</body>
</html>
