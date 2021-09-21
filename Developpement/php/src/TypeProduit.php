<?php

class TypeProduit {
    
    public static function createFromId(int $numTypeProd) : self
    {
        $requete = MyPDO::getInstance()->prepare(<<<SQL
            SELECT *
            FROM typeProduit
            WHERE numTypeProd = ?
        SQL);

        $requete->setFetchMode(PDO::FETCH_CLASS, TypeProduit::class);
        $requete->bindValue(1, $numTypeProd);
        $requete->execute();

        if (($ligne = $requete->fetch()) !== false)
            return $ligne;
        
        if (!$requete->fetch())
            throw new Exception("Le type du produit n'a pas été trouvé dans la base de données");
    }

    public function getNumTypeProduit() : int
    {
        return $this->numTypeProduit;
    }

    public function getLibTypeProduit() : string
    {
        return $this->libTypeProduit;
    }
}