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


// Création d'une nouvelle instance de webpage nommée pageProfil
$pageProfil = new WebPage();

// Titre de la page pageProfil
$pageProfil->setTitle("Profil");

// Url bootstrap à mettre
$pageProfil->appendCssUrl("");

// Css de la page à mettre
$pageProfil->appendCss(<<<CSS

CSS
);

// Ajout de l'entête de la page en HTML
$pageProfil->appendToHead(<<<HTML

HTML
);

// Commencement boucle pour afficher des choses de la base de données
$pageProfil->appendContent(<<<HTML

HTML
);

// Boucle permettant d'afficher les données de la base de données
while (($ligne = $stmt->fetch()) !== false) {
    $pageProfil->appendContent(<<<HTML
            <h1> {$ligne['']} : {$ligne['']} </h1>
HTML
    );
}

// Fin de la boucle pour afficher des choses de la base de données
$pageProfil->appendContent(<<<HTML

HTML
);

// Ajout du corps de la page en HTML
$pageProfil->appendContent(<<<HTML
    
HTML
);

// Affichage de la page
echo $pageProfil->toHTML();

