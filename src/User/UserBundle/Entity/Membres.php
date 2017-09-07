<?php

namespace User\UserBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Membres
 *
 * @ORM\Table(name="membres_team")
 * @ORM\Entity(repositoryClass="Main\MainBundle\Repository\VideosRepository")
 */
class Membres
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
     * @ORM\ManyToOne(targetEntity="User\UserBundle\Entity\User", cascade={"persist"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $user;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="datetime")
     * @ORM\JoinColumn(nullable=false)
     */
    public $date;

    /**
     * @var string
     *
     * @ORM\Column(name="droit", type="string",length=255)
     * @ORM\JoinColumn(nullable=false)
     */
    public $droit;

    /**
     * @var string
     *
     * @ORM\Column(name="role", type="string", length=255)
     */
    private $role;

    /**
     * @ORM\ManyToOne(targetEntity="User\UserBundle\Entity\Team", cascade={"persist"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $team;



    /**
     * Constructor
     */
    public function __construct()
    {
        $this->expediteur = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set date
     *
     * @param \DateTime $date
     *
     * @return Message
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
     * Set lu
     *
     * @param boolean $lu
     *
     * @return Message
     */
    public function setLu($lu)
    {
        $this->lu = $lu;

        return $this;
    }

    /**
     * Get lu
     *
     * @return boolean
     */
    public function getLu()
    {
        return $this->lu;
    }

    /**
     * Set objet
     *
     * @param string $objet
     *
     * @return Message
     */
    public function setObjet($objet)
    {
        $this->objet = $objet;

        return $this;
    }

    /**
     * Get objet
     *
     * @return string
     */
    public function getObjet()
    {
        return $this->objet;
    }

    /**
     * Set message
     *
     * @param string $message
     *
     * @return Message
     */
    public function setMessage($message)
    {
        $this->message = $message;

        return $this;
    }

    /**
     * Get message
     *
     * @return string
     */
    public function getMessage()
    {
        return $this->message;
    }

    /**
     * Add expediteur
     *
     * @param \User\UserBundle\Entity\User $expediteur
     *
     * @return Message
     */
    public function addExpediteur(\User\UserBundle\Entity\User $expediteur)
    {
        $this->expediteur[] = $expediteur;

        return $this;
    }

    /**
     * Remove expediteur
     *
     * @param \User\UserBundle\Entity\User $expediteur
     */
    public function removeExpediteur(\User\UserBundle\Entity\User $expediteur)
    {
        $this->expediteur->removeElement($expediteur);
    }

    /**
     * Get expediteur
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getExpediteur()
    {
        return $this->expediteur;
    }

    /**
     * Set destinataire
     *
     * @param \User\UserBundle\Entity\User $destinataire
     *
     * @return Message
     */
    public function setDestinataire(\User\UserBundle\Entity\User $destinataire)
    {
        $this->destinataire = $destinataire;

        return $this;
    }

    /**
     * Get destinataire
     *
     * @return \User\UserBundle\Entity\User
     */
    public function getDestinataire()
    {
        return $this->destinataire;
    }

    /**
     * Set expediteur
     *
     * @param \User\UserBundle\Entity\User $expediteur
     *
     * @return Message
     */
    public function setExpediteur(\User\UserBundle\Entity\User $expediteur)
    {
        $this->expediteur = $expediteur;

        return $this;
    }

    /**
     * Set droit
     *
     * @param string $droit
     *
     * @return Membres
     */
    public function setDroit($droit)
    {
        $this->droit = $droit;

        return $this;
    }

    /**
     * Get droit
     *
     * @return string
     */
    public function getDroit()
    {
        return $this->droit;
    }

    /**
     * Set role
     *
     * @param string $role
     *
     * @return Membres
     */
    public function setRole($role)
    {
        $this->role = $role;

        return $this;
    }

    /**
     * Get role
     *
     * @return string
     */
    public function getRole()
    {
        return $this->role;
    }

    /**
     * Set user
     *
     * @param \User\UserBundle\Entity\User $user
     *
     * @return Membres
     */
    public function setUser(\User\UserBundle\Entity\User $user)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return \User\UserBundle\Entity\User
     */
    public function getUser()
    {
        return $this->user;
    }



    /**
     * Set team
     *
     * @param \User\UserBundle\Entity\Team $team
     *
     * @return Membres
     */
    public function setTeam(\User\UserBundle\Entity\Team $team)
    {
        $this->team = $team;

        return $this;
    }

    /**
     * Get team
     *
     * @return \User\UserBundle\Entity\Team
     */
    public function getTeam()
    {
        return $this->team;
    }
}
