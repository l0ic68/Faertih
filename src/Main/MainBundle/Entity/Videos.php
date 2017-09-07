<?php

namespace Main\MainBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Videos
 *
 * @ORM\Table(name="videos")
 * @ORM\Entity(repositoryClass="Main\MainBundle\Repository\VideosRepository")
 */
class Videos
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
     * @ORM\ManyToOne(targetEntity="Main\MainBundle\Entity\Media", cascade={"persist","remove"})
     * @ORM\JoinColumn(nullable=true)
     */
    public $miniature;

    /**
     * @ORM\ManyToOne(targetEntity="Main\MainBundle\Entity\Media", cascade={"persist","remove"})
     * @ORM\JoinColumn(nullable=true)
     */
    public $banniere;

    /**
     * @var string
     *
     * @ORM\Column(name="Titre", type="string", length=255)
     */
    private $titre;


    /**
     * @ORM\ManyToOne(targetEntity="User\UserBundle\Entity\User", cascade={"persist"})
     * @ORM\JoinColumn(nullable=false)
     */
    public $auteur;

    /**
     * @ORM\ManyToOne(targetEntity="Main\MainBundle\Entity\Categories", cascade={"persist","remove"})
     * @ORM\JoinColumn(nullable=true)
     */
    public $categorie;

    /**
     * @ORM\ManyToOne(targetEntity="Main\MainBundle\Entity\Emission", cascade={"persist"})
     * @ORM\JoinColumn(nullable=true)
     */
    public $emission;

    /**
     * @var string
     *
     * @ORM\Column(name="contenu", type="string", length=255)
     */
    private $contenu;

    /**
     * @var string
     *
     * @ORM\Column(name="type", type="string",length=255)
     */
    private $type;


    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text")
     */
    private $description;

    /**
     * @var int
     *
     * @ORM\Column(name="nbreComs", type="integer")
     */
    private $nombre_commentaire;

    /**
     * @var int
     *
     * @ORM\Column(name="nbreVues", type="integer")
     */
    private $nombre_vues;

    /**
     * @var int
     *
     * @ORM\Column(name="signalement", type="integer")
     */
    private $signalement;

//    /**
//     * @ORM\ManyToOne(targetEntity="Main\MainBundle\Entity\Promoted", cascade={"persist","remove"})
//     * @ORM\JoinColumn(nullable=true)
//     */
//    public $promoted;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_publication", type="datetime")
     */
    private $date_publication;


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
     * @return Videos
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
     * @return Videos
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
     * Set datePublication
     *
     * @param \DateTime $datePublication
     *
     * @return Videos
     */
    public function setDatePublication($datePublication)
    {
        $this->date_publication = $datePublication;

        return $this;
    }

    /**
     * Get datePublication
     *
     * @return \DateTime
     */
    public function getDatePublication()
    {
        return $this->date_publication;
    }

    /**
     * Set contenu
     *
     * @param string $contenu
     *
     * @return Videos
     */
    public function setContenu($contenu)
    {
        $this->contenu = $contenu;

        return $this;
    }

    /**
     * Get contenu
     *
     * @return string
     */
    public function getContenu()
    {
        return $this->contenu;
    }

    /**
     * Set description
     *
     * @param string $description
     *
     * @return Videos
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
     * Set nombreCommentaire
     *
     * @param integer $nombreCommentaire
     *
     * @return Videos
     */
    public function setNombreCommentaire($nombreCommentaire)
    {
        $this->nombre_commentaire = $nombreCommentaire;

        return $this;
    }

    /**
     * Get nombreCommentaire
     *
     * @return integer
     */
    public function getNombreCommentaire()
    {
        return $this->nombre_commentaire;
    }

    /**
     * Set nombreVues
     *
     * @param integer $nombreVues
     *
     * @return Videos
     */
    public function setNombreVues($nombreVues)
    {
        $this->nombre_vues = $nombreVues;

        return $this;
    }

    /**
     * Get nombreVues
     *
     * @return integer
     */
    public function getNombreVues()
    {
        return $this->nombre_vues;
    }

    /**
     * Set signalement
     *
     * @param integer $signalement
     *
     * @return Videos
     */
    public function setSignalement($signalement)
    {
        $this->signalement = $signalement;

        return $this;
    }

    /**
     * Get signalement
     *
     * @return integer
     */
    public function getSignalement()
    {
        return $this->signalement;
    }

    /**
     * Set miniature
     *
     * @param \Main\MainBundle\Entity\Media $miniature
     *
     * @return Videos
     */
    public function setMiniature(\Main\MainBundle\Entity\Media $miniature = null)
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

    /**
     * Set banniere
     *
     * @param \Main\MainBundle\Entity\Media $banniere
     *
     * @return Videos
     */
    public function setBanniere(\Main\MainBundle\Entity\Media $banniere = null)
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
     * Set auteur
     *
     * @param \User\UserBundle\Entity\User $auteur
     *
     * @return Videos
     */
    public function setAuteur(\User\UserBundle\Entity\User $auteur)
    {
        $this->auteur = $auteur;

        return $this;
    }

    /**
     * Get auteur
     *
     * @return \User\UserBundle\Entity\User
     */
    public function getAuteur()
    {
        return $this->auteur;
    }

    /**
     * Set emission
     *
     * @param \Main\MainBundle\Entity\Emission $emission
     *
     * @return Videos
     */
    public function setEmission(\Main\MainBundle\Entity\Emission $emission = null)
    {
        $this->emission = $emission;

        return $this;
    }

    /**
     * Get emission
     *
     * @return \Main\MainBundle\Entity\Emission
     */
    public function getEmission()
    {
        return $this->emission;
    }

    /**
     * Set type
     *
     * @param string $type
     *
     * @return Videos
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get type
     *
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }
}
