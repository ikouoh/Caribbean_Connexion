<div class="container">
    <p>
            <h1><?php echo $clip['titre']; ?></h1> <br/>	
    </p>
    <form id="edit-clip" class="form" role="form">
        <div class="form-group">
            <label for="titre">Titre</label>
            <input type="text" class="form-control" id="titre" value="<?php echo $clip['titre']; ?>" placeholder="titre">
        </div>
        <div class="form-group">
            <label for="genre">Genre</label>
            <?php echo form_dropdown('genre', $genres, $clip['genre_id'], 'id="genre"'); ?>
        </div>
        <div class="form-group">
            <label for="artistes">Artiste(s)</label>
            <?php echo form_multiselect('artistes', $artistes, $clip['artistes_id'], 'id="artistes"'); ?>
        </div>
        <div class="form-group">
            <label for="annee">Année</label>
            <input type="text" class="form-control" id="annee" value="<?php echo $clip['annee']; ?>" placeholder="année">
        </div>
        <div class="form-group">
            <label for="lien">Lien</label>
            <input type="text" class="form-control" id="lien" value="<?php echo $clip['lien']; ?>" placeholder="lien">
        </div>
            
        <!--?php echo img($artiste['image'], $artiste['nom']); ?-->
        <input type="hidden" id="id_clip" value="<?php echo $clip['id']; ?>">
        <button type="submit" class="btn btn-success">Save</button>
    </form>
    
</div>
