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
