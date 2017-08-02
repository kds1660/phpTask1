<?php

namespace AppBundle\Model;

class UniqueNameModel extends AbstractModel
{
    protected $sql = <<<SQL
SELECT concat(a1.first_name,' ',a1.last_name) as full_name FROM actors a1
left join actors a2 on (a1.last_name=a2.last_name AND a1.id_actor<>a2.id_actor)
where a2.id_actor is null
SQL;
}