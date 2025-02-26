<?php
// import du config.php
require 'config.php';
//Execution de la requête
$query = "SELECT * FROM articles";

//Exécution de la requète
$stmt = $pdo->query($query);

// Récupération des données (tableau associatif)
$articles = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="styles.css">
    <title>Document</title>
</head>

<button onclick="window.location.href = 'add.php';">Ajouter un article</button>
<?php if (!empty($articles)): ?>
    <table>
        <thead>
        <tr>
            <th>Id</th>
            <th>nom</th>
            <th>prix</th>
            <th>stock</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($articles as $a): ?>
            <tr>
                <td><?= htmlspecialchars($a['id']) ?></td>
                <td><?= htmlspecialchars($a['nom']) ?></td>
                <td><?= htmlspecialchars($a['prix']) ?></td>
                <td><?= htmlspecialchars($a['stock']) ?></td>
                <td><a href="edit.php?id=<?= $a['id']; ?>">Modifier</a></td>
                <td><a href="delete.php?id=<?= $a['id']; ?>">Supprimer</a></td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
<?php else: ?>
    <p>Aucun articles</p>
<?php endif; ?>

</body>
</html>
<?php
/*insertion avec une requête préparée

$stmt->execute([$bidule]); */
//Edition et supression
//edit.php et delete.php
/*<a href="edit.php?id=">?= $produits['id']; ?>>Modifier</a>
  $id = $_GET['id'];
?> */