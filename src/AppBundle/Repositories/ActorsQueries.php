<?php

namespace AppBundle\Repositories;

use AppBundle\Entity\Actors;
use Doctrine\ORM\EntityRepository;

class ActorsQueries extends EntityRepository
{
    /**
     * @return \Doctrine\ORM\Query
     */
    public function getAmountOfFeesFrom40To60Query()
    {
        $query = $this->createQueryBuilder('a')
            ->select("CONCAT(a.firstName,' ',a.lastName) as full_name, sum(f.fee) as amount_of_fees")
            ->leftJoin('a.actorFees', 'f')
            ->where('a.dob between :date1 and :date2')
            ->setParameters(array(
                'date1' => new \DateTime('-60 years'),
                'date2' => new \DateTime('-40 years')))
            ->groupBy('a.idActor');
        return $query->getQuery();
    }

    /**
     * @return array
     */
    public function amountOfFeesFrom40To60(): array
    {
        return $this->getAmountOfFeesFrom40To60Query()->getResult();
    }

    /**
     * @return \Doctrine\ORM\Query
     */
    public function getUniqueNameQuery()
    {
        $query = $this->createQueryBuilder('a1')
            ->select('concat(a1.firstName,\' \',a1.lastName) as full_name')
            ->leftJoin(Actors::class, 'a2', 'WITH', 'a1.lastName=a2.lastName AND a1.idActor<>a2.idActor')
            ->where('a2.idActor is null');
        return $query->getQuery();
    }

    /**
     * @return array
     */
    public function uniqueName(): array
    {
        return $this->getUniqueNameQuery()->getResult();
    }
}
