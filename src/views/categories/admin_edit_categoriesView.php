<?php get_header('Editer les catégories', 'admin'); ?>

<div class="container mt-5">

    <h2>Categories déja existantes</h2>

    <!-- Displays all the categories from the database and delete them if the button is clicked -->
    <table class="table table-dark">
    <tbody>
    <?php
    $allCategories = getAllCategories();
    foreach ($allCategories as $categorySingle) { ?>
        <tr>
        <td><?php echo $categorySingle->CategoryName; ?><a href="?deletecat= <?php echo $categorySingle->CategoryID; ?>"><button type="button" class="btn btn-danger" name="Supprimer" style="float: right;">Supprimer</button></a></td>
    </tr>
    <?php } ?>
    </tbody>
</table>

    <div class="card mt-4">
        <div class="card-body">
            <h5 class="card-title">Ajouter ou modifier une catégorie</h5>
            <form method="post">
                <div class="form-group">
                    <label for="categoryName" class="mb-2">Nom de la nouvelle catégorie</label>
                    <input type="text" class="form-control mb-2" id="categoryName" name="categoryName" required>
                </div>
                <button type="submit" class="btn btn-primary" name="submit">Sauvegarder</button>
            </form>
        </div>
    </div>

    <!-- Dsiplays alert messages-->
    <?php if (isset($alertMessage)) : ?>
        <div class="alert alert-<?= $alertType ?> mt-4">
            <?= $alertMessage ?>
        </div>
    <?php endif; ?>

</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>

<script>

    $(document).ready(function() {
        $(".category").on("click", function() {
            let categoryID = $(this).data("id");

            let confirmDelete = confirm("Êtes-vous sûr de vouloir supprimer cette catégorie?");

            if (confirmDelete) {
                // Visually delete the category on client's side 
                $(this).remove();

                // Call to the servor's side delete function
                deleteCategory(categoryID);
            }
        });
    });
</script>


<?php get_footer('admin'); ?>