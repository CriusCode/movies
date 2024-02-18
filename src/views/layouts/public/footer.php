<?php global $router; ?>

<footer class="text-center text-white" style="background-color: #252525">
    <div class="container">
        <section class="mt-5">
            <div class="row text-center d-flex justify-content-center pt-5">
                <div class="col-md-2">
                    <h6 class="text font-weight-bold">
                        <a href="<?php echo ($router->generate('about')); ?>" class="text-white">A propos</a>
                    </h6>
                </div>
                <div class="col-md-2">
                    <h6 class="text font-weight-bold">
                        <a href="<?php echo ($router->generate('privacy_policy')); ?>" class="text-white">Politique de confidentialité</a>
                    </h6>
                </div>

                <div class="col-md-2">
                    <h6 class="text font-weight-bold">
                        <a class="<?php echo ($router->generate('cgu')); ?>" class="text-white">CGU</a>
                    </h6>
                </div>
                <div class="col-md-2">
                    <h6 class="text font-weight-bold">
                        <a href="<?php echo ($router->generate('contact')); ?>" class="text-white">Contact</a>
                    </h6>
                </div>
            </div>
        </section>
        <hr class="my-5" />
        <section class="mb-5">
            <div class="row d-flex justify-content-center">
                <div class="col-lg-8">
                    <p>
                        Merci de nous rendre visite ! 
                        Nous espérons que votre exploration sur notre site vous apporte joie, 
                        inspiration et de bons moments. N'hésitez pas à parcourir nos contenus avec curiosité. 
                        Votre présence ici fait toute la différence. Bonne navigation ! 🌟
                    </p>
                </div>
            </div>
        </section>
    </div>
    <div class="text-center p-1" style="background-color: #252525">
        © 2024 Copyright
    </div>
</footer>
</body>
</html>