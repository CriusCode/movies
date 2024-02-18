<?php get_header('Espace commentaires utilisateurs', 'admin'); ?>

<table class="table table-dark">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Film</th>
            <th scope="col">Pseudo</th>
            <th scope="col">Date</th>
            <th scope="col">Commentaire</th>
            <th scope="col">Statut</th>
        </tr>
    </thead>

    <tbody>
        <!-- Fetch all the columns and the informations from the database, and checks the status whether it's pending or not -->
        <?php
        $pendingComments = getAllComments();
        foreach ($pendingComments as $commentSingle) {
        ?>
            <tr>
                <td><?php echo $commentSingle->IDComment; ?></td>
                <td><?php echo $commentSingle->Title; ?></td>
                <td><?php echo $commentSingle->username; ?></td>
                <td><?php echo $commentSingle->created; ?></td>
                <td><?php echo $commentSingle->Content; ?></td>
                <td>
                    <?php       
                    if ($commentSingle->Status == 0) {
                        echo '<a href=""><input type="button" class="btn btn-success" value="Publier"></a>';
                    }
                    ?>
                    <a href=""><input type="button" class="btn btn-danger" value="Supprimer"></a>
                </td>
            </tr> <?php
                }
                    ?>
    </tbody>
</table>