<?php

namespace AppBundle\Repositories;

use AppBundle\Entity\Actors;
use AppBundle\Entity\Fees;
use AppBundle\Entity\Films;
use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\Query;

class StudiosQueries extends EntityRepository
{
    /**
     * @return \Doctrine\ORM\Query
     */
    public function getStudioFilmsQuery(): Query
    {
        $query = $this->createQueryBuilder('s')
            ->select('s.name as StudioName, count(DISTINCT flm.idFilm) as films, count(fs.idFee) as fees_number,
sum(fs.fee) as fees_sum, avg(fs.fee) as fees_avg')
            ->innerJoin('s.idFilm', 'sf')
            ->innerJoin(Films::class, 'flm', 'WITH', 'flm.idFilm=sf.idFilm and flm.year>:date')
            ->innerJoin(Fees::class, 'fs', 'WITH', 'fs.idFilm=flm.idFilm')
            ->where('s.name=:studio')
            ->setParameters(array(
                'date' => new \DateTime('-10 years')
            ))
            ->groupBy('s.idStudio');
        return $query->getQuery();
    }

    /**
     * @param string $studio
     * @return array
     */
    public function studioFilms($studio = ''): array
    {
        $result = $this->getStudioFilmsQuery()->setParameter('studio', $studio);
        return $result->getResult();
    }

    /**
     * @return \Doctrine\ORM\Query
     */
    public function getStudioActorsQuery(): Query
    {
        $query = $this->createQueryBuilder('s')
            ->select('s.name ,concat(a.firstName,\' \',a.lastName) as actor, count(fs.idFilm) as films')
            ->leftJoin('s.idFilm', 'sf')
            ->leftJoin(Fees::class, 'fs', 'WITH', 'fs.idFilm=sf.idFilm')
            ->leftJoin(Actors::class, 'a', 'WITH', 'fs.idActor=a.idActor')
            ->where('s.name=:studio')
            ->groupBy('a.idActor');
        return $query->getQuery();
    }

    /**
     * @param string $studio
     * @return array
     */
    public function studioActors($studio = ''): array
    {
        $result = $this->getStudioActorsQuery()->setParameter('studio', $studio);
        return $result->getResult();
    }

    public function selectStudios(): array
    {
        $query = $this->createQueryBuilder('s')
            ->select('s.name')
            ->getQuery();
        return $query->getResult();
    }
}
