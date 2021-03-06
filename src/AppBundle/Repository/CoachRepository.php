<?php

namespace AppBundle\Repository;
use Doctrine\ORM\QueryBuilder;

/**
 * CoachRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class CoachRepository extends \Doctrine\ORM\EntityRepository
{
    /**
     * @return QueryBuilder
     */
    function getActiveFirstQueryBuilder() {
        return $this->createQueryBuilder('coach')
            ->orderBy('coach.id', 'DESC');
    }
}
