<?php

namespace Main\MainBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Emission
 *
 * @ORM\Table(name="emission")
 * @ORM\Entity(repositoryClass="Main\MainBundle\Repository\EmissionRepository")
 */
class Emission
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
     * @ORM\Column(name="Titre", type="string", length=255)
     */
    private $titre;

    /**
     * @ORM\ManyToOne(targetEntity="Main\MainBundle\Entity\Categories", cascade={"persist","remove"})
     * @ORM\JoinColumn(nullable=true)
     */
    public $categorie;

    /**
     * @ORM\ManyToOne(targetEntity="Main\MainBundle\Entity\Emission", cascade={"persist","remove"})
     * @ORM\JoinColumn(nullable=true)
     */
    public $dossier;


//    /**
//     * @ORM\ManyToOne(targetEntity="Main\MainBundle\Entity\Promoted", cascade={"persist","remove"})
//     * @ORM\JoinColumn(nullable=true)
//     */
//    public $promoted;


    /**
     * @ORM\ManyToOne(targetEntity="User\UserBundle\Entity\User", cascade={"persist"})
     * @ORM\JoinColumn(nullable=false)
     */
    public $auteur;


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
     * Set titre
     *
     * @param string $titre
     *
     * @return Emission
     */
    public function setTitre($titre)
    {
        $this->titre = $titre;

        return $this;
    }

    /**
     * Get titre
     *
     * @return string
     */
    public function getTitre()
    {
        return $this->titre;
    }

    /**
     * Set categorie
     *
     * @param \Main\MainBundle\Entity\Categories $categorie
     *
     * @return Emission
     */
    public function setCategorie(\Main\MainBundle\Entity\Categories $categorie = null)
    {
        $this->categorie = $categorie;

        return $this;
    }

    /**
     * Get categorie
     *
     * @return \Main\MainBundle\Entity\Categories
     */
    public function getCategorie()
    {
        return $this->categorie;
    }



    /**
     * Set auteur
     *
     * @param \User\USerBundle\Entity\User $auteur
     *
     * @return Emission
     */
    public function setAuteur(\User\USerBundle\Entity\User $auteur)
    {
        $this->auteur = $auteur;

        return $this;
    }

    /**
     * Get auteur
     *
     * @return \User\USerBundle\Entity\User
     */
    public function getAuteur()
    {
        return $this->auteur;
    }

    /**
     * Set dossier
     *
     * @param \Main\MainBundle\Entity\Emission $dossier
     *
     * @return Emission
     */
    public function setEmission(\Main\MainBundle\Entity\Emission $dossier = null)
    {
        $this->dossier = $dossier;

        return $this;
    }

    /**
     * Get dossier
     *
     * @return \Main\MainBundle\Entity\Emission
     */
    public function getEmission()
    {
        return $this->dossier;
    }

    /**
     * Set dossier
     *
     * @param \Main\MainBundle\Entity\Emission $dossier
     *
     * @return Emission
     */
    public function setDossier(\Main\MainBundle\Entity\Emission $dossier = null)
    {
        $this->dossier = $dossier;

        return $this;
    }

    /**
     * Get dossier
     *
     * @return \Main\MainBundle\Entity\Emission
     */
    public function getDossier()
    {
        return $this->dossier;
    }
}
