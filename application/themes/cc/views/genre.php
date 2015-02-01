<?php if($liste): ?>
	<p>
		<h1>Genres</h1> <br/>	
	</p>

        <div class="liste_container">
            <?php  foreach($genres as $genre):
                genres($genre['genre'], $genre['image'], $genre['voir_genre']);
            endforeach; ?>
	</div>

<?php else: ?>

	<span id="bio">
		<h1><?php echo img($genre['image'], '', 'music1.jpg'); ?> - <?php echo $genre['genre']; ?></h1>
			<p>
				 <?php echo $genre['descriptif']; ?>
			</p>
	</span>
	<h2>Clips</h2>
		<div id="video_container">
		<?php foreach($clips as $clip):
                    clips($clip['lien'], $clip['id'], $clip['titre'], $clip['annee'], false);
                endforeach ?>
		</div>
<?php endif; ?>