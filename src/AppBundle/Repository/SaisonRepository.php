<?php

namespace AppBundle\Repository;

use AppBundle\Entity\Saison;
use Doctrine\ORM\QueryBuilder;

/**
 * SaisonRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class SaisonRepository extends \Doctrine\ORM\EntityRepository
{
    /**
     * @return QueryBuilder
     */
    public function getActiveFirstQueryBuilder() {
        return $this->createQueryBuilder('season')
            ->orderBy('season.running', 'DESC')
            ->addOrderBy('season.name', 'DESC');
    }

    /**
     * @param string $name
     * @return null|Saison
     */
    public function findOneByName($name) {
        return $this->createQueryBuilder('season')
            ->where('season.name LIKE :name')
            ->setParameter('name', $name)
            ->getQuery()
            ->getOneOrNullResult();
    }

    public function findAll()
    {
        return parent::findBy([],['id'=>"desc"]);
    }

    /**
     * @return mixed
     */
    public function getActiveSeason()
    {
        return $this->createQueryBuilder('season')
            ->where('season.running = 1')
            ->getQuery()
            ->getOneOrNullResult();
    }
}
