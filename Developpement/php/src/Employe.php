<?php
declare(strict_types=1);

class Employe
{
    public function createFromId(int $numEmp): Employe
    {
        $stmt = MyPDO::getInstance()->prepare(<<<SQL
                SELECT *
                FROM Employe
                WHERE numEmp = :numEmp
            SQL
        );
        $stmt->bindValue(':numEmp', $numEmp);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_CLASS, Employe::class);
        if (($ligne = $stmt->fetch()) == false)
            throw new InvalidArgumentException("L'Employé' n'a pas été trouvé dans la base de donnée");
        return $ligne;
    }

    public function getNumEmp(): int
    {
        $stmt = MyPDO::getInstance()->prepare(<<<SQL
            SELECT numEmp
            FROM Employe
        SQL
        );
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_CLASS);
    }

    public function getNomEmp(): String
    {
        $stmt = MyPDO::getInstance()->prepare(<<<SQL
            SELECT nomEmp
            FROM Employe
        SQL
        );
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_CLASS);
    }

}