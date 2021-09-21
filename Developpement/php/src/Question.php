<?php

class Question {

    public static function createFromId(int $numQuestion) : self
    {
        $requete = MyPDO::getInstance()->prepare(<<<SQL
            SELECT *
            FROM question
            WHERE numQuestion = ?
        SQL);

        $requete->setFetchMode(PDO::FETCH_CLASS, Commande::class);
        $requete->bindValue(1, $numQuestion);
        $requete->execute();

        if (($ligne = $requete->fetch()) !== false)
            return $ligne;
        
        if (!$requete->fetch())
            throw new Exception("La question n'a pas été trouvé dans la base de données");
    }

    public function repondre(string $reponse) 
    {
        $requete = MyPDO::getInstance()->prepare(<<<SQL
            INSERT INTO reponses VALUES (:v)
        SQL);

        $requete->bindValue(':v', $reponse);
        $requete->execute();
    }

}