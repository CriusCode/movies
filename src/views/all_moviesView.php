<?php get_header('Tous les films | Terrorama'); ?>
<section class="movie-list">
    <h2 class="mt-3">Retrouvez tous les films</h2>
    <div class="container-all-movies">
        <?php
        foreach($allMoviesData as $movie) {
            ?>
            <article class="movie">
                <div class="movie-info mt-3">
                    <div>
                    <a href="<?php echo $router->generate('details') . $movie->id; ?>"><img src="<?php echo $movie->MoviePoster; ?>" alt="Affiche du film"/></a>
                        <h2 class="mt-3"><?php echo $movie->Title; ?></h2>
                        <p class="mt-3">Date de Sortie: <b><?php echo $movie->ReleaseDate; ?></b></p>
                        <p class="mt-3">Réalisateur: <b><?php echo $movie->Director; ?></b></p>
                    </div>
                    <div style="min-width: 70%;">
                        <?php
                        if(!empty($movie->whysee))
                        {
                            ?>
                            <h2 class="mt-3">Pourquoi faut-il le voir ?</h2>
                            <p><?php echo $movie->whysee; ?></p>
                            <?php
                        }
                        ?>
                        <?php
                        if(!empty($movie->whynotsee))
                        {
                            ?>
                            <h2 class="mt-3">Pourquoi ne faut-il pas le voir ?</h2>
                            <p><?php echo $movie->whynotsee; ?></p>
                            <?php
                        }
                        ?>
                        <h2> Critique :
                            <p class="mt-3">
                              <?php echo ($movie->critique) ? substr($movie->critique, 0, 500) . '...' : 'Critique à venir ...'; ?>
                            </p>
                        </h2>
                        <a href="<?php echo $router->generate('details') . $movie->id; ?>">En savoir plus</a>
                    </div>
                </div>
            </article>
            <?php
        }
        ?>
    </div>
</section>
<?php get_footer(); ?>