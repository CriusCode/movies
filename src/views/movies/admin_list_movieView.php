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
            <?php
            foreach ($allMovies as $movieSingle) { ?>
                <div class="col">
                    <p><?php echo $movieSingle->Title; ?></p>
                    <p><img src="<?php echo $movieSingle->MoviePoster; ?>" style="width: 300px" /></p>
                    <p><a href="<?php echo ($router->generate('movies')); ?>"><button type="button" class="btn btn-warning" name="Editer">Editer</button></a></p>
                </div>
            <?php } ?>
        </div>
    </div>
</body>

</html>