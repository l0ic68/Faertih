<?php

namespace User\UserBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Message
 *
 * @ORM\Table(name="messages")
 * @ORM\Entity(repositoryClass="Main\MainBundle\Repository\VideosRepository")
 */
class Message
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
    private $expediteur;

    /**
     * @ORM\ManyToOne(targetEntity="User\UserBundle\Entity\User", cascade={"persist"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $destinataire;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="datetime")
     * @ORM\JoinColumn(nullable=false)
     */
    public $date;

    /**
     * @var boolean
     *
     * @ORM\Column(name="lu", type="boolean")
     * @ORM\JoinColumn(nullable=false)
     */
    public $lu;

    /**
     * @var string
     *
     * @ORM\Column(name="objet", type="string", length=255)
     */
    private $objet;

    /**
     * @var string
     *
     * @ORM\Column(name="message", type="string", length=255)
     */
    private $message;


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
}
