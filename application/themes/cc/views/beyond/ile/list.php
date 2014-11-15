<div class="container">
    <p>
            <h1>Iles</h1> <br/>	
    </p>

    <table class="table table-hover">
        <thead>
            <tr>
                <th>#</th>
                <th>ile</th>
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
                <td><a href="<?php echo base_url(); ?>beyond/ile/new"  class="btn btn-primary" >Nouveau</a></td>
            </tr>
    <?php  foreach($iles as $ile): ?>
        <tr>
            <td><?php echo $ile['id']; ?></td>
            <td><?php echo $ile['ile']; ?></td>
            <td><?php echo $ile['vue']; ?></td>
            <td><a href="" data-entity="Ile" data-id="<?php echo $ile['id']; ?>" class="switch-actif btn btn-<?php echo ($ile['actif'])?'success':'danger'; ?>">actif</a></td>
            <td><a href="<?php echo $ile['edit_ile']; ?>" >éditer</a></td>
        </tr>
    <?php endforeach; ?>
        </tbody>
    </table>
</div>
