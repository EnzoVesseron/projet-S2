<?php

class Commande extends Produit {

    public static function nouvelleCommande(int $numCmde, string $dateCmde, string $adresseDeLivraison, string $dateLivraison, string $CPLivraison, int $villeLivraison, string $moyenPayement)
    {
        $requete = MyPDO::getInstance()->prepare(<<<SQL
            INSERT INTO client (numCmde, dateCmde, adresseDeLivraison, dateLivraison, CPLivraison, villeLivraison, moyenPayement) VALUES (?, ?, ?, ?, ?, ?, ?);
        SQL);

        $requete->bindValue(1, $numCmde);
        $requete->bindValue(2, $dateCmde);
        $requete->bindValue(3, $adresseDeLivraison);
        $requete->bindValue(4, $dateLivraison);
        $requete->bindValue(5, $CPLivraison);
        $requete->bindValue(6, $villeLivraison);
        $requete->bindValue(7, $moyenPayement);
        $requete->execute();
    }
    
    public static function createFromId(int $numCmde) : self
    {
        $requete = MyPDO::getInstance()->prepare(<<<SQL
            SELECT *
            FROM commande
            WHERE numCmde = ?
        SQL);

        $requete->setFetchMode(PDO::FETCH_CLASS, Commande::class);
        $requete->bindValue(1, $numCmde);
        $requete->execute();

        if (($ligne = $requete->fetch()) !== false)
            return $ligne;
        
        if (!$requete->fetch())
            throw new Exception("La commande n'a pas été trouvé dans la base de données");
    }

    public function ajouterProduit(int $numProd) : void 
    {
        $requete = MyPDO::getInstance()->prepare(<<<SQL
            INSERT INTO composer SELECT numProd FROM produit WHERE numProd = ?
        SQL);

        $requete->bindValue(1, $numProd);
        $requete->execute();
    }

    public function enleverProduit(int $numProd) : void
    {
        $requete = MyPDO::getInstance()->prepare(<<<SQL
            DELETE FROM composer WHERE numProd = ? 
        SQL);

        $requete->bindValue(1, $numProd);
        $requete->execute();
    }

    public function compoValide() : bool
    {
        return true;
    }

    public function afficherCommande() : string
    {
        return "Details de la commande:" + "\n" + 
                "N°Commande : {$this->numCmde}" + "\n" + 
                "Date de commande : {$this->dateCmde}" + "\n" + 
                "Adresse de livraison : {$this->adresseDeLivraison}, {$this->CPLivraison}, {$this->villeLivraison}" + "\n" + 
                "Date de livraison : {$this->dateLivraison}" + "\n" + 
                "Moyen de payement : {$this->moyenPayement}";
    }

    public function setAdresseLivraison(string $ad) : void
    {
        $this->adresseLivraison = $ad;
    }

    public function 
}