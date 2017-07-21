<?php

namespace App\Db;

class AmountFeesModel extends AbstractModel
{
    public function getAmountOfFeesFrom40To60(): array
    {
        $sql = <<<SQL
SELECT concat(first_name,' ',last_name) as full_name, sum(fee) as amount_of_fees FROM actors
left join fees using(id_actor)
WHERE (`dob` between adddate(curdate(), interval -60 year) and adddate(curdate(), interval -40 year))  
group by actors.id_actor;
SQL;

        $queryResults = $this->runSqlQuery($sql);

        return [$sql, $queryResults];
    }

}
