<?php if($liste): ?>
	<p>
		<h1>Artistes</h1> <br/>	
	</p>

	<table align="center">
		<?php  foreach($artistes as $artiste): ?>
			<tr>
				<td><a href="<?php echo $artiste['voir_artiste']; ?>" ><?php echo $artiste['nom']; ?></a></td>
			</tr>
		<?php endforeach; ?>
	</table>

<?php else: ?>

	<span id="bio">
		<h1><?php echo img($artiste['image'], $artiste['nom']); ?> - <?php echo $artiste['nom']; ?></h1>
			<h3><a href=<?php echo $artiste['voir_ile']; ?> ><?php echo $artiste['ile']; ?></a></h3>
			<p>
				 <?php echo $artiste['bio']; ?>
			</p>
	</span>
	<h2>Clips</h2>
		<div id="video_container">
		<?php foreach($clips as $clip): ?>
			<div class="video">
				<a href="http://www.youtube.com/watch?v=<?php echo $clip['lien']; ?>&rel=0" rel="prettyPhoto" data-clipid="<?php echo $clip['id']; ?>">
					<span class="info_clip">
						<?php echo $clip['titre']; ?> <br/> <?php echo $clip['artistes']; ?> <br/> <?php echo $clip['genre']; ?> <br/> <?php echo $clip['annee']; ?>
					</span> 
				</a>
			</div>
		<?php endforeach ?>
		</div>
<?php endif; ?>