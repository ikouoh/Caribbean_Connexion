<?php if($liste): ?>
	<p>
		<h1>Iles</h1> <br>	
	</p>

	<table align="center">
		<?php  foreach($iles as $ile): ?>
			<tr>
				<td><a href=<?php echo $ile['voir_ile']; ?>><?php echo $ile['ile']; ?></a></td>
			</tr>
		<?php endforeach; ?>
	</table>

<?php else: ?>

	<span id="bio">
		<h1><?php echo $ile['ile']; ?></h1>
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

	<span id="bio">
		<h2>Artistes</h2>

		<p>
			<?php foreach($artistes as $artiste): ?>
				> <a href=<?php echo $artiste['voir_artiste']; ?> ><?php echo $artiste['nom']; ?></a> <
			<?php endforeach ?>
		</p>
	</span>

<?php endif; ?>