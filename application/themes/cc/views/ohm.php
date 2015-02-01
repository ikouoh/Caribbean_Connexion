<p>
	<h3>	
		Ce site a pour vocation de vous proposer des clips '<span class="sousligne">officiels</span>' de musiques de divers genres caribéens.
	</h3>
</p>

<?php if($plus_vues): ?>
<fieldset>
	<legend>5 clips 'les plus vues' :</legend>
	<div class="video_container">
	<?php foreach($plus_vues as $clip):
            clips($clip['lien'], $clip['id'], $clip['titre'], $clip['annee'], true);
        endforeach; ?>
	</div>
</fieldset>
<?php endif; ?>

<br/>

<?php if(isset($genres)): ?>
<?php foreach($genres as $genre => $clips): ?>
<fieldset>
	<legend>5 derniers clips '<?php echo $genre; ?>':</legend>
	<div class="video_container">
	<?php foreach($clips as $clip):
            clips($clip['lien'], $clip['id'], $clip['titre'], $clip['annee'], false);
        endforeach; ?>
	</div>
</fieldset>
<br/>
<?php endforeach; ?>
<?php endif; ?>