<?php

namespace App\Db;

class StudioFilmModel extends AbstractModel
{
    /**
     * @return array
     */

    public function getStudioFilms($studio=null): array
    {
        $sql = <<<SQL
SELECT name ,concat(first_name,' ',last_name) as actor, count(id_film) as films from studios
left join studio_films USING (id_studio)
left join fees USING (id_film)
left join actors USING (id_actor)
where studios.name=:studio
GROUP by actors.id_actor
SQL;
        $queryResults = $this->runSqlQuery($sql, $studio);

        return [$sql, $queryResults];
    }
}
