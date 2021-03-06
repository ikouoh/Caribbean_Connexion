<hi>Rechercher un clip :</h1> <br>

<form method='post' action='<?php echo base_url()."recherche/resultat"; ?>'>
	<table>
		<tr>
			<td><label for='titre'>Titre</label></td>
			<td><label for='artiste'>Artiste</label></td>
			<td><label for='genre'>Genre</label></td>
			<td><label for='ile'>Ile</label></td>
			<td><label for='annee'>Année</label></td>
			<td></td>
		</tr>
			<td><input type='text' name='titre' id='titre' value="<?php echo $recherche['titre']; ?>" /></td>
			<td>
				<select name='artiste' id='artiste'>
					<option></option>
				<?php foreach($artistes as $artiste): ?>
					<option value="<?php echo $artiste['id']; ?>" <?php echo ($artiste['id'] == $recherche['artiste'])? 'selected': ''; ?> ><?php echo $artiste['nom']; ?></option>
				<?php endforeach; ?>
				</select>
			</td>
			<td>
				<select name='genre' id='genre'>
					<option></option>
				<?php foreach($genres as $genre): ?>
					<option value="<?php echo $genre['id']; ?>" <?php echo ($genre['id'] == $recherche['genre'])? 'selected': ''; ?> ><?php echo $genre['genre']; ?></option>
				<?php endforeach; ?>
				</select>
			</td>
			<td>
				<select name='ile' id='ile'>
					<option></option>
				<?php foreach($iles as $ile): ?>
					<option value="<?php echo $ile['id']; ?>" <?php echo ($ile['id'] == $recherche['ile'])? 'selected': ''; ?> ><?php echo $ile['ile']; ?></option>
				<?php endforeach; ?>
				</select>
			</td>
			<td>
				<select name='annee' id='annee'>
					<option></option>
				<?php foreach($annees as $annee): ?>
					<option value="<?php echo $annee; ?>" <?php echo ($annee == $recherche['annee'])? 'selected': ''; ?> ><?php echo $annee; ?></option>
				<?php endforeach; ?>
				</select>
			</td>
			<td><input type='submit' name='resultat' value='Rechercher' /></td>
		</tr>
	</table>
</form>
<br/>
<?php if($resultat): ?>
	<br/>
	votre recherche a retourné <?php echo $nombre; ?> résultat(s).
	<br/>
	<br/>
	<div id="video_container">
	<?php foreach($clips as $clip): ?>
		<div class="video">
			<a href="http://www.youtube.com/watch?v=<?php echo $clip['lien']; ?>&rel=0" rel="prettyPhoto" data-clipid="<?php echo $clip['id']; ?>">
				<span class="info_clip">
					<?php echo $clip['titre']; ?> <br/> <?php echo $clip['artistes']; ?> <br/> <?php echo $clip['genre']; ?> <br/> <?php echo $clip['annee']; ?>
				</span> 
			</a>
		</div>
	<?php endforeach; ?>
	</div>
<?php endif; ?>