<?php

namespace App\Db;

class UniqueNameModel extends AbstractModel
{
    /**
     * @return array
     */
    public function getResult(): array
    {
        $sql = <<<SQL
SELECT concat(a1.first_name,' ',a1.last_name) as full_name FROM actors a1
left join actors a2 on (a1.last_name=a2.last_name AND a1.id_actor<>a2.id_actor)
where a2.id_actor is null
SQL;
        $queryResults = $this->runSqlQuery($sql);

        return [$sql, $queryResults];
    }
}