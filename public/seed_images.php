<?php
//require_once '../config/database.php'; // Inclure la connexion PDO

try {
    // Insertion des 10 images
    $images = [
        ['../assets/images/jef-1.jpg', 'Image 1', 'Description de l\'image 1'],
        ['../assets/images/jef-2.jpg', 'Image 2', 'Description de l\'image 2'],
        ['../assets/images/jef-3.jpg', 'Image 3', 'Description de l\'image 3'],
        ['../assets/images/jef-4.jpg', 'Image 4', 'Description de l\'image 4'],
        ['../assets/images/jef-5.jpg', 'Image 5', 'Description de l\'image 5'],
        ['../assets/images/jef-6.jpg', 'Image 6', 'Description de l\'image 6'],
        ['../assets/images/jef-7.jpg', 'Image 7', 'Description de l\'image 7'],
        ['../assets/images/jef-8.jpg', 'Image 8', 'Description de l\'image 8'],
        ['../assets/images/jef-9.jpg', 'Image 9', 'Description de l\'image 9'],
        ['../assets/images/jef-10.jpg', 'Image 10', 'Description de l\'image 10'],
    ];

    $stmt = $pdo->prepare("INSERT INTO images (url, title, alt_text) VALUES (?, ?, ?)");
    foreach ($images as $image) {
        $stmt->execute($image);
    }
    echo "Images insérées avec succès.";
} catch (PDOException $e) {
    die("Erreur lors de l'insertion des images : " . $e->getMessage());
}
