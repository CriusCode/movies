<?php get_header('Les sorties | Terrorama'); ?>
<section class="movie-list">
    <h2 class="mt-3">Retrouvez toutes les prochaines sorties</h2>
    <div class="container-all-movies">
        <!-- The loop grabs and displays the selected informations on the movie section -->
        <?php
        foreach($allMoviesData as $movie) {
            ?>
            <article class="movie">
                <div class="movie-info mt-3">
                    <div>
                    <a href="<?php echo $router->generate('details') . $movie->id; ?>"><img src="<?php echo $movie->MoviePoster; ?>" alt="Affiche du film" style="max-width: 200px;object-fit: contain;"/></a>
                        <h2 class="mt-3"><?php echo $movie->Title; ?></h2>
                        <p class="mt-3">Date de Sortie: <b><?php echo $movie->ReleaseDate; ?></b></p>
                        <p class="mt-3">Réalisateur: <b><?php echo $movie->Director; ?></b></p>
                    </div>
                    <div style="min-width: 70%;">
                    <!-- Checks if the whysee and whynotsee fields are empty, if not, it will return the data -->
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
                                <!-- Show only the firss 500 caracters of the review so that the user will click on it to read the rest -->
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

<?php
// First attempt, templating section for the data I would show
/*
<section class="movie-list">
    <article class="movie">
        <img src="chemin/vers/image1.jpg" alt="Affiche du Film 1">
        <div class="movie-info mt-3">
            <h2 class="mt-3">Imaginary</h2>
            <p class="mt-3">Date de Sortie: 06 Mars 2024 </p>
            <p class="mt-3">Réalisateur: Jeff Wadlow</p>
            <p class="mt-3">Dans Imaginary, au tour de Chauncey, mignon petit ours en peluche trouvé dans un sous-sol,
                de se révéler en réalité un démoniaque ursidé. Mais peut-être que Jessica (DeWanda Wise),
                de retour dans sa maison d’enfance, n’aurait pas dû, à l’époque, quitter son ami imaginaire…</p>
            <h2 class="mt-3">Pourquoi faut-il le voir ?
            </h2>
            <p>Parce que le thème de l'ami imaginaire, n'est pas un thème souvent exploité dans les films d'horreur,
                bien que pourtant le sujet semble facile à traîter...
            </p>
            <h2>Pourquoi ne faut-il pas le voir ?
            </h2>
            <p>Après le médiocre M3GAN, plus connue pour sa danse que pour faire peur, après la poupée Annabelle et Chucky,
                il sera difficile de faire original, avec une entité maléfique à l'image d'un petit ourson...
            </p>
            <h2> Critique :
                <p>
                    à venir...
                </p>
            </h2>
            <a href="lien_vers_page_du_film1">En savoir plus</a>
        </div>
    </article>

    <article class="movie">
        <img src="chemin/vers/image2.jpg" alt="Affiche du Film 2">
        <div class="movie-info">
            <h2>Sans un bruit : Jour 1</h2>
            <p>Date de Sortie: 26 juin 2024</p>
            <p>Réalisateur: Michael Sarnoski</p>
            <p>Nous n'en savons pas beaucoup sur ce prequel des deux premiers films, "Sans un bruit",
                dont il faudra attendre 2025 pour la partie 3 avec le cast original. En attendant, nous aurons le droit de découvrir
                ce qui a mené aux évènements des deux premiers films, avec un casting tout aussi intéréssant, à surveiller de près...</p>
            <a href="lien_vers_page_du_film2">En savoir plus</a>
        </div>
        <h2>Pourquoi faut-il le voir ?
        </h2>
        <p>Parce que les deux premiers sont de très bons films, avec un cast plus que convaincant, qui nous offrent de bons moments de tension.
            Ce prequel promet de nous faire découvrir l'origine de ces monstres, qui ont dû en faire s'accrocher plus d'un à leur siège...
        </p>
        <h2>Pourquoi ne faut-il pas le voir ?
        </h2>
        <p>Après le médiocre M3GAN, plus connue pour sa danse que pour faire peur, après la poupée Annabelle et Chucky,
            il sera difficile de faire original, avec une entité maléfique à l'image d'un petit ourson...
        </p>
        <h2> Critique :
            <p>
                à venir...
            </p>
        </h2>
    </article>

    <article class="movie">
        <img src="chemin/vers/image2.jpg" alt="Affiche du Film 2">
        <div class="movie-info">
            <h2>Alien : Romulus</h2>
            <p>Date de Sortie: 14 aôut 2024</p>
            <p>Réalisateur: Fede Alvarez</p>
            <p>Nous n'en savons pas beaucoup sur ce prequel des deux premiers films, "Sans un bruit",
                dont il faudra attendre 2025 pour la partie 3 avec le cast original. En attendant, nous aurons le droit de découvrir
                ce qui a mené aux évènements des deux premiers films, avec un casting tout aussi intéréssant, à surveiller de près...</p>
            <a href="lien_vers_page_du_film2">En savoir plus</a>
        </div>
        <h2>Pourquoi faut-il le voir ?
        </h2>
        <p>Avec Fede Alvarez, réalisateur de l'excellent remake d'Evil Dead de 2013, mais aussi de la médiocre mais néanmoins intéréssante suite de
            Massacre à la tronçonneuse sur Netflix, au commande de ce film, je ne sais pas trop à quoi m'attendre, tout ce que j'espère c'est qu'il
            saura tirer profit de l'univers d'Alien, qui est de base assez sombre, s'il y arrive, alors préparez-vous car cela risque d'être grand...
        </p>
        <h2>Pourquoi ne faut-il pas le voir ?
        </h2>
        <p>Exactement pour les mêmes raisons qu'il faut aller le voir, paradoxalement. Difficile de savoir à quoi s'attendre, quand un réalisateur a fait un aussi bon film,
            puis un beaucoup plus discutable, mais tout de même avec de bonnes idées. Réponse lors de sa sortie en salle...
        </p>
        <h2> Critique :
            <p>
                à venir...
            </p>
        </h2>
    </article>
</section>
*/
?>
<?php get_footer(); ?>