<?php
if(!empty($_POST) && !empty($_POST['username']) && !empty($_POST['password'])){


require_once 'db.php';
require_once 'functions.php';



$req = $pdo->prepare('SELECT * FROM users WHERE (username = :username OR email = :username) AND confirmed_at IS NOT NULL');

$req->execute(['username' => $_POST['username']]);

$user = $req->fetch();

if(password_verify($_POST['password'], $user->password)){

  session_start();

  $_SESSION['auth'] = $user;

  $_SESSION['flash']['success'] = 'Vous êtes maintenant bien connecté au site';

  header('Location: ../myAccount.php');

  exit();
} else{

$_SESSION['flash']['danger'] = 'Identifiant ou mot de passe incorrecte';

}

}

?>

<?php

if(isset($_POST['id']) && isset($_POST['reset_token'])){
require 'db.php';
require 'functions.php';
$req = $pdo->prepare('SELECT * FROM users WHERE id = ? AND reset_token IS NOT NULL AND reset_token = ? AND reset_at > DATE_SUB(NOW(), INTERVAL 30 MINUTE)');
$req->execute([$_POST['id'], $_POST['reset_token']]);
$user = $req->fetch();

if($user){
  
      if(!empty($_POST['password']) && $_POST['password'] == $_POST['password_confirm']){
          $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
          $pdo->prepare('UPDATE users SET password = ?, reset_at = NULL')->execute([$password]);
          session_start();
          $_SESSION['flash']['success'] = 'Votre mot de passe a bien été modifié';
          $_SESSION['auth'] = $user;
          header('Location: ../myAccount.php');
          exit();
  }
}else{
  session_start();
  $_SESSION['flash']['error'] = "Ce token n'est pas valide";
  header('Location: login.php');
  exit();
}
}else{
header('Location: login.php');

exit();
}


?>