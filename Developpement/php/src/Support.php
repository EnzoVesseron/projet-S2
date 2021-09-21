<?php
declare(strict_types=1);

class Support
{
    public function createFromId(int $numTicket): Support
    {
        $stmt = MyPDO::getInstance()->prepare(<<<SQL
                SELECT *
                FROM Support
                WHERE numTicket = :numTicket
            SQL
        );
        $stmt->bindValue(':numTicket', $numTicket);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_CLASS, Support::class);
        if (($ligne = $stmt->fetch()) == false)
            throw new InvalidArgumentException("Le support n'a pas été trouvé dans la base de donnée");
        return $ligne;
    }

    public static function ajouterSupport(int $numTicket,string $sujet,Date $dateSupport,string $heureSupport) :void
    {
        $stmt = MyPDO::getInstance()->prepare(<<<SQL
                INSERT INTO RendezVous
                VALUES (:numTicket, :sujet, :dateSupport, :heureSupport)
            SQL
        );
        $stmt->bindValue(':numTicket', $numTicket);
        $stmt->bindValue(':sujet', $sujet);
        $stmt->bindValue(':dateSupport', $dateSupport);
        $stmt->bindValue(':heureSupport', $heureSupport);
        $stmt->execute();
    }

    public static function getFromNumCli(int $numCli): array
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
}

