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


// Création d'une nouvelle instance de webpage nommée listeDesProduits
$listeDesProduits = new WebPage();

// Titre de la page listeDesProduits
$listeDesProduits->setTitle("Liste des produits");

// Url bootstrap à mettre
$listeDesProduits->appendCssUrl("");

// Css de la page à mettre
$listeDesProduits->appendCss(<<<CSS

CSS
);

// Ajout de l'entête de la page en HTML
$listeDesProduits->appendToHead(<<<HTML

HTML
);

// Commencement boucle pour afficher des choses de la base de données
$listeDesProduits->appendContent(<<<HTML

HTML
);

// Boucle permettant d'afficher les données de la base de données
while (($ligne = $stmt->fetch()) !== false) {
    $listeDesProduits->appendContent(<<<HTML
            <h1> {$ligne['']} : {$ligne['']} </h1>
HTML
    );
}

// Fin de la boucle pour afficher des choses de la base de données
$listeDesProduits->appendContent(<<<HTML

HTML
);

// Ajout du corps de la page en HTML
$listeDesProduits->appendContent(<<<HTML
    
HTML
);

// Affichage de la page
echo $listeDesProduits->toHTML();

