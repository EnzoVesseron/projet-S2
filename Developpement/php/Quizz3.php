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
$quizz1->appendCssUrl("../assets/custom.css");

// Css de la page à mettre
$quizz1->appendCss(<<<CSS
    
CSS
);

// Ajout de l'entête de la page en HTML
$quizz1->appendToHead(<<<HTML
    <link rel="icon" type="image/png" href="../assets/img/logo.png" />
HTML
);

// Commencement boucle pour afficher des choses de la base de données
$quizz1->appendContent(<<<HTML
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

<body class="bg-light">

    <div class="progress">
        <div class="progress-bar progress-bar-striped bg-danger progress-bar-animated" role="progressbar"
            style="width: 75%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
    </div>
    <h2>Esthétisme ou performance</h2>
    <p id="desc">Choisissez si vous préférez privilégier l’hestétique ou la performance pour votre PC</p>

    <div class="row row-cols-1 row-cols-md-2 g-4 " id="card">
        <div class="col">
          <div class="card h-100 text-center">
            <img src="../assets/img/esthetisme.png" class="card-img-top" alt="...">
            <div class="card-body ">
              <h5 class="card-title">Esthetisme</h5>
              <a href="Quizz4.php?budget={$_GET["budget"]}&utilisation={$_GET["utilisation"]}&eop=e"
              class=" gradient-button py-1 rounded-3 fw-bold shadow nav-link text-white m-3 text-center"
              style="width: 110px;">Choisir</a>            
            </div>
          </div>
        </div>
        <div class="col">
          <div class="card h-100 text-center">
            <img src="../assets/img/performance.png" class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title">performance</h5>
              <a href="Quizz4.php?budget={$_GET["budget"]}&utilisation={$_GET["utilisation"]}&eop=p"
              class=" gradient-button py-1 rounded-3 fw-bold shadow nav-link text-white m-3 text-center"
              style="width: 110px;">Choisir</a>
            </div>
          </div>
        </div>
      </div>

        <div class="button d-flex m-3 justify-content-center">
            <a href="Quizz2.php?budget={$_GET["budget"]}" class="bg-white py-1 rounded-3 fw-bold shadow nav-link text-dark m-3 text-center"
                style="width: 100px;">Retour</a>
        </div>
    </form>


</body>
HTML
);

// Affichage de la page
echo $quizz1->toHTML();

