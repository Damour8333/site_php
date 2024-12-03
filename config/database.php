<?php
$host = 'localhost';                   # Hôte de la base de données (généralement 'localhost' en local)
$db = 'mon_site_db';                       # Nom de la base de données
$user = 'root';                     # Nom d'utilisateur pour la base de données (ici 'root' qui est 'root')
$pass = '';                     # Mot de passe pour la base de données (ici '', vide si pas de mot de passe)

# Tentative de connexion à la base de données avec PDO
try {
    $pdo = new PDO("mysql:host=$host;dbname=$db", $user, $pass); # Connexion PDO avec les variables
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);   # Mode erreur pour afficher les erreurs de manière détaillée
} catch (PDOException $e) {
    die("Erreur : " . $e->getMessage());  # Si erreur de connexion, afficher un message d'erreur
}


try {
    // Création de la table 'images'
    $sql = "
        CREATE TABLE IF NOT EXISTS images (
            id INT AUTO_INCREMENT PRIMARY KEY,  -- Identifiant unique pour chaque image
            url VARCHAR(255) NOT NULL,          -- Chemin ou URL de l'image
            title VARCHAR(255) DEFAULT NULL,    -- Titre de l'image
            alt_text VARCHAR(255) DEFAULT NULL, -- Texte alternatif pour l'image
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP -- Date de création
        );
    ";
    $pdo->exec($sql);
    echo "Table 'images' créée avec succès.";
} catch (PDOException $e) {
    die("Erreur lors de la création de la table : " . $e->getMessage());
}

