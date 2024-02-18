<?php get_header('Accueil | Terrorama'); ?>

<main>
    <div class="top-container">
        <div class="triple-slider">
            <div class="swiper">
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <img class="bg-image" src="<?= $URLaffiche ?>/scream_poster.jpg" alt="Affiche Scream">
                    </div>
                    <div class="swiper-slide">
                        <img class="bg-image" src="<?= $URLaffiche ?>/halloween_poster.jpg" alt="Affiche Halloween">
                    </div>
                    <div class="swiper-slide">
                        <img class="bg-image" src="<?= $URLaffiche ?>/L'exorciste.jpg" alt="Affiche L'Exorciste">
                    </div>
                    <div class="swiper-slide">
                        <img class="bg-image" src="<?= $URLaffiche ?>/The-Evil-Dead-1.jpg" alt="Affiche Evil Dead">
                    </div>
                </div>
            </div>
        </div>
        <!-- <input type="radio" class="radio-btn"></input>
            <input type="radio" class="radio-btn"></input>
            <input type="radio" class="radio-btn"></input>
            <input type="radio" class="radio-btn"></input> -->
        <h2 id="classement">Les classiques</h2>
        <p class="text-center mt-1">
            Découvrez ou redecouvrez les classiques du genre horreur !
        </p>
        <a href="<?php echo ($router->generate('classics')); ?>" class="no-underline"><button class="know-more1 bloody narrow-width mt-3">Découvrir les classiques</button></a>
    </div>
    <!-- <img src="<?= $URLsticker ?>/blood.png" alt="Coulée de sang" class="bloodstain1" /> -->
    <div class="stickersgroup1">
        <div class="anim750 Awesome Chucky">
            <div class="sticky anim750">
                <div class="front circle_wrapper anim750">
                    <div class="circle anim750">
                        <img src="<?= $URLsticker ?>/chucky_sticker.png" id="chucky1" alt="sticker Chucky" class="sticker-container" />
                    </div>
                </div>
            </div>
            <p class="sticky-text1">"Salut, je m'appelle Chucky, tu veux jouer avec moi?"</p>
            <div class="sticky anim750">
                <div class="back circle_wrapper anim750">
                    <div class="circle anim750">
                        <img src="<?= $URLsticker ?>/chucky_sticker.png" id="chucky1" alt="sticker Chucky" class="sticker-container" />
                    </div>
                </div>
            </div>
        </div>
        <div class="anim750 Awesome scream">
            <div class="sticky anim750">
                <div class="front circle_wrapper anim750">
                    <div class="circle anim750">
                        <img src="<?= $URLsticker ?>/ghostface_sticker.png" alt="sticker Ghostface" />
                    </div>
                </div>
            </div>
            <p class="sticky-text">"Quel est ton film d'horreur préféré ?"</p>
            <div class="sticky anim750">
                <div class="back circle_wrapper anim750">
                    <div class="circle anim750">
                       <img src="<?= $URLsticker ?>/ghostface_sticker.png" alt="sticker Ghostface" />
                    </div>
                </div>
            </div>
        </div>
    </div>
    <img src="<?= $URLsticker ?>/freddy_krueger.png" id="freddy" alt="sticker Michael Myers" />
    <img src="<?= $URLsticker ?>/michael_myers_sticker.png" id="halloween" alt="sticker Michael Myers" />
    <img src="<?= $URLsticker ?>/tape.png" id="tape" alt="VHS rose style kawaii" />
    <img src="<?= $URLsticker ?>/ikwydls.png" id="ikwydls" alt="I know what you did last summer" />
    </div>
    <div id="suggestion-container">
        <h2>Une suggestion ?</h2>
        <p>Chaque semaine, je choisirais un film parmi vos recommandations, et écrirais une critique dessus !</p>
        <div class="to-flip">
            <div class="form-floating face-one">
                <input type="text" class="form-control mb-1 mt-2 rounded" id="floatingInput" placeholder="Envie que j'écrive une critique sur un film en particulier ? Ou tout simplement, de tenter de me faire trembler ? C'est ici !" />
                <label for="floatingInput">Envie que j'écrive une critique sur un film en particulier ? Ou tout simplement, de tenter de me faire trembler ? C'est ici !</label>
            </div>
            <div class="face-two">
                <p>Votre suggestion a bien été envoyée ! Merci, à bientôt pour une nouvelle critique 😱🔪</p>
            </div>
        </div>
        <button class="know-more1 no-center bloody narrow-width mt-3" id="suggest-btn">Envoyer la suggestion</button>
    </div>
    <div class="title">
        <h2 id="articles">Les articles les plus récents</h2>
        <h2 id="portrait-titre">Le portrait</h2>
    </div>
    <div id="container">
        <div id="bloc-articles">
            <!-- Retrieve and shows the last three reviews from the database -->
            <?php foreach ($critique as $singleCritique) { ?>
                <article class="post">
                    <div class="post-content">
                        <h2><?php echo $singleCritique->Title; ?></h2>
                        <?php
                        echo ($singleCritique->critique) ? substr($singleCritique->critique, 0, 500) . '...' : 'Critique à venir ...';
                        echo ($singleCritique->published); ?>
                    </div>
                </article>
            <?php
            } ?>
        </div>
        <div id="bloc-portrait">
            <img src="<?= $URLsticker ?>/scarymovie.png" alt="Ecriture sanglante disant what's your favorite scary movie ?" class="scarymovie" />
            <img src="<?= $URLsticker ?>/redballoon.png" alt="Un ballon rouge en style sticker" class="redballoon" />
            <img src="<?= $URLsticker ?>/blood.png" alt="Coulée de sang" class="bloodstain2" />
            <img src="<?= $URLsticker ?>/jlc_pdp.jpg" alt="Photo en noir et blanc de l'actrice Jamie Lee Curtis" class="portrait" />
            <h3 id="actor-name">Jamie Lee Curtis</h3>
            <p>
                Jamie Lee Curtis est une actrice, productrice et réalisatrice
                américaine, née le 22 novembre 1958 à Los Angeles en Californie. Elle
                fait ses débuts dans le film d'horreur de John Carpenter Halloween. Ceci
                l'établit comme une véritable actrice du genre, jouant dans Fog, Le Bal
                de l'horreur, Le Monstre du train ou encore Déviation mortelle, gagnant
                ainsi le surnom de« The Scream Queen ».
            </p>
        </div>
    </div>

    <div class="banners">
        <img src="<?= $URLbanniere ?>/banniere_1.jpeg" alt="Une bannière représentant les films d'Horreur" />
        <img src="<?= $URLbanniere ?>/banniere_2.jpeg" alt="Une bannière représentant les films Fantastique" />
        <img src="<?= $URLbanniere ?>/banniere_3.jpeg" alt="Une bannière représentant les films Thriller" />
        <img src="<?= $URLbanniere ?>/banniere_4.jpeg" alt="Une bannière représentant les films de Science-fiction" />
    </div>
