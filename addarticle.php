<?php include('inc/header.php');?>
<?php require_once("inc/db.php")?>
<head><link rel="stylesheet" href="css/blog.css"></head>
<body>
	<div class="container">
		<div class="row">
			<div class="col-lg-1"></div>
			<div class="col-lg-10">
				<form method="post">
					<div class="mx-auto m-1" style="width:150px">
						<textarea rows="1" cols="20" type="text" name="title" placeholder="Entrer le titre" class="text-center mx-auto rounded border border-primary"></textarea><br/>
					</div>

					<textarea rows="5" cols="100%" type="text" name="resume" placeholder="Résumé de l'article" class="rounded m-1 border border-primary"></textarea><br/>

					<label for="imgresume" class="text-white">Choisir une image pour le résumé :</label><br/>
					<div class="mx-auto" style="width:150px">
						<input type="file" name="imgresume" accept="image/*" /><br/>
					</div>


					<textarea rows="20" cols="100%" type="text" name="article" placeholder="Entrer l'article" class="rounded m-1 border border-primary"></textarea><br/>
					
					<label for="imgarticle1" class="text-white">Choisir une image pour l'article :</label><br/>
					<div class="mx-auto" style="width:150px">
						<input type="file" name="imgarticle1" value="Img Article 1" class="m-1" accept="image/*" /><br/>
					</div>

					<label for="imgarticle2" class="text-white">Choisir une image pour l'article :</label><br/>
					<div class="mx-auto" style="width:150px">
						<input type="file" name="imgarticle2" value="Img Article 2" class="m-1" accept="image/*"/><br/>
					</div>

					<label for="imgarticle3" class="text-white">Choisir une image pour l'article :</label><br/>
					<div class="mx-auto" style="width:150px">
						<input type="file" name="imgarticle3" value="Img Article 3" class="m-1" accept="image/*"/><br/>
					</div>


					<div class="mx-auto" style="width:150px">
						<input type="submit" name="valider" value="Poster l'article" class="rounded border border-primary bg-dark text-white m-3">
					</div>
				</form>
			</div>
		<div class="col-lg-1"></div>
	</div>
	
	<?php 
		if(!empty($_POST->valider)){
			$title=htmlspecialchars($_POST->title);
			$resume=htmlspecialchars($_POST->resume);
			$imgresume=$_POST->imgresume;
			$article=htmlspecialchars($_POST->article);
			$imgarticle1=$_POST->imgarticle1;
			$imgarticle2=$_POST->imgarticle2;
			$imgarticle3=$_POST->imgarticle3;
			$pdo->exec("INSERT INTO blog (title, day, resume, imgresume, article, imgarticle1, imgarticle2, imgarticle3) VALUES('".$title."',NOW(),'".$resume."','".$imgresume."','".$article."','".$imgarticle1."','".$imgarticle2."','".$imgarticle3."')");
		}
	?>
</body>