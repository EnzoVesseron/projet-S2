<?php

class Client {

    public static function nouveauCompte(int $numCli = "", string $nomCli = "", string $pnomCli = "", string $dateNaisCli = "", string $emailCli = "", int $idConnexion = 0, string $password = "")
    {
        $requete = MyPDO::getInstance()->prepare(<<<SQL
            INSERT INTO client (numCli, nomCli, pnomCli, dateNais, emailCli, idConnection, password) VALUES (?, ?, ?, ?, ?, ?, ?);
        SQL);

        $requete->bindValue(1, $numCli);
        $requete->bindValue(2, $nomCli);
        $requete->bindValue(3, $pnomCli);
        $requete->bindValue(4, $dateNaisCli);
        $requete->bindValue(5, $emailCli);
        $requete->bindValue(6, $idConnexion);
        $requete->bindValue(7, $password);
        $requete->execute();
    }

    public static function createFromId(int $numCli) : self
    {
        $requete = MyPDO::getInstance()->prepare(<<<SQL
            SELECT *
            FROM client
            WHERE numCli = ?
        SQL);

        $requete->setFetchMode(PDO::FETCH_CLASS, Client::class);
        $requete->bindValue(1, $numCli);
        $requete->execute();

        if (($ligne = $requete->fetch()) !== false)
            return $ligne;
        
        if (!$requete->fetch())
            throw new Exception("Le client n'a pas été trouvé dans la base de données");
    }

    public static function getAll() : array
    {
        $requete = MyPDO::getInstance()->prepare(<<<SQL
            SELECT *
            FROM client;
        SQL);

        $requete->fetchAll(PDO::FETCH_CLASS);
        $requete->execute();

        $allClients = [];

        while (($ligne = $requete->fetch()) !== false)
            array_push($allClients, $ligne);
        
        if (count($allClients) > 0)
            return $allClients;
        else
            throw new Exception("Problème de PDO");
    }

    public function getAge() : int 
    {
        return $this->age;
    }

    public function getNumCli() : int
    {
        return $this->numCli;
    }

    public function getNomCli() : string
    {
        return $this->nomCli;
    }

    public function getPnomCli() : string
    {
        return $this->pnomCli;
    }

    public function getDateNaisCli() : string
    {
        return $this->dateNaisCli;
    }

    public function getVilleCli() : string
    {
        return $this->villeCli;
    }

    public function getAdresseCli() : string
    {
        return $this->adresseCli;
    }

    public function getCPCli() : string
    {
        return $this->CPCli;
    }

    public function getemailCli() : string
    {
        return $this->emailCli;
    }

    public function getTelCli() : string
    {
        return $this->telCli;
    }

}