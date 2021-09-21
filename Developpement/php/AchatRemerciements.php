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


// Création d'une nouvelle instance de webpage nommée achatRemerciements
$achatRemerciements = new WebPage();

// Titre de la page achatRemerciements
$achatRemerciements->setTitle("Remerciements pour votre achat");

// Url bootstrap à mettre
$achatRemerciements->appendCssUrl("");

// Css de la page à mettre
$achatRemerciements->appendCss(<<<CSS

CSS
);

// Ajout de l'entête de la page en HTML
$achatRemerciements->appendToHead(<<<HTML

HTML
);

// Commencement boucle pour afficher des choses de la base de données
$achatRemerciements->appendContent(<<<HTML

HTML
);

// Boucle permettant d'afficher les données de la base de données
while (($ligne = $stmt->fetch()) !== false) {
    $achatRemerciements->appendContent(<<<HTML
            <h1> {$ligne['']} : {$ligne['']} </h1>
HTML
    );
}

// Fin de la boucle pour afficher des choses de la base de données
$achatRemerciements->appendContent(<<<HTML

HTML
);

// Ajout du corps de la page en HTML
$achatRemerciements->appendContent(<<<HTML
    
HTML
);

// Affichage de la page
echo $achatRemerciements->toHTML();

