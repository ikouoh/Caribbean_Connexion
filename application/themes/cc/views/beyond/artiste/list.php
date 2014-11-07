<p>
        <h1>Artistes</h1> <br/>	
</p>

<table align="center">
        <?php  foreach($artistes as $artiste): ?>
                <tr>
                        <td><?php echo $artiste['id']; ?></td>
                        <td><?php echo $artiste['nom']; ?></td>
                        <td><?php echo $artiste['vue']; ?></td>
                        <td><?php echo $artiste['actif']; ?></td>
                        <td><a href="<?php echo $artiste['edit_artiste']; ?>" >éditer</a></td>
                </tr>
        <?php endforeach; ?>
</table>

