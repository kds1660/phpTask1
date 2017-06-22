<?php
$sql[] = <<<sql1
SELECT name ,concat(first_name,' ',last_name) as actor, count(id_film) as films from studios
left join studio_films USING (id_studio)
left join fees USING (id_film)
left join actors USING (id_actor)
where studios.name="$studio"
GROUP by actors.id_actor
sql1;
$sql[] = <<<sql1
SELECT studios.name as StudioName, count(DISTINCT flm.id_film) as films, count(DISTINCT fs.id_fee) as fees_number, sum(fs.fee) as fees_sum, avg(fs.fee) as fees_avg from studios
inner join studio_films sf USING (id_studio)
inner join films flm on (flm.id_film=sf.id_film and flm.year>adddate(curdate(), interval -10 year))
inner join fees fs on (fs.id_film=flm.id_film)
where
studios.name="$studio"
GROUP by StudioName
sql1;
