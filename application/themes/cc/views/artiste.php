<?php if($liste): ?>
	<p>
		<h1>Artistes</h1> <br/>	
	</p>

        <div class="liste_container">
            <?php  foreach($artistes as $artiste):
                artistes($artiste['nom'], $artiste['image'], $artiste['voir_artiste']);
            endforeach; ?>
	</div>

<?php else: ?>

	<span id="bio">
		<h1><?php echo img($artiste['image'], '', 'mic1.jpg'); ?> - <?php echo $artiste['nom']; ?></h1>
			<h3><a href=<?php echo $artiste['voir_ile']; ?> ><?php echo $artiste['ile']; ?></a></h3>
			<p>
				 <?php echo $artiste['bio']; ?>
			</p>
	</span>
	<h2>Clips</h2>
		<div id="video_container">
		<?php foreach($clips as $clip):
                    clips($clip['lien'], $clip['id'], $clip['titre'], $clip['annee'], false);
                endforeach ?>
		</div>
<?php endif; ?>