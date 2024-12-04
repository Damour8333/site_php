<?php
// Activer l'affichage des erreurs en développement
ini_set('display_errors', 1);
error_reporting(E_ALL);

// Inclusion de la connexion à la base de données
require_once '../config/database.php';

// Requête SQL pour récupérer toutes les pages
$query = "SELECT * FROM pages";
$statement = $pdo->query($query);
$pages = $statement->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des Pages</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css">
</head>
<body>
<div class="container-fluid">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
        <div class="container">
            <a class="navbar-brand" href="../">Jef le cri</a>
        </div>
    </nav>

    <div class="mt-5 pt-5">
        <h1>Liste des pages</h1>
        <ul class="list-group">
            <?php foreach ($pages as $page): ?>
                <li class="list-group-item">
                    <!-- Correction du lien dynamique -->
                    <a href="../includes/view_page.php?id=<?= $page['id'] ?>" class="btn btn-link">
                        <?= htmlspecialchars($page['title']) ?> (par <?= htmlspecialchars($page['author']) ?>)
                    </a>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>
</div>
</body>
</html>
