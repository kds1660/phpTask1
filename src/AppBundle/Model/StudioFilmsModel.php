<?php

namespace AppBundle\Model;

class StudioFilmsModel extends AbstractModel
{
    protected $sql = <<<SQL
SELECT name ,concat(first_name,' ',last_name) as actor, count(id_film) as films from studios
left join studio_films USING (id_studio)
left join fees USING (id_film)
left join actors USING (id_actor)
where studios.name=:studio
GROUP by actors.id_actor
SQL;
}
