<div class="container">
    <p>
        <h1>Nouveau Clip</h1> <br/>
    </p>
    <form id="new-clip" class="form" role="form">
        <div class="form-group">
            <label for="titre">Titre</label>
            <input type="text" class="form-control" id="titre" placeholder="titre">
        </div>
        <div class="form-group">
            <label for="genre">Genre</label>
            <?php echo form_dropdown('genre', $genres, 0, 'id="genre"'); ?>
        </div>
        <div class="form-group">
            <label for="artistes">Artiste(s)</label>
            <?php echo form_multiselect('artistes', $artistes, null, 'id="artistes"'); ?>
        </div>
        <div class="form-group">
            <label for="annee">Année</label>
            <input type="text" class="form-control" id="annee" placeholder="année">
        </div>
        <div class="form-group">
            <label for="lien">Lien</label>
            <input type="text" class="form-control" id="lien" placeholder="lien">
        </div>
            
        <!--?php echo img($artiste['image'], $artiste['nom']); ?-->
        <button type="submit" class="btn btn-success">Save</button>
    </form>
    
    
</div>