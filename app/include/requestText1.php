<?php
$sql[] = <<<sql1
SELECT concat(first_name,' ',last_name) as full_name, sum(fee) as amount_of_fees FROM actors
left join fees using(id_actor)
WHERE (`dob` between adddate(curdate(), interval -60 year) and adddate(curdate(), interval -40 year))  group by actors.id_actor;
sql1;
$sql[] = <<<sql1
SELECT concat(a1.first_name,' ',a1.last_name) as full_name FROM actors a1
left join actors a2 on (a1.last_name=a2.last_name AND a1.id_actor<>a2.id_actor)
where a2.id_actor is null
sql1;
