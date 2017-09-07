<?php

namespace User\UserBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Team
 *
 * @ORM\Table(name="team")
 * @ORM\Entity(repositoryClass="Main\MainBundle\Repository\VideosRepository")
 */
class Team
{
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
     * @ORM\Column(name="nom", type="string", length=255)
     */
    private $nom;

    /**
     * @ORM\ManyToOne(targetEntity="Main\MainBundle\Entity\Media", cascade={"persist"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $banniere;

    /**
     * @ORM\ManyToOne(targetEntity="Main\MainBundle\Entity\Media", cascade={"persist"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $logo_team;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_creation", type="datetime")
     * @ORM\JoinColumn(nullable=false)
     */
    public $date;

//    /**
//     * @ORM\ManyToMany(targetEntity="User\UserBundle\Entity\Membres", cascade={"persist"})
//     * @ORM\JoinColumn(nullable=false)
//     */
//    private $membres;

    /**
     * @ORM\OneToOne(targetEntity="User\UserBundle\Entity\Reseau", cascade={"persist"})
     * @ORM\JoinColumn(nullable=true)
     */
    public $social;

    /**
     * @var string
     *
     * @ORM\Column(name="message", type="text")
     */
    private $description;

    /**
     * @ORM\ManyToMany(targetEntity="Main\MainBundle\Entity\Serveur", cascade={"persist"})
     * @ORM\JoinColumn(nullable=true)
     */
    private $serveur ;


   
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->membres = new \Doctrine\Common\Collections\ArrayCollection();
        $this->serveur = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set nom
     *
     * @param string $nom
     *
     * @return Team
     */
    public function setNom($nom)
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * Get nom
     *
     * @return string
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * Set date
     *
     * @param \DateTime $date
     *
     * @return Team
     */
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }

    /**
     * Get date
     *
     * @return \DateTime
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Set description
     *
     * @param string $description
     *
     * @return Team
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
     * Set banniere
     *
     * @param \Main\MainBundle\Entity\Media $banniere
     *
     * @return Team
     */
    public function setBanniere(\Main\MainBundle\Entity\Media $banniere)
    {
        $this->banniere = $banniere;

        return $this;
    }

    /**
     * Get banniere
     *
     * @return \Main\MainBundle\Entity\Media
     */
    public function getBanniere()
    {
        return $this->banniere;
    }

    /**
     * Set logoTeam
     *
     * @param \Main\MainBundle\Entity\Media $logoTeam
     *
     * @return Team
     */
    public function setLogoTeam(\Main\MainBundle\Entity\Media $logoTeam)
    {
        $this->logo_team = $logoTeam;

        return $this;
    }

    /**
     * Get logoTeam
     *
     * @return \Main\MainBundle\Entity\Media
     */
    public function getLogoTeam()
    {
        return $this->logo_team;
    }

//    /**
//     * Add membre
//     *
//     * @param \User\UserBundle\Entity\Membres $membre
//     *
//     * @return Team
//     */
//    public function addMembre(\User\UserBundle\Entity\Membres $membre)
//    {
//        $this->membres[] = $membre;
//
//        return $this;
//    }
//
//    /**
//     * Remove membre
//     *
//     * @param \User\UserBundle\Entity\Membres $membre
//     */
//    public function removeMembre(\User\UserBundle\Entity\Membres $membre)
//    {
//        $this->membres->removeElement($membre);
//    }
//
//    /**
//     * Get membres
//     *
//     * @return \Doctrine\Common\Collections\Collection
//     */
//    public function getMembres()
//    {
//        return $this->membres;
//    }

    /**
     * Set social
     *
     * @param \User\UserBundle\Entity\Reseau $social
     *
     * @return Team
     */
    public function setSocial(\User\UserBundle\Entity\Reseau $social = null)
    {
        $this->social = $social;

        return $this;
    }

    /**
     * Get social
     *
     * @return \User\UserBundle\Entity\Reseau
     */
    public function getSocial()
    {
        return $this->social;
    }

    /**
     * Add serveur
     *
     * @param \Main\MainBundle\Entity\Serveur $serveur
     *
     * @return Team
     */
    public function addServeur(\Main\MainBundle\Entity\Serveur $serveur)
    {
        $this->serveur[] = $serveur;

        return $this;
    }

    /**
     * Remove serveur
     *
     * @param \Main\MainBundle\Entity\Serveur $serveur
     */
    public function removeServeur(\Main\MainBundle\Entity\Serveur $serveur)
    {
        $this->serveur->removeElement($serveur);
    }

    /**
     * Get serveur
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getServeur()
    {
        return $this->serveur;
    }
}
