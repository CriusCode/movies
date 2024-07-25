<?php get_header('Editer un utilisateur', 'admin'); ?>

<div class="mb-4">
    <h1>Editer un utilisateur</h1>


    <form action="" method="post">
        <div class="mb-4">
             <!-- For every input, the function will check if it's empty or not -->
            <?php $error = checkEmptyFields('email'); ?>
            <label for="email">Adresse email :*</label>
            <input type="email" name="email" id="email" value="<?= getValue('email');?>" class="form-control id-invalid" <?= $error['class']; ?> >
            <?= $error['message']; ?>
        </div>
        <div class="mb-4">
             <label>
                Statut de l'utilisateur
             </label>
             <select name="role_id" class="form-select">
                <option value="1" <?= (getValue('role_id')==1) ? 'selected' : ''; ?>>Utilisateur normal</option>
                <option value="2" <?= (getValue('role_id')==2) ? 'selected' : ''; ?>>Administrateur</option>
             </select>
        </div>
        </div>
        <div>
            <input type="submit" class="btn btn-success" value="Sauvegarder">
        </div>
    </form>
</div>

<?php get_footer('admin'); ?>