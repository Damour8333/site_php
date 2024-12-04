<?php
// Définir les variables de connexion à la base de données
$host = 'localhost';       // Hôte de la base de données (en local, généralement 'localhost')
$db = 'mon_site_db';       // Nom de la base de données
$user = 'root';            // Nom d'utilisateur pour la base de données (en local 'root')
$pass = '';                // Mot de passe pour la base de données (vide si pas de mot de passe)

// Tentative de connexion à la base de données avec PDO
try {
    // Connexion PDO avec les variables définies ci-dessus
    $pdo = new PDO("mysql:host=$host;dbname=$db", $user, $pass); 
    // Définir le mode d'erreur pour afficher les erreurs de manière détaillée
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);   
    echo "Connexion réussie à la base de données.";  // Si la connexion réussit
} catch (PDOException $e) {
    // En cas d'erreur de connexion, afficher le message d'erreur
    die("La connexion échoue : " . $e->getMessage());
}

// Tentative de création de la table 'images' (si elle n'existe pas)
try {
    // SQL pour créer la table 'images'
    $sql = "
        CREATE TABLE IF NOT EXISTS images (
            id INT AUTO_INCREMENT PRIMARY KEY,    -- Identifiant unique
            url VARCHAR(255) NOT NULL,            -- URL de l'image
            title VARCHAR(255) DEFAULT NULL,      -- Titre de l'image
            alt_text VARCHAR(255) DEFAULT NULL,   -- Texte alternatif pour l'image
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP -- Date de création
        );
    ";
    // Exécuter la requête SQL
    $pdo->exec($sql);
    //echo "Table 'images' créée avec succès.";  // Si la table est créée
} catch (PDOException $e) {
    // Si une erreur se produit lors de la création de la table
    die("Erreur lors de la création de la table 'images' : " . $e->getMessage());
}

?>
