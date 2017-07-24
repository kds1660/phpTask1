<?php

namespace App\Db;

class StudioActorsModel extends AbstractModel
{
    /**
     * @param null $studio
     * @return array
     */
    public function getResult($studio = null): array
    {
        $sql = <<<SQL
SELECT studios.name as StudioName, count(DISTINCT flm.id_film) as films, count(fs.id_fee) as fees_number, 
sum(fs.fee) as fees_sum, avg(fs.fee) as fees_avg from studios
inner join studio_films sf USING (id_studio)
inner join films flm on (flm.id_film=sf.id_film and flm.year>adddate(curdate(), interval -10 year))
inner join fees fs on (fs.id_film=flm.id_film)
where
studios.name=:studio
GROUP by studios.id_studio
SQL;
        $queryResults = $this->runSqlQuery($sql, $studio);

        return [$sql, $queryResults];
    }
}
