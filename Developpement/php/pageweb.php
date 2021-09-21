<?php

require_once 'src/WebPage.php';

$webpage = new WebPage();

$webpage->setTitle('Ma première page Web objet');

$webpage->appendCssUrl("https://iut-info.univ-reims.fr/users/cutrona/css/styleTP.css");
$webpage->appendCSS(<<<CSS
    p em {
        background-color : green;
    }
    h1 {
        font-family: Courier, sans-serif;
    }
CSS
);

$webpage->appendJS(<<<JAVASCRIPT
    window.onload = function () {
        window.alert('Ça fonctionne !');
    }
JAVASCRIPT
);

$string = WebPage::escapeString('<body>');

$webpage->appendContent(<<<HTML
    <h1>Ma première page Web en PHP objet !</h1>
    <p>Vous êtes en train de lire ma première page Web écrite en <em>PHP objet</em>.
HTML
);
$webpage->appendContent("<p>Vous êtes à la fin de <code>$string</code>.");

echo $webpage->toHTML();