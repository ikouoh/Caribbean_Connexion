<div class="container">
    <p>
            <h1>Clips</h1> <br/>	
    </p>

    <table class="table table-hover">
        <thead>
            <tr>
                <th>#</th>
                <th>titre</th>
                <th>artiste(s)</th>
                <th>genre</th>
                <th>année</th>
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
                <td>..</td>
                <td>..</td>
                <td>..</td>
                <td><a href="<?php echo base_url(); ?>beyond/clip/new"  class="btn btn-primary" >Nouveau</a></td>
            </tr>
    <?php  foreach($clips as $clip): ?>
        <tr>
            <td><?php echo $clip['id']; ?></td>
            <td><?php echo $clip['titre']; ?></td>
            <td><?php echo $clip['artistes']; ?></td>
            <td><?php echo $clip['genre']; ?></td>
            <td><?php echo $clip['annee']; ?></td>
            <td><?php echo $clip['vue']; ?></td>
            <td><a href="" data-entity="Clip" data-id="<?php echo $clip['id']; ?>" class="switch-actif btn btn-<?php echo ($clip['actif'])?'success':'danger'; ?>">actif</a></td>
            <td>
                <a href="http://www.youtube.com/watch?v=<?php echo $clip['lien']; ?>&rel=0" rel="prettyPhoto" class="btn btn-info" >voir</a>
                <a href="<?php echo $clip['edit_clip']; ?>" class="btn btn-info" >éditer</a>
                <a href="" data-entity="Clip" data-id="<?php echo $clip['id']; ?>" class="delete-entity btn btn-info" >supprimer</a>
            </td>
        </tr>
    <?php endforeach; ?>
        </tbody>
    </table>
</div>
