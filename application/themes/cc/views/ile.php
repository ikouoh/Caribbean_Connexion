<?php if($liste): ?>
	<p>
		<h1>Iles</h1> <br>	
	</p>

        <div class="liste_container">
            <?php  foreach($iles as $ile):
                iles($ile['ile'], $ile['image'], $ile['voir_ile']);  
            endforeach; ?>
	</div>

<?php else: ?>

	<span id="bio">
            <h1><?php echo img($ile['image'], '', 'ile2.jpg'); ?> - <?php echo $ile['ile']; ?></h1>
                <p>
                    <?php echo $ile['descriptif']; ?>
                </p>
	</span>
	<h2>Clips</h2>
		<div id="video_container">
		<?php foreach($clips as $clip):
                    clips($clip['lien'], $clip['id'], $clip['titre'], $clip['annee'], false);
                endforeach ?>
		</div>

        <h2>Artistes</h2>
            <div class="liste_container">
                <?php  foreach($artistes as $artiste):
                    artistes($artiste['nom'], $artiste['image'], $artiste['voir_artiste']);
                endforeach; ?>
            </div>

<?php endif; ?>