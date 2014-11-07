<div class="container">
    <p>
            <h1><?php echo $artiste['nom']; ?></h1> <br/>	
    </p>
    <form class="form-inline" role="form">
        <div class="form-group">
            <label for="nom">Nom</label>
            <input type="text" class="form-control" id="nom" placeholder="<?php echo $artiste['nom']; ?>">
        </div>
        <div class="form-group">
            <label for="ile">Ile</label>
            <?php echo form_dropdown('ile', $iles, $artiste['ile']); ?>
        </div>
        <div class="form-group">
            <label for="bio">Bio</label>
            <textarea class="form-control" id="bio" cols="50" rows="3"><?php echo $artiste['bio']; ?></textarea>
        </div>
            
        <!--h1><?php echo img($artiste['image'], $artiste['nom']); ?> - </h1><h3><a href=<?php echo $artiste['voir_ile']; ?> ></a></h3-->
        <button type="submit" class="btn btn-success">Save</button>
    </form>
    
    
</div>
