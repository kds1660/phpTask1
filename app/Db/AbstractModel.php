<?php

namespace App\Db;

abstract class AbstractModel
{
    /**
     * @return array
     */

    public function getResult(): array
    {
        return [];
    }

    protected function runSqlQuery($sql, $studio = null): array
    {
        $queryResults = [];
        $pdo = $this->getConnection();
        if ($studio === null) {
            $stmt = $pdo->query($sql);
        } else {
            $stmt = $pdo->prepare($sql);
            $stmt->execute(array('studio' => $studio));
        }

        foreach ($stmt->fetchAll(\PDO::FETCH_ASSOC) as $row) {
            $queryResults[] = $row;
        }
        return $queryResults;
    }


    private function getConnection(): \PDO
    {
        return Connection::getInstance();
    }
}
