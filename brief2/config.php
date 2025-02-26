<?php

// Informations de connexion à la base de données
$host = "localhost";
$dbname = "produits";
$user = "root";
$pass = "";

try {
    // Création d'une instance PDO
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $user, $pass);
    //config PDO en cas d'exception
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException$e) {
    // Si erreur de connexion
    die("erreur de connexion : " .$e->getMessage());
}



