<?php
if(session_status()=== PHP_SESSION_NONE){
  session_start();
 
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css">
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.4.1/css/swiper.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.4.1/css/swiper.min.css">
    <link href="https://fonts.googleapis.com/css?family=Wallpoet" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="node_modules/video.js/dist/video-js.min.css">
    
    
    
   
    <title>Drone Passion</title>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-dark">
  <a class="navbar-brand text-white" href="accueil.php"><img src="img/passion-drone.svg" alt="logo" class="logo"></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon bg-white"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item">
        <a class="nav-link text-white " href="collections.php"><i class="fab fa-youtube mr-1 ml-2"></i> Collections</a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-white " href="./blog.php"><i class="far fa-newspaper"></i>   News</a>
      </li>
    </ul>
    <form method="GET" action ="search.php" class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2 bg-dark border border-info" type="search" placeholder="Rechercher" aria-label="Search" name="q">
    </form>
    <?php if(isset($_SESSION['auth'])): ?>
      
      <a href="upload.php" class="btn btn-outline-info my- my-sm-2 mr-1">Upload <i class="fas fa-cloud-upload-alt"></i></a> 
      <a href="myAccount.php" class="btn btn-outline-info my- my-sm-2 mr-1">Mon compte</a>
      <a href="logout.php" class="btn btn-outline-info my- my-sm-2 mr-1">Déconnexion</a>
<?php else: ?>
      <a href="./login.php" class="btn btn-outline-info my- my-sm-2 mr-1">Connexion</a>
      <a href="register.php" class="btn btn-outline-info my- my-sm-2 mr-1">Inscription</a> 
      <a href="login.php" class="btn btn-outline-info my- my-sm-2 mr-1">Upload <i class="fas fa-cloud-upload-alt"></i></a> 
<?php endif; ?>
  </div>
</nav>


  <div class="container">
      <?php if(isset($_SESSION['flash'])): 
        echo'test';?>
        

      <?php foreach($_SESSION['flash'] as $type => $message): ?>

        <div class="alert alert-<?= $type;?>">
          <?= $message; ?>
        </div>


      <?php endforeach; ?>

      <?php unset($_SESSION['flash']); ?>


      <?php endif; ?>

  </div>
</head>
