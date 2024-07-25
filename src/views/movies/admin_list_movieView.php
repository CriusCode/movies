<?php get_header('Liste des films', 'admin'); ?>

<div class="container">
    <table class=" table table-light">
        <div class="row">
            <tbody>

            </tbody>
        </div>
    </table>
</div>

<body>
    <div class="container">
        <div class="row">
            <!--Fetch the selected informations from the database, and displays them -->
            <?php foreach ($allMovies as $movieSingle) { ?>
                <div class="col">
                    <p style="display: none;"><?php echo $movieSingle->Title; ?></p>
                    <p><img src="<?php echo $movieSingle->MoviePoster; ?>" style="height: 400px ; width: 300px; margin-top: 15px;" /></p>
                    <div class="d-flex">
                        <a href="<?= $router->generate('movies') . $movieSingle->id; ?>">
                            <button type="button" class="btn btn-warning me-2" name="Editer">Editer</button>
                        </a>
                        <button type="button" class="btn btn-danger delete-button" data-movie-id="<?= $movieSingle->id ?>">Supprimer</button>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const deleteButtons = document.querySelectorAll('.delete-button');

            deleteButtons.forEach(button => {
                button.addEventListener('click', function() {
                    const movieId = this.dataset.movieId;
                    const movieName = this.parentNode.parentNode.querySelector('p:first-child').textContent;

                    if (confirm(`Êtes-vous sûr de vouloir supprimer le film "${movieName}" ?`)) {
                        
                        fetch(`/admin/films/supprimer/${movieId}`, {
                                method: 'POST'
                            })
                            .then(response => {
                                if (response.ok) {
                                    this.parentNode.parentNode.remove();
                                } else {
                                    alert('Erreur lors de la suppression du film.');
                                }
                            })
                            .catch(error => {
                                console.error('Erreur lors de la requête AJAX :', error);
                                alert('Erreur lors de la suppression du film.');
                            });
                    }
                });
            });
        });
    </script>
</body>

</html>