<?php

namespace Main\MainBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Serveur
 *
 * @ORM\Table(name="serveur")
 * @ORM\Entity(repositoryClass="Main\MainBundle\Repository\ServeurRepository")
 */
class Serveur
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
     * @var string
     *
     * @ORM\Column(name="description", type="text")
     */
    private $description;

    /**
     * @ORM\ManyToOne(targetEntity="Main\MainBundle\Entity\Media", cascade={"persist","remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    public $miniature;
    

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
     * @return Serveur
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
     * Set description
     *
     * @param string $description
     *
     * @return Serveur
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
     * Set miniature
     *
     * @param \Main\MainBundle\Entity\Media $miniature
     *
     * @return Serveur
     */
    public function setMiniature(\Main\MainBundle\Entity\Media $miniature)
    {
        $this->miniature = $miniature;

        return $this;
    }

    /**
     * Get miniature
     *
     * @return \Main\MainBundle\Entity\Media
     */
    public function getMiniature()
    {
        return $this->miniature;
    }
}
