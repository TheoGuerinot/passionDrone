<?php include('inc/header.php');?>
<?php require_once("inc/db.php")?>
<body>
		<?php $req=$pdo->query("SELECT * FROM blog"); ?>
		<div class="container">
			<div class="row">
			<div class="col-md-1"></div>
			<div class="col-md-10">
				<?php
					if ($row=$req->fetch()) {
					echo '<article class="mt-10">';
					echo '<h3 class="text-light mx-auto m-1 text-center">'.htmlspecialchars($row->title).'</h3>';
					echo '<p class="text-light font-italic">'.htmlspecialchars($row->resume).'</p>';
					echo '<img height="400" width="920">'.$row->imgarticle1.'</img>';
					echo '<p class="text-light">'.htmlspecialchars($row->article).'</p>';
					echo '<img height="400" width="920">'.$row->imgarticle2.'</img>';
					echo '</article>';
					} else {
						echo 'Error';
					}
				?>
			</div>
			<div class="col-md-1"></div>
			</div>
		</div>
</body>