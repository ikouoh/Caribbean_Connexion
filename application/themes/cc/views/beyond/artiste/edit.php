<div class="container">
    <p>
            <h1><?php echo $artiste['nom']; ?></h1> <br/>	
    </p>
    <form id="edit-artiste" class="form-inline" role="form">
        <div class="form-group">
            <label for="nom">Nom</label>
            <input type="text" class="form-control" id="nom" value="<?php echo $artiste['nom']; ?>" placeholder="nom">
        </div>
        <div class="form-group">
            <label for="ile">Ile</label>
            <?php echo form_dropdown('ile', $iles, $artiste['ile_id'], 'id="ile"'); ?>
        </div>
        <div class="form-group">
            <label for="bio">Bio</label>
            <textarea class="form-control" id="bio" cols="50" rows="3"><?php echo $artiste['bio']; ?></textarea>
        </div>
            
        <!--?php echo img($artiste['image'], $artiste['nom']); ?-->
        <input type="hidden" id="id_artiste" value="<?php echo $artiste['id']; ?>">
        <button type="submit" class="btn btn-success">Save</button>
    </form>
    
    
</div>
