<?php
require "./inc/header.php";
require "./inc/db.php"; // Connexion db

//  Préparation de la requête

$req = $pdo->prepare('DELETE FROM videos WHERE id=:num LIMIT 1');

// Liaison du paramètre nommé (num)

$req->bindValue(':num', $_GET['vidId'], PDO::PARAM_INT);

// Execution de la requète

$executeIsOk = $req->execute();

if($executeIsOk){
    $message = 'La vidéo a été supprimée';
    header("Location: ./myAccount.php");
}

else {
    $message = 'Echec de la suppression de la vidéo';
}
?>

