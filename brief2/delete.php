<?php
require 'config.php';

try {
    // Vérifie si l'ID est bien passé dans l'URL
    if (isset($_GET['id'])) {
        $id = intval($_GET['id']); // Conversion de l'id en entier
        $sql = "DELETE FROM articles WHERE id = ?";
        $req = $pdo->prepare($sql);
        $retour = $req->execute([$id]);

        if ($retour) {
            echo 'Produit supprimé avec succès';
        } else {
            echo 'Erreur lors de la suppression';
        }
    } else {
        echo 'ID invalide ou manquant';
    }
} catch (PDOException $e) {
    echo 'Une erreur est survenue : ' . $e->getMessage();
}
?>


<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<a href="index.php">Retour à la liste des produits</a>
</body>
</html>
