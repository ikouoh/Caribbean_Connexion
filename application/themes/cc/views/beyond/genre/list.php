<div class="container">
    <p>
            <h1>Genres</h1> <br/>	
    </p>

    <table class="table table-hover">
        <thead>
            <tr>
                <th>#</th>
                <th>genre</th>
                <th>vues</th>
                <th>actif</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>0</td>
                <td>..</td>
                <td>..</td>
                <td>..</td>
                <td><a href="<?php echo base_url(); ?>beyond/genre/new"  class="btn btn-primary" >Nouveau</a></td>
            </tr>
    <?php  foreach($genres as $genre): ?>
        <tr>
            <td><?php echo $genre['id']; ?></td>
            <td><?php echo $genre['genre']; ?></td>
            <td><?php echo $genre['vue']; ?></td>
            <td><a href="" data-entity="Genre" data-id="<?php echo $genre['id']; ?>" class="switch-actif btn btn-<?php echo ($genre['actif'])?'success':'danger'; ?>">actif</a></td>
            <td>
                <a href="<?php echo $genre['edit_genre']; ?>" class="btn btn-info" >éditer</a>
                <a href="" data-entity="Genre" data-id="<?php echo $genre['id']; ?>" class="delete-entity btn btn-info" >supprimer</a>
            </td>
        </tr>
    <?php endforeach; ?>
        </tbody>
    </table>
</div>
