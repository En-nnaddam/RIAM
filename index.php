<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RIAM</title>
    <link rel="stylesheet" href="./styles/global.css">
    <link rel="stylesheet" href="./styles/navigation.css">
    <link rel="stylesheet" href="./styles/accueil.css">
    <link rel="stylesheet" href="./styles/services.css">
    <link rel="stylesheet" href="./styles/footer.css">
</head>

<body>
    <?php include('./ui/navigation.php'); ?>
    <section id="accueil">
        <video class="accueil__video-background" src="./assets/27607796_animation-of-digital-interface-and-network-of-connections-with-green-icons-on-black-background_by_vectorfusionart_preview.mp4" autoplay loop>
        </video>
        <h1 class="accueil__welcome-text">
            Bienvenu sur RIAM
        </h1>
    </section>
    <section id="services">
        <h1 class="services__header">Notre services</h1>
        <article id="demande-facilitation" class="service">
            <div class="service__infos">
                <a href="./demande_facilitation.php">
                    <h2 class="service__title">Demander une facilitation</h2>
                </a>
                <p class="service__description">
                    Le producteur non adhérent devient adhérent maintenant . Déposez votre demande de facilitation afin
                    d’adhérer aux plusieurs services que dépose l’association .
                </p>
            </div>
            <div class="service__image">
                <img src="./assets/les_demandes.jpg" alt="service">
            </div>
        </article>
        <article id="creaction-compte" class="service">
            <div class="service__infos">
                <a href="creation.php">
                    <h2 class="service__title">Creation d’un compte</h2>
                </a>
                <p class="service__description">
                    Pour être adhérent avec l’association RIAM il faut que vous créez un compte de ferme .
                </p>
            </div>
            <div class="service__image">
                <img src="./assets/creation_de_compte.jpg" alt="service">
            </div>
        </article>
        <article id="suivi-demande-faciltaion" class="service">
            <div class="service__infos">
                <a href="./suivie_facilitation.php">
                    <h2 class=" service__title">Suivi de la demande de facilitation</h2>
                </a>
                <p class="service__description">
                    La demande de facilitation que vous déposez récemment vous pouvez suivre les étapes et le processus
                    de cette demande .En cliquant sur le lien en dessous.
                </p>
            </div>
            <div class="service__image">
                <img src="./assets/suivi_des_demandes.png" alt="service">
            </div>
        </article>
        <article id="consulte-compte" class="service">
            <div class="service__infos">
                <a href="./consulteCompte.php">
                    <h2 class="service__title">Consultation de compte</h2>
                </a>
                <p class="service__description">
                    Si vous n'avez pas encore créé votre compte ferme , créez le maintenant , et vous pouvez pourrez
                    consulter vos informations ,et les modifier grâce à ce lien .
                </p>
            </div>
            <div class="service__image">
                <img src="./assets/consultation_de_compte.jpg" alt="service">
            </div>
        </article>
        <article id="demande-labellisation" class="service">
            <div class="service__infos">
                <a href="./demande_labilisation.php">
                    <h2 class="service__title">Demander la labellisation</h2>
                </a>
                <p class="service__description">
                    Le producteur peut-on faire une demande de labellisation déclenchant un processus de visite
                </p>
            </div>
            <div class="service__image">
                <img src="./assets/les_demandes.jpg" alt="service">
            </div>
        </article>
        <article id="suivi-demande-labellisation" class="service">
            <div class="service__infos">
                <a href="./suivie_labilisation.php">
                    <h2 class="service__title">Suivi la demande la labellisation</h2>
                </a>
                <p class="service__description">
                    La demande de labellisation que vous déposez récemment vous pouvez suivre les étapes et le processus
                    de cette demande .En cliquant sur le lien en dessous
                </p>
            </div>
            <div class="service__image">
                <img src="./assets/suivi_des_demandes.png" alt="service">
            </div>
        </article>
        <article id="consulte-requetes" class="service">
            <div class="service__infos">
                <a href="./consulte_enquetes.php">
                    <h2 class="service__title">Consulter les enquêtes</h2>
                </a>
                <p class="service__description">
                    Il faut être un coordinateur pour y accéder paramètres des enquêtes.
                </p>
            </div>
            <div class="service__image">
                <img src="./assets/consultation_des_enquêtes.jpg" alt="service">
            </div>
        </article>
    </section>

    <?php include('./ui/footer.php'); ?>

    <script src='./js/navigation.js'></script>
</body>

</html>