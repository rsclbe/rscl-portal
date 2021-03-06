<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Player
 *
 * @ORM\Table(name="player")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\PlayerRepository")
 */
class Player
{
    
    const TYPE_KEEPER = 1;
    const TYPE_DEFENDER = 2;
    const TYPE_MIDFIELDER = 3;
    const TYPE_SCORER = 4;
    
    const TYPE_CHOICES = ['Gardien'=>self::TYPE_KEEPER,'Defenseur'=>self::TYPE_DEFENDER,'Milieu'=>self::TYPE_MIDFIELDER,'Attaquant'=>self::TYPE_SCORER];
    
    use MigrableTrait;
    use HasPicture;
    use HasNationality;
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="firstName", type="string", length=64)
     */
    private $firstName;

    /**
     * @var string
     *
     * @ORM\Column(name="lastName", type="string", length=64)
     */
    private $lastName;

    /**
     * @var string
     *
     * @ORM\Column(name="nickName", type="string", length=255, nullable=true)
     */
    private $nickName;

    /**
     * @var int
     *
     * @ORM\Column(name="number", type="integer", nullable=true)
     */
    private $number;

    /**
     * @var bool
     *
     * @ORM\Column(name="active", type="boolean", nullable=true)
     */
    private $active;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="birthDate", type="date", nullable=true)
     */
    private $birthDate;

    /**
     * @var string
     *
     * @ORM\Column(name="contract", type="string", length=32, nullable=true)
     */
    private $contract;

    /**
     * @var float
     *
     * @ORM\Column(name="weight", type="float", nullable=true)
     */
    private $weight;

    /**
     * @var float
     *
     * @ORM\Column(name="height", type="float", nullable=true)
     */
    private $height;

    /**
     * @var string
     *
     * @ORM\Column(name="position", type="string", length=64, nullable=true)
     */
    private $position;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text", nullable=true)
     */
    private $description;

    /**
     * @var Saison
     * @ORM\ManyToMany(targetEntity="Saison",inversedBy="players")
     */
    private $seasons;

    /**
     * @var int
     * @ORM\Column(type="smallint")
     */
    private $type;

    /**
     * @var Team
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Team")
     */
    private $team;

    /**
     * @var string
     * @ORM\Column(type="string",length=255, nullable=true)
     */
    private $teamName;

    /**
     * @var Roster
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Roster")
     */
    private $roster;

    /**
     * @var boolean
     * @ORM\Column(name="on_loan", type="boolean", nullable=true)
     */
    private $onLoan;

    /**
     * @var string
     * @ORM\Column(name="topic", type="string", nullable=true)
     */
    private $topic;

    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set firstName
     *
     * @param string $firstName
     *
     * @return Player
     */
    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;

        return $this;
    }

    /**
     * Get firstName
     *
     * @return string
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * Set lastName
     *
     * @param string $lastName
     *
     * @return Player
     */
    public function setLastName($lastName)
    {
        $this->lastName = $lastName;

        return $this;
    }

    /**
     * Get lastName
     *
     * @return string
     */
    public function getLastName()
    {
        return $this->lastName;
    }
    
    public function __toString()
    {
        return $this->nickName ?: $this->firstName.' '.$this->lastName;
    }
    
    public function getFullName(){
        return $this->__toString();
    }

    /**
     * Set number
     *
     * @param integer $number
     *
     * @return Player
     */
    public function setNumber($number)
    {
        $this->number = $number;

        return $this;
    }

    /**
     * Get number
     *
     * @return int
     */
    public function getNumber()
    {
        return $this->number;
    }

    /**
     * Set active
     *
     * @param boolean $active
     *
     * @return Player
     */
    public function setActive($active)
    {
        $this->active = $active;

        return $this;
    }

    /**
     * Get active
     *
     * @return bool
     */
    public function getActive()
    {
        return $this->active;
    }

    

    /**
     * Set contract
     *
     * @param string $contract
     *
     * @return Player
     */
    public function setContract($contract)
    {
        $this->contract = $contract;

        return $this;
    }

    /**
     * Get contract
     *
     * @return string
     */
    public function getContract()
    {
        return $this->contract;
    }

    /**
     * Set weight
     *
     * @param float $weight
     *
     * @return Player
     */
    public function setWeight($weight)
    {
        $this->weight = $weight;

        return $this;
    }

    /**
     * Get weight
     *
     * @return float
     */
    public function getWeight()
    {
        return $this->weight;
    }

    /**
     * Set height
     *
     * @param float $height
     *
     * @return Player
     */
    public function setHeight($height)
    {
        $this->height = $height;

        return $this;
    }

    /**
     * Get height
     *
     * @return float
     */
    public function getHeight()
    {
        return $this->height;
    }

    /**
     * Set position
     *
     * @param string $position
     *
     * @return Player
     */
    public function setPosition($position)
    {
        $this->position = $position;

        return $this;
    }

    /**
     * Get position
     *
     * @return string
     */
    public function getPosition()
    {
        return $this->position;
    }

    /**
     * Set description
     *
     * @param string $description
     *
     * @return Player
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->seasons = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Set birthDate
     *
     * @param \DateTime $birthDate
     *
     * @return Player
     */
    public function setBirthDate($birthDate)
    {
        $this->birthDate = $birthDate;

        return $this;
    }

    /**
     * Get birthDate
     *
     * @return \DateTime
     */
    public function getBirthDate()
    {
        return $this->birthDate;
    }

    /**
     * Add season
     *
     * @param \AppBundle\Entity\Saison $season
     *
     * @return Player
     */
    public function addSeason(\AppBundle\Entity\Saison $season)
    {
        $this->seasons[] = $season;

        return $this;
    }

    /**
     * Remove season
     *
     * @param \AppBundle\Entity\Saison $season
     */
    public function removeSeason(\AppBundle\Entity\Saison $season)
    {
        $this->seasons->removeElement($season);
    }

    /**
     * Get seasons
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getSeasons()
    {
        return $this->seasons;
    }



    /**
     * Set type
     *
     * @param integer $type
     *
     * @return Player
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get type
     *
     * @return integer
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set team
     *
     * @param \AppBundle\Entity\Team $team
     *
     * @return Player
     */
    public function setTeam(\AppBundle\Entity\Team $team = null)
    {
        $this->team = $team;

        return $this;
    }

    /**
     * Get team
     *
     * @return \AppBundle\Entity\Team
     */
    public function getTeam()
    {
        return $this->team;
    }

    /**
     * Set teamName
     *
     * @param string $teamName
     *
     * @return Player
     */
    public function setTeamName($teamName)
    {
        $this->teamName = $teamName;

        return $this;
    }

    /**
     * Get teamName
     *
     * @return string
     */
    public function getTeamName()
    {
        return $this->teamName;
    }

    /**
     * Set roster
     *
     * @param Roster $roster
     *
     * @return Player
     */
    public function setRoster(Roster $roster = null)
    {
        $this->roster = $roster;

        return $this;
    }

    /**
     * Get roster
     *
     * @return Roster
     */
    public function getRoster()
    {
        return $this->roster;
    }

    /**
     * @param string $nickName
     */
    public function setNickName($nickName)
    {
        $this->nickName = $nickName;
    }

    /**
     * @return string
     */
    public function getNickName()
    {
        return $this->nickName;
    }

    /**
     * @param boolean $onLoan
     * @return Player
     */
    public function setOnLoan($onLoan)
    {
        $this->onLoan = $onLoan;

        return $this;
    }

    /**
     * @return bool
     */
    public function isOnLoan()
    {
        return $this->onLoan ? true : false;
    }

    /**
     * @param string $topic
     * @return Player
     */
    public function setTopic(string $topic)
    {
        $this->topic = $topic;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getTopic()
    {
        return $this->topic;
    }
}
