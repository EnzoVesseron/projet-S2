<?php

class Produit extends TypeProduit {
    
    public static function createFromId(int $numProd) : self
    {
        $requete = MyPDO::getInstance()->prepare(<<<SQL
            SELECT *
            FROM produit
            WHERE numProd = ?
        SQL);

        $requete->setFetchMode(PDO::FETCH_CLASS, Produit::class);
        $requete->bindValue(1, $numProd);
        $requete->execute();

        if (($ligne = $requete->fetch()) !== false)
            return $ligne;
        
        if (!$requete->fetch())
            throw new Exception("Le produit n'a pas été trouvé dans la base de données");
    }

    public function estCompatible(Produit $produit) : bool
    {
        return true;
    }

    public function getPrix() : float
    {
        return $this->prixProduit;
    }

    public function setAdresseLivraison(string $ad) : void
    {
        $this->adresseLivraison = $ad;
    }

    public function getLibProd() : string
    {
        return $this->libProd;
    }

    public function getMarque() : float
    {
        return $this->marque;
    }

    public function getCaracteristiques() : string
    {
        return $this->caracteristiques;
    }

    public function getEnStock() : bool
    {
        return $this->enStock;
    }
}