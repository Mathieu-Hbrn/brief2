<?php
require 'config.php';
session_start();

try {
    // Vérifie si l'ID est bien passé dans l'URL
    if (isset($_GET['id'])) {
        $id = intval($_GET['id']); // Conversion de l'id en entier
        $nom = isset($_POST['nom']) ? trim($_POST['nom']) : '';
        $prix = isset($_POST['prix']) ? trim($_POST['prix']) : '';
        $stock = isset($_POST['stock']) ? trim($_POST['stock']) : '';
        if ($nom && $prix && $stock !== '') {
            $sql = 'UPDATE articles SET nom=?, prix=?, stock=? WHERE id=?';
            $req = $pdo->prepare($sql);
            $retour=$req->execute([$nom, $prix, $stock, $id]);

            if ($retour) {
                echo "Produit mis à jour avec succès.";
            } else {
                echo "Erreur lors de la mise à jour.";
            }
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
    <link rel="stylesheet" href="styles.css">
    <title>Modification article</title>
</head>
<body>
<h1>Mise a jour d'article</h1>
<form method="post" action="">
    <table>
        <thead>
        <tr>
            <th><input type="hidden" name="id" value="<?php echo htmlspecialchars($_GET['id'] ?? ''); ?>"></th>
            <th><label>Nom du produit</label></th>
            <th><input type="text" name="nom" required></th>
            <th><label>Tarif</label></th>
            <th><input type="number" name="prix" required></th>
            <th><label>Stock</label></th>
            <th><input type="number" name="stock" required></th>
            <th><button type="submit">Valider</button></th>
        </tr>
        </thead>
    </table>
</form>

</body>
</html>
