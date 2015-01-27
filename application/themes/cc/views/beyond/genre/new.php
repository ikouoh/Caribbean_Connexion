<div class="container">
    <p>
            <h1>Nouveau Genre</h1> <br/>	
    </p>
    <form id="new-genre" class="form" role="form">
        <div class="form-group">
            <label for="genre">Genre</label>
            <input type="text" class="form-control" id="genre" placeholder="genre">
        </div>
        <div class="form-group">
            <label for="descriptif">Descriptif</label>
            <textarea class="form-control" id="descriptif" cols="50" rows="5">A venir</textarea>
        </div>
            
        <!--?php echo img($genre['image'], $genre['nom']); ?-->
        <button type="submit" class="btn btn-success">Save</button>
    </form>
    
</div>