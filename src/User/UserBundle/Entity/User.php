<?php
// src/AppBundle/Entity/User.php

namespace User\UserBundle\Entity;

use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity
 * @ORM\Table(name="users")
 * @ORM\Entity(repositoryClass= "User\UserBundle\Repository\UserRepository"))
 */
class User extends BaseUser
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */

    protected $id;

    /**
     * @ORM\ManyToOne(targetEntity="Main\MainBundle\Entity\Media", cascade={"persist"})
     * @ORM\JoinColumn(nullable=true)
     */
    public $media;

    /**
     * @ORM\ManyToOne(targetEntity="Main\MainBundle\Entity\Media", cascade={"persist"})
     * @ORM\JoinColumn(nullable=true)
     */
    public $banniere;

    /**
     * @ORM\OneToOne(targetEntity="User\UserBundle\Entity\Reseau", cascade={"persist"})
     * @ORM\JoinColumn(nullable=true)
     */
    public $social;

    /**
     * @ORM\Column(name="nom",type="string", length=255)
     */
    private $nom;

    /**
     * @ORM\Column(name="prenom",type="string", length=255)
     */
    private $prenom;

    /**
     *
     * @ORM\Column(name="age",type="date")
     */
    private $age;

    /**
     * @ORM\Column(name="creation",type="datetime")
     */
    private $creation;

    /**
     * @ORM\Column(name="sexe",type="string", length=255)
     */
    private $sexe;

    /**
     * @ORM\Column(name="newsSemaine",type="boolean")
     */
    private $newss;

    /**
     * @ORM\Column(name="newsMois",type="boolean")
     */
    private $newsm;

    /**
     * @ORM\Column(name="steam",type="string", length=255,nullable=true)
     */
    private $steam;

    /**
     * @ORM\Column(name="origin",type="string", length=255,nullable=true)
     */
    private $origin;

    /**
     * @ORM\Column(name="uplay",type="string", length=255,nullable=true)
     */
    private $uplay;

    /**
     * @ORM\Column(name="psn",type="string", length=255,nullable=true)
     */
    private $psn;

    /**
     * @ORM\Column(name="xboxlive",type="string", length=255,nullable=true)
     */
    private $xboxlive;

    /**
     * @ORM\Column(name="GOG",type="string", length=255,nullable=true)
     */
    private $gog;

    /**
     * @ORM\Column(name="nintendo",type="string", length=255,nullable=true)
     */
    private $nintendo;

    /**
     * @ORM\Column(name="description",type="text")
     */
    private $description;

    /**
     * @ORM\ManyToMany(targetEntity="User\UserBundle\Entity\Team", cascade={"persist"})
     * @ORM\JoinColumn(nullable=true)
     */
    public $team;

    /**
     * @ORM\ManyToMany(targetEntity="User\UserBundle\Entity\User", cascade={"persist"})
     * @ORM\JoinColumn(nullable=true)
     * @ORM\JoinTable(name="abonnement")
     */
    public $abonnement;

    /**
     * @ORM\ManyToMany(targetEntity="Main\MainBundle\Entity\Dossier", cascade={"persist"})
     * @ORM\JoinColumn(nullable=true)
     * @ORM\JoinTable(name="dossier_user")
     */
    public $dossier;

    /**
     * @ORM\ManyToMany(targetEntity="Main\MainBundle\Entity\Articles", cascade={"persist"},mappedBy="auteur")
     * @ORM\JoinColumn(nullable=true)
     */

    private $article;

    /**
     * @ORM\ManyToMany(targetEntity="User\UserBundle\Entity\Later", cascade={"persist"})
     * @ORM\JoinColumn(nullable=true)
     */

    private $later;


    /**
     * Set nom
     *
     * @param string $nom
     *
     * @return User
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
     * Set prenom
     *
     * @param string $prenom
     *
     * @return User
     */
    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;

        return $this;
    }

    /**
     * Get prenom
     *
     * @return string
     */
    public function getPrenom()
    {
        return $this->prenom;
    }

    /**
     * Set age
     *
     * @param \DateTime $age
     *
     * @return User
     */
    public function setAge($age)
    {
        $this->age = $age;

        return $this;
    }

    /**
     * Get age
     *
     * @return \DateTime
     */
    public function getAge()
    {
        return $this->age;
    }

    /**
     * Set creation
     *
     * @param \DateTime $creation
     *
     * @return User
     */
    public function setCreation($creation)
    {
        $this->creation = $creation;

        return $this;
    }

    /**
     * Get creation
     *
     * @return \DateTime
     */
    public function getCreation()
    {
        return $this->creation;
    }

    /**
     * Set sexe
     *
     * @param string $sexe
     *
     * @return User
     */
    public function setSexe($sexe)
    {
        $this->sexe = $sexe;

        return $this;
    }

    /**
     * Get sexe
     *
     * @return string
     */
    public function getSexe()
    {
        return $this->sexe;
    }

    /**
     * Set newss
     *
     * @param boolean $newss
     *
     * @return User
     */
    public function setNewss($newss)
    {
        $this->newss = $newss;

        return $this;
    }

    /**
     * Get newss
     *
     * @return boolean
     */
    public function getNewss()
    {
        return $this->newss;
    }

    /**
     * Set newsm
     *
     * @param boolean $newsm
     *
     * @return User
     */
    public function setNewsm($newsm)
    {
        $this->newsm = $newsm;

        return $this;
    }

    /**
     * Get newsm
     *
     * @return boolean
     */
    public function getNewsm()
    {
        return $this->newsm;
    }

    /**
     * Set steam
     *
     * @param string $steam
     *
     * @return User
     */
    public function setSteam($steam)
    {
        $this->steam = $steam;

        return $this;
    }

    /**
     * Get steam
     *
     * @return string
     */
    public function getSteam()
    {
        return $this->steam;
    }

    /**
     * Set origin
     *
     * @param string $origin
     *
     * @return User
     */
    public function setOrigin($origin)
    {
        $this->origin = $origin;

        return $this;
    }

    /**
     * Get origin
     *
     * @return string
     */
    public function getOrigin()
    {
        return $this->origin;
    }

    /**
     * Set uplay
     *
     * @param string $uplay
     *
     * @return User
     */
    public function setUplay($uplay)
    {
        $this->uplay = $uplay;

        return $this;
    }

    /**
     * Get uplay
     *
     * @return string
     */
    public function getUplay()
    {
        return $this->uplay;
    }

    /**
     * Set psn
     *
     * @param string $psn
     *
     * @return User
     */
    public function setPsn($psn)
    {
        $this->psn = $psn;

        return $this;
    }

    /**
     * Get psn
     *
     * @return string
     */
    public function getPsn()
    {
        return $this->psn;
    }

    /**
     * Set xboxlive
     *
     * @param string $xboxlive
     *
     * @return User
     */
    public function setXboxlive($xboxlive)
    {
        $this->xboxlive = $xboxlive;

        return $this;
    }

    /**
     * Get xboxlive
     *
     * @return string
     */
    public function getXboxlive()
    {
        return $this->xboxlive;
    }

    /**
     * Set gog
     *
     * @param string $gog
     *
     * @return User
     */
    public function setGog($gog)
    {
        $this->gog = $gog;

        return $this;
    }

    /**
     * Get gog
     *
     * @return string
     */
    public function getGog()
    {
        return $this->gog;
    }

    /**
     * Set nintendo
     *
     * @param string $nintendo
     *
     * @return User
     */
    public function setNintendo($nintendo)
    {
        $this->nintendo = $nintendo;

        return $this;
    }

    /**
     * Get nintendo
     *
     * @return string
     */
    public function getNintendo()
    {
        return $this->nintendo;
    }

    /**
     * Set description
     *
     * @param string $description
     *
     * @return User
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
     * Set media
     *
     * @param \Main\MainBundle\Entity\Media $media
     *
     * @return User
     */
    public function setMedia(\Main\MainBundle\Entity\Media $media = null)
    {
        $this->media = $media;

        return $this;
    }

    /**
     * Get media
     *
     * @return \Main\MainBundle\Entity\Media
     */
    public function getMedia()
    {
        return $this->media;
    }

    /**
     * Set banniere
     *
     * @param \Main\MainBundle\Entity\Media $banniere
     *
     * @return User
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
     * Set social
     *
     * @param \User\UserBundle\Entity\Reseau $social
     *
     * @return User
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
     * Add team
     *
     * @param \User\UserBundle\Entity\Team $team
     *
     * @return User
     */
    public function addTeam(\User\UserBundle\Entity\Team $team)
    {
        $this->team[] = $team;

        return $this;
    }

    /**
     * Remove team
     *
     * @param \User\UserBundle\Entity\Team $team
     */
    public function removeTeam(\User\UserBundle\Entity\Team $team)
    {
        $this->team->removeElement($team);
    }

    /**
     * Get team
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getTeam()
    {
        return $this->team;
    }

    /**
     * Add abonnement
     *
     * @param \User\UserBundle\Entity\User $abonnement
     *
     * @return User
     */
    public function addAbonnement(\User\UserBundle\Entity\User $abonnement)
    {
        $this->abonnement[] = $abonnement;

        return $this;
    }

    /**
     * Remove abonnement
     *
     * @param \User\UserBundle\Entity\User $abonnement
     */
    public function removeAbonnement(\User\UserBundle\Entity\User $abonnement)
    {
        $this->abonnement->removeElement($abonnement);
    }

    /**
     * Get abonnement
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getAbonnement()
    {
        return $this->abonnement;
    }

    /**
     * Add article
     *
     * @param \Main\MainBundle\Entity\Articles $article
     *
     * @return User
     */
    public function addArticles(\Main\MainBundle\Entity\Articles $article)
    {
        $this->article[] = $article;

        return $this;
    }

    /**
     * Remove article
     *
     * @param \Main\MainBundle\Entity\Articles $article
     */
    public function removeArticles(\Main\MainBundle\Entity\Articles $article)
    {
        $this->article->removeElement($article);
    }

    /**
     * Get article
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getArticles()
    {
        return $this->article;
    }

    /**
     * Add article
     *
     * @param \Main\MainBundle\Entity\Articles $article
     *
     * @return User
     */
    public function addArticle(\Main\MainBundle\Entity\Articles $article)
    {
        $this->article[] = $article;

        return $this;
    }

    /**
     * Remove article
     *
     * @param \Main\MainBundle\Entity\Articles $article
     */
    public function removeArticle(\Main\MainBundle\Entity\Articles $article)
    {
        $this->article->removeElement($article);
    }

    /**
     * Get article
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getArticle()
    {
        return $this->article;
    }

    /**
     * Add later
     *
     * @param \User\UserBundle\Entity\Later $later
     *
     * @return User
     */
    public function addLater(\User\UserBundle\Entity\Later $later)
    {
        $this->later[] = $later;

        return $this;
    }

    /**
     * Remove later
     *
     * @param \User\UserBundle\Entity\Later $later
     */
    public function removeLater(\User\UserBundle\Entity\Later $later)
    {
        $this->later->removeElement($later);
    }

    /**
     * Get later
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getLater()
    {
        return $this->later;
    }

    /**
     * Add dossier
     *
     * @param \Main\MainBundle\Entity\Dossier $dossier
     *
     * @return User
     */
    public function addDossier(\Main\MainBundle\Entity\Dossier $dossier)
    {
        $this->dossier[] = $dossier;

        return $this;
    }

    /**
     * Remove dossier
     *
     * @param \Main\MainBundle\Entity\Dossier $dossier
     */
    public function removeDossier(\Main\MainBundle\Entity\Dossier $dossier)
    {
        $this->dossier->removeElement($dossier);
    }

    /**
     * Get dossier
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getDossier()
    {
        return $this->dossier;
    }
}
