<?php

namespace App\Db;

class Model
{
    /**
     * @return array
     */
    public function getAmountOfFeesFrom40To60(): array
    {
        $sql = <<<SQL
SELECT concat(first_name,' ',last_name) as full_name, sum(fee) as amount_of_fees FROM actors
left join fees using(id_actor)
WHERE (`dob` between adddate(curdate(), interval -60 year) and adddate(curdate(), interval -40 year))  
group by actors.id_actor;
SQL;

//        $sql[] = <<<SQL
//SELECT concat(a1.first_name,' ',a1.last_name) as full_name FROM actors a1
//left join actors a2 on (a1.last_name=a2.last_name AND a1.id_actor<>a2.id_actor)
//where a2.id_actor is null
//SQL;
        $pdo = $this->getConnection();

        $stmt = $pdo->query($sql);
        $queryResults = [];

        foreach ($stmt->fetchAll(\PDO::FETCH_ASSOC) as $row) {
            $queryResults[] = $row;
        }

        return [$sql, $queryResults];
    }

    public function page2($studio)
    {
        include ROOT . '/app/include/requestText2.php';

        $listQuery=[];
        $db = Db\DbConnect::getInstance();
        foreach ($sql as $sql) {
            Log\Logger::log('Model::page2, request: '.$sql."\n".'studio: '.$studio);
            $req = $db->prepare($sql);
            $req->execute(array('studio' => $studio));

            $list = [];
            foreach ($req->fetchAll(\PDO::FETCH_ASSOC) as $result) {
                $list[] = new RequestResult($result);
            }
            $listQuery[] = array($sql, $list);
        }
        return $listQuery;
    }

    /**
     * @return \PDO
     */
    private function getConnection(): \PDO
    {
        return Connection::getInstance();
    }
}
