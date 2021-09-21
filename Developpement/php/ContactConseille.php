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


// Création d'une nouvelle instance de webpage nommée contactConseille
$contactConseille = new WebPage();

// Titre de la page contactConseille
$contactConseille->setTitle("Contact avec un conseillé");

// Url bootstrap à mettre
$contactConseille->appendCssUrl("");

// Css de la page à mettre
$contactConseille->appendCss(<<<CSS

CSS
);

// Ajout de l'entête de la page en HTML
$contactConseille->appendToHead(<<<HTML

HTML
);

// Commencement boucle pour afficher des choses de la base de données
$contactConseille->appendContent(<<<HTML

HTML
);

// Boucle permettant d'afficher les données de la base de données
while (($ligne = $stmt->fetch()) !== false) {
    $contactConseille->appendContent(<<<HTML
            <h1> {$ligne['']} : {$ligne['']} </h1>
HTML
    );
}

// Fin de la boucle pour afficher des choses de la base de données
$contactConseille->appendContent(<<<HTML

HTML
);

// Ajout du corps de la page en HTML
$contactConseille->appendContent(<<<HTML
    
HTML
);

// Affichage de la page
echo $contactConseille->toHTML();

