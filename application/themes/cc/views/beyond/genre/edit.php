<div class="container">
    <p>
            <h1><?php echo $genre['genre']; ?></h1> <br/>	
    </p>
    <form id="edit-genre" class="form" role="form">
        <div class="form-group">
            <label for="genre">Genre</label>
            <input type="text" class="form-control" id="genre" value="<?php echo $genre['genre']; ?>" placeholder="nom">
        </div>
        <div class="form-group">
            <label for="descriptif">Descriptif</label>
            <textarea class="form-control" id="descriptif" cols="50" rows="5"><?php echo $genre['descriptif']; ?></textarea>
        </div>
            
        <!--?php echo img($genre['image'], $genre['nom']); ?-->
        <input type="hidden" id="id_genre" value="<?php echo $genre['id']; ?>">
        <button type="submit" class="btn btn-success">Save</button>
    </form>
    
    
</div>
