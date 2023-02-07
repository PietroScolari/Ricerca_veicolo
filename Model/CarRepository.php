<?php

namespace Model;
use Util\Connection;

class CarRepository{

    public static function get_all(array $a): array{
        $targa = $a['targa'];
        $marca = $a['marca'];
        $modello = $a['modello'];
        $colore = $a['colore'];
        $pdo = Connection::getInstance();
        $sql = 'SELECT * FROM veicolo WHERE targa like :targa AND marca like :marca AND modello like :modello AND colore like :colore';
        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            'targa' => "%". $targa ."%",
            'marca' => "%". $marca ."%",
            'modello' => "%". $modello ."%",
            'colore' => "%". $colore ."%"
        ]);
        return $stmt->fetchAll();
    }

    public static function get_marche(): array{
        $pdo = Connection::getInstance();
        $sql = 'SELECT DISTINCT marca from veicolo order by marca';
        $stmt = $pdo->query($sql);

        return $stmt->fetchAll();
    }

    public static function get_colori(): array{
        $pdo = Connection::getInstance();
        $sql = 'SELECT DISTINCT colore from veicolo order by colore';
        $stmt = $pdo->query($sql);
        return $stmt->fetchAll();
    }

    public static function completa(int $id): bool{
        $pdo = Connection::getInstance();
        $sql = 'UPDATE todo SET completato = 1 WHERE id = :id';
        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            'id' => $id
        ]);
        if ($stmt->rowCount() == 1)
            return true;
        return false;
    }

    public static function getTesto(int $id): string{
        $pdo = Connection::getInstance();
        $sql = 'SELECT testo FROM todo WHERE id = :id';
        $stmt = $pdo->prepare($sql);
        $stmt->execute([
                'id' => $id
            ]
        );
        $row = $stmt->fetch();
        return $row['testo'];
    }


    public static function updateTesto(string $testo, int $id): bool{
        $pdo = Connection::getInstance();
        $sql = 'UPDATE todo SET testo = :testo WHERE id = :id';
        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            'testo' => $testo,
            'id' => $id
        ]);
        if ($stmt->rowCount() == 1)
            return true;
        return false;
    }

    public static function delete(int $id):bool
    {
        $pdo = Connection::getInstance();
        $sql = 'DELETE FROM todo WHERE id = :id';
        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            'id' => $id
        ]);
        if ($stmt->rowCount() == 1)
            return true;
        return false;
    }
}