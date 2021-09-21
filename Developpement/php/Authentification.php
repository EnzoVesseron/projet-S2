<?php
declare(strict_types=1);
require_once 'autoload.php';

$stmt = MyPDO::getInstance()->prepare(<<<SQL
    SELECT MAX(numCli)
    FROM CLIENT;
SQL);

$stmt->execute();
$stmt = $stmt->fetch();

if (isset($_POST['contact']) && isset($_POST['motdepasse']))
{
    $client = Client::nouveauCompte(1, "", "", "", $_POST['contact'], 1, $_POST['motdepasse']);
}


// Création d'une nouvelle instance de webpage nommée authentification
$authentification = new WebPage();

// Titre de la page authentification
$authentification->setTitle("Authentification");

// Url bootstrap à mettre
$authentification->appendCssUrl("");

// Css de la page à mettre
$authentification->appendCss(<<<CSS

CSS
);

// Ajout de l'entête de la page en HTML
$authentification->appendToHead(<<<HTML

HTML
);

// Commencement boucle pour afficher des choses de la base de données
$authentification->appendContent(<<<HTML

HTML
);

// Boucle permettant d'afficher les données de la base de données
while (($ligne = $stmt->fetch()) !== false) {
    $authentification->appendContent(<<<HTML
            <h1> {$ligne['']} : {$ligne['']} </h1>
HTML
    );
}

// Fin de la boucle pour afficher des choses de la base de données
$authentification->appendContent(<<<HTML

HTML
);

// Ajout du corps de la page en HTML
$authentification->appendContent(<<<HTML
    
HTML
);

// Affichage de la page
echo $authentification->toHTML();

