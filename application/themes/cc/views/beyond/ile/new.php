<div class="container">
    <p>
            <h1>Nouvelle ile</h1> <br/>	
    </p>
    <form id="new-ile" class="form" role="form">
        <div class="form-group">
            <label for="ile">Ile</label>
            <input type="text" class="form-control" id="ile" placeholder="ile">
        </div>
        <div class="form-group">
            <label for="descriptif">Descriptif</label>
            <textarea class="form-control" id="descriptif" cols="50" rows="5">A venir</textarea>
        </div>
            
        <!--?php echo img($ile['image'], $ile['nom']); ?-->
        <button type="submit" class="btn btn-success">Save</button>
    </form>
    
</div>