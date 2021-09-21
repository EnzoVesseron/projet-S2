<?php
declare(strict_types=1);
require_once 'WebPage.php';
require_once "MyPDO.template.php";
require_once "MyPDO.php";

// Création d'une nouvelle instance de webpage nommée creationDeCompte
$creationDeCompte = new WebPage();

// Titre de la page creationDeCompte
$creationDeCompte->setTitle("Contacter support");

// Css de la page à mettre
$creationDeCompte->appendCss(<<<CSS
        #phrases{
            margin-top: 6%;
        }

        #txtbouton1{
            font-family: 'Roboto', Arial, sans-serif;
            font-style: normal;
            font-weight: 900;
            font-size: 18px;
            line-height: 21px;
            text-align: center;
            color: #FFFFFF;
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

        #boutonretour{
            margin: auto;
            margin-top: 10%;
            background: #FFFFFF;
            box-shadow: 0px 6px 10px rgba(0, 0, 0, 0.05);
            border-radius: 13px;
            padding : 7px;
        }

        #bouton{
            margin: auto;
            margin-top: 10%;
            background: #FFFFFF;
            box-shadow: 0px 6px 10px rgba(0, 0, 0, 0.05);
            border-radius: 13px;
            padding : 7px;
        }

        #positionbouton{
            margin: auto;
            margin-top: 10%;
        }

        #boutonOrange{
            margin: auto;
            margin-top: 10%;
            margin-right: 150px;
        }
CSS
);

// Ajout de l'entête de la page en HTML
$creationDeCompte->appendToHead(<<<HTML
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link rel="icon" type="image/png" href="../assets/img/logo.png" />
    <link href="../assets/style.css" rel="stylesheet">
HTML
);

// Commencement boucle pour afficher des choses de la base de données
$creationDeCompte->appendContent(<<<HTML
<div id="div-header">
    <header>
        <p class="mx-5 my-3 bg-white position-fixed px-5 py-1 rounded-pill fw-bold shadow-sm">Gillus</p>

        <div class="mx-5 my-3 position-fixed end-0 d-flex flex-row">

            <nav class="navbar navbar-expand-lg navbar-light py-0 bg-white rounded text-end shadow-sm px-2 mx-3 rounded-pill">
                <div class="container-fluid">
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a class="nav-link text-dark py-0" aria-current="page"
                                   href="Authentification.html">Accueil</a>
                            </li>
                            <li class="nav-item">
                                <a  class="nav-link text-dark py-0" href="CommencerConfig.html">Sur mesure</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-dark py-0" href="#">Réparation</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-dark py-0" href="giloumatic.html">Créer config</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-dark py-0" href="creationDeCompte.html">Contact</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>

            <svg xmlns="http://www.w3.org/2000/svg" style="width : 40px;"
                 class="bg-white rounded shadow-sm p-2 rounded-pill" fill="none" viewBox="0 0 24 24"
                 stroke="currentColor">
                <path class="nav-link text-danger border-bottom border-danger p-0" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0zm6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
        </div>

    </header>

</div>

<div id="flecheRetour"> <a href="Authentification.html"><img src="../assets/img/fleche.png" height="30" width="30" alt="Retour"></a></div>
<div id="phrases">
    <h1>Création de compte</h1>
</div>

<div class="row justify-content-md-center">
    <div class="col col-lg-2">
    </div>
    <div class="col-md-auto">
        <div id="bouton">
            <form name="creationcompte" method="POST" action="../index.html">
                <label>
                    <input name="contact" type="email" style="border :none" placeholder="Adresse mail" required>
                </label>

        </div>
    </div>
    <div class="col col-lg-2">
    </div>
</div>
HTML
);

$etapes = [ "MDP" => "motdepasse", "Confirmation" => "confmotdepasse" ];

foreach($etapes as $key => $value)
{
    $creationDeCompte->appendContent(<<<HTML
    <div class="row justify-content-md-center">
        <div class="col col-lg-2">
        </div>
        <div class="col-md-auto">
            <div id="bouton">
                <label>
                    <input name={$value} type="password" style="border :none" placeholder={$key} pattern="[A-Z0-9]{4,20}" required>
                </label>
            </div>
        </div>
        <div class="col col-lg-2">
        </div>
    </div>
    HTML
    );
}

// Ajout du corps de la page en HTML
$creationDeCompte->appendContent(<<<HTML
  <div class="row justify-content-md-center">
    <div class="col col-lg-2">
    </div>
    <div class="col-md-auto">
        <div class="d-flex flex-row" id="positionbouton">
            <div id="boutonOrange"><button type="submit" style="border: none; background-color: transparent" id="txtbouton1">Créer un compte</button></div>
            <div id="boutonretour"><a id="txtbouton2" href="Authentification.html">Retour</a></div>
        </div>
    </div>
    <div class="col col-lg-2">
    </div>
</div>
</form>  
HTML
);

// Affichage de la page
echo $creationDeCompte->toHTML();