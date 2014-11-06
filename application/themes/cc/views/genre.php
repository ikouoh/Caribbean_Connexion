<?php if($liste): ?>
	<p>
		<h1>Genres</h1> <br/>	
	</p>

	<table align="center">
		<?php  foreach($genres as $genre): ?>
			<tr>
				<td><a href="<?php echo $genre['voir_genre']; ?>" ><?php echo $genre['genre']; ?></a></td>
			</tr>
		<?php endforeach; ?>
	</table>

<?php else: ?>

	<span id="bio">
		<h1><img src=> - <?php echo $genre['genre']; ?></h1>
			<p>
				 <?php echo $genre['descriptif']; ?>
			</p>
	</span>
	<h2>Clips</h2>
		<div id="video_container">
		<?php foreach($clips as $clip): ?>
			<div class="video">
				<a href="http://www.youtube.com/watch?v=<?php echo $clip['lien']; ?>&rel=0" rel="prettyPhoto">
					<span class="info_clip">
						<?php echo $clip['titre']; ?> <br/> <?php echo $clip['artistes']; ?> <br/> <?php echo $clip['annee']; ?>
					</span> 
				</a>
			</div>
		<?php endforeach ?>
		</div>
<?php endif; ?>