<div class="container">
    <p>
            <h1>Artistes</h1> <br/>	
    </p>

    <table class="table table-hover">
        <thead>
            <tr>
                <th>#</th>
                <th>nom</th>
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
                <td><a href="<?php echo base_url(); ?>beyond/artiste/new"  class="btn btn-primary" >Nouveau</a></td>
            </tr>
    <?php  foreach($artistes as $artiste): ?>
        <tr>
            <td><?php echo $artiste['id']; ?></td>
            <td><?php echo $artiste['nom']; ?></td>
            <td><?php echo $artiste['vue']; ?></td>
            <td><a href="" data-entity="Artiste" data-id="<?php echo $artiste['id']; ?>" class="switch-actif btn btn-<?php echo ($artiste['actif'])?'success':'danger'; ?>">actif</a></td>
            <td><a href="<?php echo $artiste['edit_artiste']; ?>" >éditer</a></td>
        </tr>
    <?php endforeach; ?>
        </tbody>
    </table>
</div>
