<?php include('inc/header.php');?>


<?php 

require './inc/db.php';

$currentVideo = isset($_GET['v']) ? $_GET['v'] : 1;
$req = $pdo->prepare('SELECT * FROM videos WHERE id = :currentVideo');
$req->execute([
  ':currentVideo' => $currentVideo
]);

$videos = $req->fetch();
?>
      
<h2 class="text-center text-white mt-5"><?= $videos->video_name; ?></h2><br>
<div class="container-fluid">
  <div class="row">
<video class="video-js vjs-big-play-centered center-block m-auto" id="my-video" width="560" height="315" controls data-setup='()'>
<source src="<?= $videos->video_url; ?>" type="video/mp4">
<p class="vjs-no-js">JavaScript est désactivé ou n'est pas supporté!</P>
</video><br><br>
  </div>
</div>
<p class="text-left text-white mt-5 text-center"><?= $videos->video_description; ?></p><br><br>


<?php require "./inc/footer.php";









