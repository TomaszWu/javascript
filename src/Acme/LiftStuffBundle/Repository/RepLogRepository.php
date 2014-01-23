<?php

namespace Acme\LiftStuffBundle\Repository;

use Doctrine\ORM\EntityRepository;

/**
 * RepLogRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class RepLogRepository extends EntityRepository
{
    public function getLeaderboardDetails()
    {
        return $this->createQueryBuilder('rl')
            ->select('IDENTITY(rl.user) as user_id, SUM(rl.totalWeightLifted) as weightSum')
            ->groupBy('rl.user')
            ->orderBy('weightSum', 'DESC')
            ->getQuery()
            ->execute()
        ;
    }
}