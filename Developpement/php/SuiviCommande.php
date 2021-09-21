<?php
declare(strict_types=1);
require_once 'WebPage.php';
require_once "MyPDO.template.php";
require_once "MyPDO.php";


// Connexion à la base de données
MyPDO::setConfiguration('mysql:host=mysql;dbname=pons0026;charset=utf8', 'pons0026', 'GW8eCocOBilu7RRE');

// Ecriture de la requête SQL
$stmt = MyPDO::getInstance()->prepare(<<<SQL
 
SQL
);

// Execution de la requête SQL
$stmt->execute();


// Création d'une nouvelle instance de webpage nommée suiviCommande
$suiviCommande = new WebPage();

// Titre de la page suiviCommande
$suiviCommande->setTitle("Suivi de commande");

// Url bootstrap à mettre
$suiviCommande->appendCssUrl("");

// Css de la page à mettre
$suiviCommande->appendCss(<<<CSS

CSS
);

// Ajout de l'entête de la page en HTML
$suiviCommande->appendToHead(<<<HTML

HTML
);

// Commencement boucle pour afficher des choses de la base de données
$suiviCommande->appendContent(<<<HTML

HTML
);

// Boucle permettant d'afficher les données de la base de données
while (($ligne = $stmt->fetch()) !== false) {
    $suiviCommande->appendContent(<<<HTML
            <h1> {$ligne['']} : {$ligne['']} </h1>
HTML
    );
}

// Fin de la boucle pour afficher des choses de la base de données
$suiviCommande->appendContent(<<<HTML

HTML
);

// Ajout du corps de la page en HTML
$suiviCommande->appendContent(<<<HTML
    
HTML
);

// Affichage de la page
echo $suiviCommande->toHTML();