</main>
<div class="vote-title">
    <h2 id="votes-titre">Votes</h2>
    <p id="votes">
        Votez ici pour la meilleure Scream Queen !
    </p>
</div>

<div class="votes">
    <div class="actress">
        <img href="#" class="actress-picture" alt="Photo de Jamie Lee curtis" />
        <h3>Jamie Lee Curtis</h3>
        <p> Film: Halloween </p>
        <button class="voteButton" id="button1">Vote</button>
    </div>

    <div class="actress">
        <img href="#" class="actress-picture" alt="Photo de Sigourney Weaver" />
        <h3>Sigourney Weaver</h3>
        <p> Film: Alien </p>
        <button class="voteButton" id="button2">Vote</button>
    </div>

    <div class="actress">
        <img href="#" class="actress-picture" alt="Photo de Linda Blair" />
        <h3>Linda Blair</h3>
        <p> Film: L'Exorciste </p>
        <button class="voteButton" id="button3">Vote</button>
    </div>

    <div class="actress">
        <img href="#" class="actress-picture" alt="Photo de Neve Campbell" />
        <h3>Neve Campbell</h3>
        <p> Film: Scream </p>
        <button class="voteButton" id="button4">Vote</button>
    </div>

    <div class="actress">
        <img href="#" class="actress-picture" alt="Photo de Heather Langenkamp" />
        <h3>Heather Langenkamp</h3>
        <p> Film: Les Griffes de la Nuit </p>
        <button class="voteButton" id="button5">Vote</button>
    </div>

    <div class="actress">
        <img href="#" class="actress-picture" alt="Photo de Lin Shaye" />
        <h3>Lin Shaye</h3>
        <p> Film: Insidious </p>
        <button class="voteButton" id="button6">Vote</button>
    </div>
</div>


<!-- Allows the input for the suggestions to be animated, flip, and to send the suggestion in the database -->
<script>
    const suggest = document.getElementById('suggestion-container');

    function flipSuggest() {
        suggest.classList.add('flip');
        setTimeout(() => {
            suggest.classList.remove('flip')
        }, 5000);

    }

    document.getElementById('suggest-btn').addEventListener('click', () => {
        let recommandationUser = document.getElementById('floatingInput').value;
        let data = new FormData();
        data.append('recommandation', recommandationUser);
        try {
            fetch('<?php echo ($router->generate('api')); ?>', {
                method: 'POST',
                body: data
            }).then((el) => {
                return el.json();
            }).then((response) => {
                console.log(response);
                flipSuggest();
            });
        } catch (e) {
            alert(`Problème lors de l'envoi de la suggestion`);
        }
    });
</script>
<!-- Script code for the voting section -->
<!-- <script>
    document.getElementById('voteButton1').addEventListener('click', function() {
        // Appeler la fonction pour comptabiliser le vote pour l'actrice correspondante
        countVote('Jamie Lee Curtis');
    });

    document.getElementById('voteButton2').addEventListener('click', function() {
        // Appeler une fonction pour comptabiliser le vote pour l'actrice correspondante
        countVote('Sigourney Weaver');
    });

    // Répéter pour chaque bouton de vote

    // Objets pour stocker les votes
    const voteCount = {
        'Jamie Lee Curtis': 0,
        'Sigourney Weaver': 0,
        // Ajouter les autres actrices ici
    };
    // Fonction pour compter les votes
    function countVote(actressName) {
        // Incrémenter le compteur de votes pour l'actrice spécifiée
        voteCount[actressName]++;
        // Mettre à jour l'affichage du compteur
        console.log(`${actressName} a maintenant ${voteCount[actressName]} votes.`);
    }

    // Fonction pour afficher les votes
    function countVote(actressName) {
        // Incrémenter le compteur de votes pour l'actrice spécifiée
        voteCount[actressName]++;
        // Mettre à jour l'affichage du compteur
        console.log(`${actressName} a maintenant ${voteCount[actressName]} votes.`);
        // Mettre à jour l'affichage de la barre de progression ici
    }
</script> -->

<?php get_footer(); ?>