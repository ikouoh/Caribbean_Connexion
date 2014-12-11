<div class="container">
    <p>
            <h1><?php echo $ile['ile']; ?></h1> <br/>	
    </p>
    <form id="edit-ile" class="form" role="form">
        <div class="form-group">
            <label for="ile">Ile</label>
            <input type="text" class="form-control" id="ile" value="<?php echo $ile['ile']; ?>" placeholder="nom">
        </div>
        <div class="form-group">
            <label for="descriptif">Descriptif</label>
            <textarea class="form-control" id="descriptif" cols="50" rows="5"><?php echo $ile['descriptif']; ?></textarea>
        </div>
            
        <!--?php echo img($ile['image'], $ile['nom']); ?-->
        <input type="hidden" id="id_ile" value="<?php echo $ile['id']; ?>">
        <button type="submit" class="btn btn-success">Save</button>
    </form>
    
</div>
