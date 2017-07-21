<?php

namespace App\Db;

Abstract class AbstractModel
{
    /**
     * @return array
     */

    public function getAmountOfFeesFrom40To60(): array
    {
    }

    public function getUniqueLastName(): array
    {
    }

    public function getStudioFilms($studio=null): array
    {
    }

    public function getStudioActors($studio=null): array
    {
    }

    public function getStudios(): array
    {
        $sql = 'select name from studios';
        $queryResults = $this->runSqlQuery($sql,'');
        return $queryResults;
    }

    protected function runSqlQuery($sql, $studio = null)
    {
        $queryResults=[];
        $pdo = $this->getConnection();
        if ($studio===null) {
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

    /*public function page2($studio)
    {
        include ROOT . '/app/include/requestText2.php';

        $listQuery=[];
        $db = Db\DbConnect::getInstance();
        foreach ($sql as $sql) {
            Log\Logger::log('AbstractModel::page2, request: '.$sql."\n".'studio: '.$studio);
            $req = $db->prepare($sql);
            $req->execute(array('studio' => $studio));

            $list = [];
            foreach ($req->fetchAll(\PDO::FETCH_ASSOC) as $result) {
                $list[] = new RequestResult($result);
            }
            $listQuery[] = array($sql, $list);
        }
        return $listQuery;
    }*/

    /**
     * @return \PDO
     */

}
