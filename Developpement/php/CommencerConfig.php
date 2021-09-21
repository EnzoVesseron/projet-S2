<?php
declare(strict_types=1);
require_once 'WebPage.php';
require_once "MyPDO.template.php";
require_once "MyPDO.php";


// Création d'une nouvelle instance de webpage nommée quizz1
$quizz1 = new WebPage();

$quizz1->appendCss(<<<CSS
#phrases{
                margin-top: 10%;
            }

            #txtbouton1{
                font-family: 'Roboto', Arial, sans-serif;
                font-style: normal;
                font-weight: 900;
                font-size: 18px;
                line-height: 21px;
                text-align: center;
                padding: 10px;
                color: #FFFFFF;
                margin: 100px 20px;
            }
            #txtbouton2{
                font-family: 'Roboto', Arial, sans-serif;
                font-style: normal;
                font-weight: 900;
                font-size: 18px;
                line-height: 21px;
                text-align: center;
                color : black;
                margin: 10px 20px;
            }

            #div-header{
                top: 0;
                display: flex;
            }

            #bouton{
                margin: auto;
                margin-top: 10%;
            }
            #boutonOrange{
                margin-right: 150px;
            }

            #bouton2{
                background: #FFFFFF;
                box-shadow: 0px 6px 10px rgba(0, 0, 0, 0.05);
                border-radius: 13px;
                padding : 7px;
            }

            #retour{
                margin-top: 5%;
                margin-left: 5%;
            }
CSS
);
// Titre de la page quizz1
$quizz1->setTitle("Quizz");

// Url bootstrap à mettre
$quizz1->appendCssUrl("https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css");
$quizz1->appendCssUrl("../assets/style.css");


// Ajout de l'entête de la page en HTML
$quizz1->appendToHead(<<<HTML
    <link rel="icon" type="image/png" href="../assets/img/logo.png" />
HTML
);

// Commencement boucle pour afficher des choses de la base de données
$quizz1->appendContent(<<<HTML
<body class="w-100 h-100">
        <div id="div-header">
        <header>
            <p class="mx-5 my-3 bg-white position-absolute top-0 px-5 py-1 rounded-pill fw-bold shadow-sm">Gillus</p>

            <div class="mx-5 my-3 position-absolute top-0 end-0 d-flex flex-row">

                                    <nav class="navbar navbar-expand-lg navbar-light py-0 bg-white rounded text-end shadow-sm px-2 mx-3 rounded-3">
            <div class="container-fluid">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item"><a
                                class="nav-link text-dark py-0" href="Accueil.php">Accueil</a></li>
                        <li class="nav-item"><a class="nav-link gradient-button rounded rounded-3 shadow-sm flex-fill text-white py-0 "
                                aria-current="page" href="CommencerConfig.php">Sur
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

                <svg xmlns="http://www.w3.org/2000/svg" style="width : 40px;"
                     class="bg-white rounded shadow-sm p-2 rounded-pill" fill="none" viewBox="0 0 24 24"
                     stroke="currentColor">
                    <a href="Authentification.php"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                          d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0zm6 2a9 9 0 11-18 0 9 9 0 0118 0z" /></a>
                </svg>
            </div>

        </header>

            </div>
        <div id="retour"> <a href="Accueil.php"><img src="../assets/img/fleche.png" height="30" width="30" alt="Retour"></a></div>
        <div id="phrases">
            <h1>Bienvenue dans l'outil création de config sur mesure</h1>
            <h2>Nous allons vous poser plusieurs questions qui vont nous permettre de déterminer<br> quelle est la meilleure
                configuration possible pour vos besoins.</h2>
        </div>

        <div class="row justify-content-md-center">
            <div class="col col-lg-2">
            </div>
            <div class="col-md-auto">
                <div class="d-flex flex-row" id="bouton">
                    <div id="boutonOrange"><a id="txtbouton1" href="Quizz1.php">Commencer à créer ma config</a></div>
                    <div id="bouton2"><a id="txtbouton2" href="PageCreationVide.php">Pas besoin d’aide je suis un pro !</a></div>
                </div>
            </div>
            <div class="col col-lg-2">
            </div>
        </div>


    </body>
HTML
);

// Affichage de la page
echo $quizz1->toHTML();

