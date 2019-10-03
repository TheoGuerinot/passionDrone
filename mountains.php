<?php 

require ("./inc/header.php");
//MODEL
require './inc/db.php';

$currentCategory = isset($_GET['cat']) ? $_GET['cat'] : 1;
$req = $pdo->prepare('SELECT * FROM videos WHERE video_category = :currentCategory');
$req->execute([
  ':currentCategory' => $currentCategory
]);

$videos = $req->fetchAll();
?>

<?php foreach($videos as $video) : ?>
      <h1><?= $video['video_name']; ?></h1>
      <em><?= $video['video_category']; ?></em>
      <p><?= $video['video_description']; ?></p>
      <a href="./player.php?v=<?= $video['id'] ?>">Lien vers la vidéo</a>
<?php endforeach;?>

<?php require ("./inc/footer.php");?>
  