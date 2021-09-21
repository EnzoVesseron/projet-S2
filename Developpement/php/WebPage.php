<?php

/**
 * Classe de Webpage qui permet de créer une page web
 */
class WebPage
{
    /**
     * @var string $head Contient l'entête de la page web
     * @var string $title Contient le titre de la page web
     * @var string $body Contient le corps de la page web
     */
    private string $head = "";
    private string $title = "";
    private string $body = "";

    /**
     * Constructeur de la page web
     * @param string $title Le titre qui sera attribué à la page web
     */
    public function __construct(string $title = "")
    {
        $this->title = $title;
        $this->head = "";
        $this->body = "";
    }

    /**
     * Permet d'obtenir le corps de la page web
     * @return string
     */
    public function getBody(): string
    {
        return $this->body;
    }

    /**
     * Permet d'obtenir l'entête de la page web
     * @return string
     */
    public function getHead(): string
    {
        return $this->head;
    }

    /**
     * Permet d'obtenir le titre de la page web
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * Permet de changer la titre de la page web
     * @param string $title
     */
    public function setTitle(string $title): void
    {
        $this->title = $title;
    }

    /**
     * Permet d'ajouter du contenu dans l'entête de la page web
     * @param string $content
     */
    public function appendToHead(string $content): void
    {
        $this->head .= $content;
    }

    /**
     * Permet d'ajouter du contenu dans l'entête de la page
     * @param string $css
     */
    public function appendCss(string $css): void
    {
        $this->head .= "<style>{$css}</style>";
    }

    /**
     * Permet d'ajouter l'url d'un script css dans l'entête de la page
     * @param string $url
     */
    public function appendCssUrl(string $url): void
    {
        $this->head .= "<link rel='stylesheet' media='screen' href='{$url}' />";
    }

    /**
     * Permet d'ajouter du contenu Js dans l'entête de la page
     * @param string $js
     */
    public function appendJs(string $js): void
    {
        $this->head .= "<script>{$js}</script>";
    }

    /**
     * Permet d'ajouter l'url d'un script js dans l'entête de la page
     * @param string $url
     */
    public function appendJsUrl(string $url): void
    {
        $this->head .= "<script src='{$url}'></script>";
    }

    /**
     * Permet d'ajouter du contenu dans le corps de la page web
     * @param string $content
     */
    public function appendContent(string $content): void
    {
        $this->body .= $content;
    }


    /**
     * Permet de produire la page web complète
     * @return string
     * @throws Exception
     */
    public function toHTML(): string
    {
        if ($this->title == "") {
            throw new Exception('Il faut mettre un titre !');
        }
        return <<<HTML
<!doctype html>
<html>
  <head>
    <meta charset="utf-8">
    <title>{$this->title}</title>
{$this->head}
  </head>
  <body>
    <div id="page">
        {$this->body}
    </div>
  </body>
</html>
HTML;
    }

    /**
     *  Permet d'avoir la date et l'heure de la dernière modification du script principal
     * @return string
     */
    public function getLastModification(): string
    {
        return strftime("%d/%m/%Y %T", getlastmod());
    }

    /**
     * Permet de protéger les caractères spéciaux pouvant dégrader la page web
     * @param string $string
     * @return string
     */
    public function escapeString(string $string): string
    {
        return htmlspecialchars($string, ENT_QUOTES, "utf-8");
    }

}