<?php
session_start();
$servername = 'localhost';
$username = 'root';
$password = '';

try {
    $bdd = new PDO("mysql:host=$servername;dbname=bigjob", $username, $password);
    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // echo 'Connexion réussie';
} catch (PDOException $e) {
    // echo "Erreur : " . $e->getMessage();
}
