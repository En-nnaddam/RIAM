<section id="footer">
    <div class="column">
        <h2 class="footer__column__header">Compte</h2>
        <a href="./inscription.php">Inscription</a>
        <?php
        if (isset($_SESSION['user']))
            echo <<<HTML
                <a href="./seDeconnecter.php">Se deconnecter</a>
                HTML;
        else
            echo <<<HTML
                <a href="connection.php">Se connecter</a>
                HTML;
        ?>
        <a href="./admin.php">admin</a>
    </div>
    <div class="column">
        <h2 class="footer__column__header">Services</h2>
        <a href="./demande_facilitation.php">﻿Demander une facilitation</a>
        <a href="./creation.php">Creation d'un compte</a>
        <a href="./suivie_facilitation.php">Suivie de la demande de facilitation</a>
        <a href="./consulteCompte.php">Consultation de compte</a>
        <a href="./demande_labilisation.php">Demander la labellisation</a>
        <a href="./suivie_labilisation.php">Suivi la demande la labellisation</a>
        <a href="./admin.php">Consulter les enquêtes</a>
    </div>
    <div class="column">
        <h2 class="footer__column__header">contact</h2>
        <div class="row gap mb">
            <img src="./assets/location-pin.png" alt="location" height="25" width="20">
            <p>Hay Ryad secteur 19 bloc N°17 angle rue Copernicia et rue Marina 10100, Rabat</p>
        </div>
        <div class="row gap">
            <img src="./assets/email.png" alt="email" width="20">
            <a href="mailto:reseauagroecologiemaroc@gmail.com">reseauagroecologiemaroc@gmail.com</a>
        </div>
    </div>
</section>
<footer>
    RIAM Copy Rights &copy; 2022
</footer>