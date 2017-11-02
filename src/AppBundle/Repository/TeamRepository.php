<?php

namespace AppBundle\Repository;

use AppBundle\Entity\Team;

/**
 * TeamRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class TeamRepository extends \Doctrine\ORM\EntityRepository
{
    /**
     * @param string $name
     * @return null|Team
     */
    public function findOneByName($name)
    {
        return $this->createQueryBuilder('team')
            ->where('team.name LIKE :name')
            ->setParameter('name', $name)
            ->getQuery()
            ->getOneOrNullResult();
    }

    /**
     * @return string[]
     */
    public function getProLeagueATeams()
    {
        $proLeagueA = $this->getEntityManager()->getRepository('AppBundle:Competition')->getProLeagueA();
        $activeSeason = $this->getEntityManager()->getRepository('AppBundle:Saison')->getActiveSeason();

        $qb = $this->createQueryBuilder('team');
        return $qb
            ->leftJoin('team.competitionsParticipations','team_competition')
            ->where('team_competition.competition = :competition')
            ->andWhere('team_competition.season = :season')
            ->setParameter('competition', $proLeagueA)
            ->setParameter('season', $activeSeason)
            ->getQuery()
            ->getResult();
    }

    public function getProLeagueATeamsForFormType(){
        return array_map(function(Team $team){return $team->getId();},$this->getProLeagueATeams());
        
    }
}
