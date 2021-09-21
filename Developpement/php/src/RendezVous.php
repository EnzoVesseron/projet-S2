<?php
declare(strict_types=1);

class RendezVous
{
    public function createFromId(int $numRDV): Employe
    {
        $stmt = MyPDO::getInstance()->prepare(<<<SQL
                SELECT *
                FROM RDV
                WHERE numRDV = :numRDV
            SQL
        );
        $stmt->bindValue(':numRDV', $numRDV);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_CLASS, Employe::class);
        if (($ligne = $stmt->fetch()) == false)
            throw new InvalidArgumentException("Le rendez-vous n'a pas été trouvé dans la base de donnée");
        return $ligne;
    }

    public static function ajouterRDV(int $numRDV,string $typeRDV,Date $dateRDV,string $heureRDV,string $lieuRDV) :void
    {
        $stmt = MyPDO::getInstance()->prepare(<<<SQL
                INSERT INTO RendezVous
                VALUES (:numRDV, :typeRDV, :dateRDV, :heureRDV, :lieuRDV)
            SQL
        );
        $stmt->bindValue(':numRDV', $numRDV);
        $stmt->bindValue(':typeRDV', $typeRDV);
        $stmt->bindValue(':dateRDV', $dateRDV);
        $stmt->bindValue(':heureRDV', $heureRDV);
        $stmt->bindValue(':lieuRDV', $lieuRDV);
        $stmt->execute();
    }

    public static function getFromNumCLi(int $numCli): array
    {
        $stmt = MyPDO::getInstance()->prepare(<<<SQL
                SELECT numCli
                FROM Client
                ORDER BY numCli
            SQL
        );
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public static function getFromNumEmp(int $numEmp): array
    {
        $stmt = MyPDO::getInstance()->prepare(<<<SQL
                SELECT numEmp
                FROM Employe
                ORDER BY numEmp
            SQL
        );
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function modifRDV(int $numRDV, string $typeRDV,Date $dateRDV,string $heureRDV,string $lieuRDV) :void
    {
        $stmt = MyPDO::getInstance()->prepare(<<<SQL
                UPDATE TABLE RendezVous
                SET typeRDV = :typeRDV, 
                    dateRDV = :dateRDV,
                    heureRDV = :heureRDV,
                    lieuRDV = :lieuRDV
                WHERE  numRDV = :numRDV
            SQL
        );
        $stmt->bindValue(':numRDV', $this->numRDV);
        $stmt->bindValue(':typeRDV', $typeRDV);
        $stmt->bindValue(':dateRDV', $dateRDV);
        $stmt->bindValue(':heureRDV', $heureRDV);
        $stmt->bindValue(':lieuRDV', $lieuRDV);
        $stmt->execute();
    }

    public function supprRDV(int $numRDV) :void
    {
        $stmt = MyPDO::getInstance()->prepare(<<<SQL
                DELETE FROM RendezVous
                WHERE numRDV = :numRDV
            SQL
        );
        $stmt->bindValue(':numRDV', $numRDV);
        $stmt->execute();
    }
}