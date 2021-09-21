<?php
declare(strict_types=1);
require_once 'WebPage.php';
require_once "MyPDO.template.php";
require_once "MyPDO.php";


// Création d'une nouvelle instance de webpage nommée quizz1
$quizz1 = new WebPage();

// Titre de la page quizz1
$quizz1->setTitle("Quizz");

// Url bootstrap à mettre
$quizz1->appendCssUrl("https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css");
$quizz1->appendCssUrl("../assets/style.css");

// Css de la page à mettre
$quizz1->appendCss(<<<CSS
    
CSS
);

// Ajout de l'entête de la page en HTML
$quizz1->appendToHead(<<<HTML
    <link rel="icon" type="image/png" href="assets/img/logo.png" />
HTML
);

// Commencement boucle pour afficher des choses de la base de données
$quizz1->appendContent(<<<HTML
<header class="d-flex justify-content-end bg-light">
    <p id="gillus" class="bg-white px-5 py-1 rounded-3 fw-bold shadow-sm ">Gillus</p>

    <div class="mx-5 my-3 d-flex flex-row">

                <nav class="navbar navbar-expand-lg navbar-light py-0 bg-white rounded text-end shadow-sm px-2 mx-3 rounded-3">
            <div class="container-fluid">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item"><a
                                class="nav-link gradient-button rounded rounded-3 shadow-sm flex-fill text-white py-0 "
                                aria-current="page" href="Accueil.php">Accueil</a></li>
                        <li class="nav-item"><a class="nav-link text-dark py-0" href="CommencerConfig.php">Sur
                                mesure</a></li>
                        <li class="nav-item"><a class="nav-link text-dark py-0" href="#">Réparation</a></li>
                        <li class="nav-item"><a class="nav-link text-dark py-0" href="PageCreationVide.php">Créer
                                config</a></li>
                        <li class="nav-item"><a class="nav-link text-dark py-0"
                                href="ContacterSupport.php">Contact</a></li>
                    </ul>
                </div>
            </div>
        </nav>

        <a class="Z" href="ModificationInformationsCompte.php"><svg xmlns="http://www.w3.org/2000/svg"
                style="width : 40px;" class="rounded shadow-sm p-2 rounded-3" fill="none" viewBox="0 0 24 24"
                stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0zm6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg></a>
    </div>
</header>

<body class="bg-light">
    <section id="imgcentre" class="w-100">
        <img src="../assets/img/laptop_index.svg" class="w-100" id="imgfond">
        <img src="../assets/img/logo.png" class="" id="logo" type="image/png">
    </section>

    <section class="d-flex flex-row" id="desc">
        <img src="../assets/img/2f62ba8dc18e8ceb2e8abe5aef7df8ad.png" id="imgdesc">
        <div class="d-flex flex-column justify-content-center align-middle" id="textdesc">
            <h2>Nous vous accompagnons dans la création de votre configuration</h2>
            <p class="py-3">Nous allons vous poser plusieurs questions qui vont nous permettre de déterminer quelle est
                la meilleure configuration possible pour vos besoins.</p>
            <a id="button" href="#"
                class="gradient-button px-5 py-1 rounded-3 fw-bold shadow nav-link text-white">Commencer à créer ma
                config</a>
        </div>
    </section>
</body>
HTML
);

// Affichage de la page
echo $quizz1->toHTML();

