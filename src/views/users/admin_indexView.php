<?php get_header('Liste des utilisateurs', 'admin'); ?>

<h2>Liste des utilisateurs</h2>

<a href="<?= $router->generate('addUser'); ?>" class="btn btn-success">Ajouter</a>

<table class="table table-striped table-hover">
    <thead>
        <tr>
            <th scope="col">Email</th>
            <th scope="col"></th>
        </tr>
    </thead>
    <tbody>
        <!-- Fetch all the users, displays them into a list -->
        <?php foreach ($users as $user) { ?>
            <tr>
                <td class="align-middle"><?= $user->email; ?></td>
                <td class="text-center align-middle">
                    <a class="btn btn-warning" href="<?= $router->generate('editUser', ['id' =>  $user->id]); ?>">Editer</a>
                    <a class="btn btn-danger" href="<?= $router->generate('deleteUser', ['id' =>  $user->id]); ?>">Supprimer</a>
                    
                </td>
            </tr>
        <?php } ?>
    </tbody>
</table>

<?php get_footer('admin'); ?>