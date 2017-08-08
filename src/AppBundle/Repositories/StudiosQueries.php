<?php

namespace AppBundle\Repositories;

use AppBundle\Entity\Actors;
use AppBundle\Entity\Fees;
use AppBundle\Entity\Films;
use AppBundle\Entity\Studios;
use Doctrine\ORM\EntityRepository;

class StudiosQueries extends EntityRepository
{
    /**
     * @param string $studio
     * @return array
     */
    public function studioActors($studio = ''):array
    {
        $query = $this->createQueryBuilder('s')
            ->select('s.name as StudioName, count(DISTINCT flm.idFilm) as films, count(fs.idFee) as fees_number,
sum(fs.fee) as fees_sum, avg(fs.fee) as fees_avg')
            ->innerJoin('s.idFilm', 'sf')
            ->innerJoin(Films::class, 'flm', 'WITH', 'flm.idFilm=sf.idFilm and flm.year>:date')
            ->innerJoin(Fees::class, 'fs', 'WITH', 'fs.idFilm=flm.idFilm')
            ->where('s.name=:studio')
            ->setParameters(array(
                'date' => new \DateTime('-10 years'),
                'studio' => $studio
            ))
            ->groupBy('s.idStudio')
            ->getQuery();
        return [$query->getSQL(), $query->getResult()];
    }

    /**
     * @param string $studio
     * @return array
     */
    public function studioFilms($studio = ''):array
    {
        $query = $this->createQueryBuilder('s')
            ->select('s.name ,concat(a.firstName,\' \',a.lastName) as actor, count(fs.idFilm) as films')
            ->leftJoin('s.idFilm', 'sf')
            ->leftJoin(Fees::class, 'fs', 'WITH', 'fs.idFilm=sf.idFilm')
            ->leftJoin(Actors::class, 'a', 'WITH', 'fs.idActor=a.idActor')
            ->where('s.name=:studio')
            ->setParameters(array(
                'studio' => $studio
            ))
            ->groupBy('a.idActor')
            ->getQuery();
        return [$query->getSQL(), $query->getResult()];
    }

    public function selectStudios():array
    {
        $query = $this->createQueryBuilder('s')
            ->select('s.name')
            ->getQuery();
        return $query->getResult();
    }
}
