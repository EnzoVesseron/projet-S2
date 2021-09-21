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


// Création d'une nouvelle instance de webpage nommée achat
$achat = new WebPage();

// Titre de la page achat
$achat->setTitle("Achat de votre config");

// Url bootstrap à mettre
$achat->appendCssUrl("");

// Css de la page à mettre
$achat->appendCss(<<<CSS

CSS
);

// Ajout de l'entête de la page en HTML
$achat->appendToHead(<<<HTML

HTML
);

// Commencement boucle pour afficher des choses de la base de données
$achat->appendContent(<<<HTML

HTML
);

// Boucle permettant d'afficher les données de la base de données
while (($ligne = $stmt->fetch()) !== false) {
    $achat->appendContent(<<<HTML
            <h1> {$ligne['']} : {$ligne['']} </h1>
HTML
    );
}

// Fin de la boucle pour afficher des choses de la base de données
$achat->appendContent(<<<HTML

HTML
);

// Ajout du corps de la page en HTML
$achat->appendContent(<<<HTML
    
HTML
);

// Affichage de la page
echo $achat->toHTML();

