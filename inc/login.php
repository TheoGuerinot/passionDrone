<?php
if(session_status()=== PHP_SESSION_NONE){
    session_start();
  }
if(isset($_COOKIE['remember']) && !isset($_SESSION['auth']) ){
    require_once 'db.php';
    if(!isset($pdo)){
        global $pdo;
    }
    $remember_token = $_COOKIE['remember'];
    $parts = explode('==', $remember_token);
    $user_id = $parts[0];
    $req = $pdo->prepare('SELECT * FROM users WHERE id = ?');
    $req->execute([$user_id]);
    $user = $req->fetch();
    if($user){
        $expected = $user_id . '==' . $user->remember_token . sha1($user_id . 'ratonlaveurs');
        if($expected == $remember_token){
            
            $_SESSION['auth'] = $user;
            setcookie('remember', $remember_token, time() + 60 * 60 * 24 * 7);  
        }else{
            setcookie('remember', null, -1);
            }
        }else{
            setcookie('remember', null, -1);
        }
}

if(isset($_POST['submit']) && !empty($_POST['username']) && !empty($_POST['password'])){
    require_once 'db.php';
    require_once 'functions.php';

    $req = $pdo->prepare('SELECT * FROM users WHERE (username = :username or email = :username) AND confirmed_at IS NOT NULL');
    $req->execute(['username' => $_POST['username']]);
    $user = $req->fetch();
    if(password_verify($_POST['password'], $user->password)){
        
          $_SESSION['auth'] = $user;
          
          if($_POST['remember']){
              $remember_token = str_random(250);
              $pdo->prepare('UPDATE users SET remember_token = ? WHERE id = ?')->execute([$remember_token, $user->id]);
              setcookie('remember', $user->id . '==' . $remember_token . sha1($user->id . 'ratonlaveurs'), time() + 60 * 60 * 24 * 7);
          }
          header('Location: ../accueil.php');
    $_SESSION['flash']['success'] = 'Vous êtes maintenant connecté.';

    }
}else{
    header('Location: ../login.php');
    $_SESSION['flash']['danger'] = 'Identifiant ou mot de passe incorrecte.';

}

