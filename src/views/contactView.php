<?php get_header(' Contact | Terrorama'); ?>

<link rel="stylesheet" type="text/css" href="/public/css/style.css">

<link href="https://fonts.googleapis.com/css?family=Roboto:400,700,900&display=swap" rel="stylesheet">
<link rel="stylesheet" href="fonts/icomoon/style.css">

<link rel="stylesheet" href="css/bootstrap.min.css">

<link rel="stylesheet" href="css/style.css">
<div class="content">
    <div class="container">
        <div class="row align-items-stretch no-gutters contact-wrap">
            <div class="col-md-12">
                <div class="form h-100">
                    <h2>Contact</h2>
                    <form class="mb-4 mt-3" method="post" id="contactForm" name="contactForm">
                        <div class="form-floating">
                            <input type="email" name="email" class="form-control mb-4 rounded" id="floatingInput" placeholder="Ton e-mail">
                            <label for="floatingInput">Ton e-mail</label>
                        </div>
                        <div class="form-floating">
                            <input type="text" name="name" class="form-control mb-4 rounded floatingInput"  placeholder="Ton prénom et ton nom">
                            <label for="floatingInput">Ton prénom et ton nom</label>
                        </div>
                        <div class="row">
                            <div class="col-md-12 form-group mb-3">
                                <p>Pourquoi cherches-tu à me joindre ?</p>
                                <select class="custom-select p-1 mt-2" id="budget" name="budget">
                                    <option>Juste envie de papoter</option>
                                    <option>Echanger sur les films d'horreur</option>
                                    <option>Un stage ?</option>
                                    <option>Une autre question</option>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 form-group mb-3">
                                <div class="form-floating">
                                    <textarea class="form-control mb-2 rounded floatingInput" name="message" style="min-height:250px;" placeholder="Que souhaites-tu me transmettre ? :)"></textarea>
                                    <label for="floatingInput">Que souhaites-tu me transmettre ? :)</label>
                                </div>

                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 form-group">
                                <input type="submit" value="Envoyer" class="btn btn-danger rounded-10 py-2 px-4">
                                <span class="submitting"></span>
                            </div>
                        </div>
                    </form>
                    <div class="form-message-warning mt-4"></div>
                    <div id="form-message-success">
                        Ton message a bien été envoyé, merci, je reviens vers toi bientôt !
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php get_footer(); ?>