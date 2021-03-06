<?php

namespace AppBundle\Repository;

use AppBundle\Entity\Player;

/**
 * PlayerVoteRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class PlayerVoteRepository extends \Doctrine\ORM\EntityRepository
{
    public function findByPlayer(Player $player)
    {
        $qb = $this->createQueryBuilder('player_vote');

        $qb->where('player_vote.player = :player')
            ->setParameter('player', $player);

        return $qb->getQuery()->getResult();
    }
}
