<?php

namespace Main\MainBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Articles
 *
 * @ORM\Table(name="articles")
 * @ORM\Entity(repositoryClass="Main\MainBundle\Repository\ArticlesRepository")
 */
class Articles
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
     * @var string
     *
     * @ORM\Column(name="contenu", type="text")
     */
    private $contenu;

    /**
     * @ORM\ManyToOne(targetEntity="Main\MainBundle\Entity\Categories", cascade={"persist","remove"})
     * @ORM\JoinColumn(nullable=true)
     */
    public $categorie;

    /**
     * @ORM\ManyToOne(targetEntity="Main\MainBundle\Entity\Format", cascade={"persist"})
     * @ORM\JoinColumn(nullable=false)
     */
    public $format;

    /**
     * @ORM\ManyToOne(targetEntity="Main\MainBundle\Entity\Dossier", cascade={"persist","remove"})
     * @ORM\JoinColumn(nullable=true)
     */
    public $dossier;

    /**
     * @ORM\ManyToMany(targetEntity="User\UserBundle\Entity\User", cascade={"persist"},inversedBy="article")
     * @ORM\JoinColumn(nullable=false)
     */
    public $auteur;

    /**
     * @ORM\ManyToMany(targetEntity="Main\MainBundle\Entity\Tags", cascade={"persist"})
     * @ORM\JoinColumn(nullable=true)
     */
    public $tag;

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
     * @var \DateTime
     *
     * @ORM\Column(name="date_publication", type="datetime")
     */
    private $date_publication;



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


    /**
     * @var string
     *
     * @ORM\Column(name="type", type="string",length=255)
     */
    private $type;

    /**
     * @ORM\ManyToMany(targetEntity="Main\MainBundle\Entity\Comments", cascade={"persist","remove"})
     * @ORM\JoinColumn(nullable=true)
     */
    public $commentaire;

    /**
     * @var string
     *
     * @ORM\Column(name="Etat", type="string", length=255)
     */
    private $etat;


    /**
     * Constructor
     */
    public function __construct()
    {
        $this->commentaire = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set titre
     *
     * @param string $titre
     *
     * @return Articles
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
     * Set datePublication
     *
     * @param \DateTime $datePublication
     *
     * @return Articles
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
     * @return Articles
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
     * Set nombreCommentaire
     *
     * @param integer $nombreCommentaire
     *
     * @return Articles
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
     * @return Articles
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
     * @return Articles
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
     * Set type
     *
     * @param string $type
     *
     * @return Articles
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

    /**
     * Set categorie
     *
     * @param \Main\MainBundle\Entity\Categories $categorie
     *
     * @return Articles
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
     * Set dossier
     *
     * @param \Main\MainBundle\Entity\Dossier $dossier
     *
     * @return Articles
     */
    public function setDossier(\Main\MainBundle\Entity\Dossier $dossier = null)
    {
        $this->dossier = $dossier;

        return $this;
    }

    /**
     * Get dossier
     *
     * @return \Main\MainBundle\Entity\Dossier
     */
    public function getDossier()
    {
        return $this->dossier;
    }

    /**
     * Set auteur
     *
     * @param \User\UserBundle\Entity\User $auteur
     *
     * @return Articles
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
     * Set miniature
     *
     * @param \Main\MainBundle\Entity\Media $miniature
     *
     * @return Articles
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
     * @return Articles
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
     * Add commentaire
     *
     * @param \Main\MainBundle\Entity\Comments $commentaire
     *
     * @return Articles
     */
    public function addCommentaire(\Main\MainBundle\Entity\Comments $commentaire)
    {
        $this->commentaire[] = $commentaire;

        return $this;
    }

    /**
     * Remove commentaire
     *
     * @param \Main\MainBundle\Entity\Comments $commentaire
     */
    public function removeCommentaire(\Main\MainBundle\Entity\Comments $commentaire)
    {
        $this->commentaire->removeElement($commentaire);
    }

    /**
     * Get commentaire
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getCommentaire()
    {
        return $this->commentaire;
    }

    /**
     * Add auteur
     *
     * @param \User\UserBundle\Entity\User $auteur
     *
     * @return Articles
     */
    public function addAuteur(\User\UserBundle\Entity\User $auteur)
    {
        $this->auteur[] = $auteur;

        return $this;
    }

    /**
     * Remove auteur
     *
     * @param \User\UserBundle\Entity\User $auteur
     */
    public function removeAuteur(\User\UserBundle\Entity\User $auteur)
    {
        $this->auteur->removeElement($auteur);
    }

    /**
     * Set etat
     *
     * @param string $etat
     *
     * @return Articles
     */
    public function setEtat($etat)
    {
        $this->etat = $etat;

        return $this;
    }

    /**
     * Get etat
     *
     * @return string
     */
    public function getEtat()
    {
        return $this->etat;
    }



    /**
     * Add tag
     *
     * @param \Main\MainBundle\Entity\Tags $tag
     *
     * @return Articles
     */
    public function addTag(\Main\MainBundle\Entity\Tags $tag)
    {
        $this->tag[] = $tag;

        return $this;
    }

    /**
     * Remove tag
     *
     * @param \Main\MainBundle\Entity\Tags $tag
     */
    public function removeTag(\Main\MainBundle\Entity\Tags $tag)
    {
        $this->tag->removeElement($tag);
    }

    /**
     * Get tag
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getTag()
    {
        return $this->tag;
    }

    /**
     * Set format
     *
     * @param \Main\MainBundle\Entity\Format $format
     *
     * @return Articles
     */
    public function setFormat(\Main\MainBundle\Entity\Format $format)
    {
        $this->format = $format;

        return $this;
    }

    /**
     * Get format
     *
     * @return \Main\MainBundle\Entity\Format
     */
    public function getFormat()
    {
        return $this->format;
    }
}
