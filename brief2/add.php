<?php
require 'config.php';
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="styles.css">
    <title>Ajout d'un article</title>
</head>
<body>
<form method="POST">
    <table>
        <thead>
        <tr>
            <th><label>Nom du produit</label></th>
            <th><input type="text" name="nom_produit" required></th>
            <th><label>Tarif</label></th>
            <th><input type="number" name="tarif" required></th>
            <th><label>Stock</label></th>
            <th><input type="number" name="stock" required></th>
            <th><button type="submit">Valider</button></th>
        </tr>
        </thead>
    </table>
</form>

<?php
// Vérification si le formulaire est soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    try {
        $stmt = $pdo->prepare('INSERT INTO articles (nom, prix, stock) VALUES (?, ?, ?)');
        $stmt->execute([$_POST['nom_produit'], $_POST['tarif'], $_POST['stock']]);
        echo "Produit ajouté avec succès !";
    } catch (PDOException $e) {
        echo 'Une erreur est survenue : ' . $e->getMessage();
    }
}
?>
<a href="index.php">Retour à la liste des produits</a>
</body>
</html>
