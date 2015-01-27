<div class="container">
    <p>
        <h1>Nouvel Artiste</h1> <br/>
    </p>
    <form id="new-artiste" class="form" role="form">
        <div class="form-group">
            <label for="nom">Nom</label>
            <input type="text" class="form-control" id="nom" placeholder="nom">
        </div>
        <div class="form-group">
            <label for="ile">Ile</label>
            <?php echo form_dropdown('ile', $iles, 0, 'id="ile"'); ?>
        </div>
        <div class="form-group">
            <label for="bio">Bio</label>
            <textarea class="form-control" id="bio" cols="50" rows="3">A venir</textarea>
        </div>
            
        <!--?php echo img($artiste['image'], $artiste['nom']); ?-->
        <button type="submit" class="btn btn-success">Save</button>
    </form>
    
    
</div>