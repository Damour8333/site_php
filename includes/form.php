<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Créer une page</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css">
</head>
<body>
<div class="container">
    <h1>Créer une nouvelle page</h1>
    <form action="create_page.php" method="POST">
        <div class="form-group">
            <label for="title">Titre de la page</label>
            <input type="text" class="form-control" id="title" name="title" required>
        </div>
        <div class="form-group">
            <label for="content">Contenu</label>
            <textarea class="form-control" id="content" name="content" rows="5" required></textarea>
        </div>
        <div class="form-group">
            <label for="author">Auteur</label>
            <input type="text" class="form-control" id="author" name="author" required>
        </div>
        <button type="submit" class="btn btn-primary">Créer la page</button>
    </form>
</div>
</body>
</html>
