<p>
	<h3>	
		Ce site a pour vocation de vous proposer des clips '<span class="sousligne">officiels</span>' de musiques de divers genres caribéens.
	</h3>
</p>

<fieldset>
	<legend>5 clips 'les plus vues' :</legend>
	<div id="video_container">
	<?php foreach($plus_vues as $clip): ?>
		<div class="video_ohm">
			<a href="http://www.youtube.com/watch?v=<?php echo $clip['lien']; ?>&rel=0" rel="prettyPhoto" data-clipid="<?php echo $clip['id']; ?>">
				<span class="info_clip">
					<?php echo $clip['titre']; ?> <br/> <?php echo $clip['artistes']; ?> <br/> <?php echo $clip['genre']; ?> <br/> <?php echo $clip['annee']; ?>
				</span> 
			</a>
		</div>
	<?php endforeach; ?>
	</div>
</fieldset>
<br/>
<?php foreach($genres as $genre => $clips): ?>
<fieldset>
	<legend>5 derniers clips '<?php echo $genre; ?>':</legend>
	<div id="video_container">
	<?php foreach($clips as $clip): ?>
		<div class="video_ohm">
			<a href="http://www.youtube.com/watch?v=<?php echo $clip['lien']; ?>&rel=0" rel="prettyPhoto" data-clipid="<?php echo $clip['id']; ?>">
				<span class="info_clip">
					<?php echo $clip['titre']; ?> <br/> <?php echo $clip['artistes']; ?> <br/> <?php echo $clip['annee']; ?>
				</span> 
			</a>
		</div>
	<?php endforeach; ?>
	</div>
</fieldset>
<br/>
<?php endforeach; ?>