<?php
$page = 'traitement';
$client = [
    'nom' => filter_input(INPUT_POST,'nom',FILTER_SANITIZE_SPECIAL_CHARS),
    'prenom' => filter_input(INPUT_POST,'prenom',FILTER_SANITIZE_SPECIAL_CHARS),
    'login' => filter_input(INPUT_POST,'login',FILTER_SANITIZE_EMAIL),
    'psw' => filter_input(INPUT_POST,'psw',FILTER_SANITIZE_SPECIAL_CHARS),
    'role' => 'client'
];
require '../securite/dsn_secure.php';

// je crée un objet PDO avec 'new PDO'
$refPdo = new PDO($db_dsn, $db_user, $db_psw); 
// important de mettre dans le mm ordre pour le login, psw, etc, que la base de données
$sql = 'INSERT INTO users VALUES(null, :login, :psw, :nom, :prenom, :role);';
$stat_user = $refPdo->prepare($sql);

$stat_user->bindParam(':nom', $client['nom'], PDO::PARAM_STR);
$stat_user->bindParam(':prenom', $client['prenom'], PDO::PARAM_STR);
$stat_user->bindParam(':login', $client['login'], PDO::PARAM_STR);
$psw = password_hash($client['psw'], PASSWORD_DEFAULT); 
$stat_user->bindParam(':psw', $psw, PDO::PARAM_STR);
$stat_user->bindParam(':role', $client['role'], PDO::PARAM_STR);
$stat_user->execute();

header('Location: /index.php');
        