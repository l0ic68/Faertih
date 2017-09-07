<?php
// src/AppBundle/Entity/User.php

namespace User\UserBundle\Entity;

use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity
 * @ORM\Table(name="Reseau")
 */
class Reseau
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */

    protected $id;

    /**
     * @ORM\Column(name="type",type="string", length=255)
     */
    private $type;

    /**
     * @ORM\Column(name="discord",type="string", length=255,nullable=true)
     */
    private $discord;

    /**
     * @ORM\Column(name="facebook",type="string", length=255,nullable=true)
     */
    private $facebook;

    /**
     * @ORM\Column(name="twitter",type="string", length=255,nullable=true)
     */
    private $twitter;

    /**
     * @ORM\Column(name="twitch",type="string", length=255,nullable=true)
     */
    private $twitch;

    /**
     * @ORM\Column(name="youtube",type="string", length=255,nullable=true)
     */
    private $youtube;

    /**
     * @ORM\Column(name="instagram",type="string", length=255,nullable=true)
     */
    private $instagram;

    /**
     * @ORM\Column(name="soundcloud",type="string", length=255,nullable=true)
     */
    private $soundcloud;

    /**
     * @ORM\Column(name="tumblr",type="string", length=255,nullable=true)
     */
    private $tumblr;


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
     * Set type
     *
     * @param string $type
     *
     * @return Reseau
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
     * Set facebook
     *
     * @param string $facebook
     *
     * @return Reseau
     */
    public function setFacebook($facebook)
    {
        $this->facebook = $facebook;

        return $this;
    }

    /**
     * Get facebook
     *
     * @return string
     */
    public function getFacebook()
    {
        return $this->facebook;
    }

    /**
     * Set twitter
     *
     * @param string $twitter
     *
     * @return Reseau
     */
    public function setTwitter($twitter)
    {
        $this->twitter = $twitter;

        return $this;
    }

    /**
     * Get twitter
     *
     * @return string
     */
    public function getTwitter()
    {
        return $this->twitter;
    }

    /**
     * Set twitch
     *
     * @param string $twitch
     *
     * @return Reseau
     */
    public function setTwitch($twitch)
    {
        $this->twitch = $twitch;

        return $this;
    }

    /**
     * Get twitch
     *
     * @return string
     */
    public function getTwitch()
    {
        return $this->twitch;
    }

    /**
     * Set youtube
     *
     * @param string $youtube
     *
     * @return Reseau
     */
    public function setYoutube($youtube)
    {
        $this->youtube = $youtube;

        return $this;
    }

    /**
     * Get youtube
     *
     * @return string
     */
    public function getYoutube()
    {
        return $this->youtube;
    }

    /**
     * Set instagram
     *
     * @param string $instagram
     *
     * @return Reseau
     */
    public function setInstagram($instagram)
    {
        $this->instagram = $instagram;

        return $this;
    }

    /**
     * Get instagram
     *
     * @return string
     */
    public function getInstagram()
    {
        return $this->instagram;
    }

    /**
     * Set soundcloud
     *
     * @param string $soundcloud
     *
     * @return Reseau
     */
    public function setSoundcloud($soundcloud)
    {
        $this->soundcloud = $soundcloud;

        return $this;
    }

    /**
     * Get soundcloud
     *
     * @return string
     */
    public function getSoundcloud()
    {
        return $this->soundcloud;
    }

    /**
     * Set tumblr
     *
     * @param string $tumblr
     *
     * @return Reseau
     */
    public function setTumblr($tumblr)
    {
        $this->tumblr = $tumblr;

        return $this;
    }

    /**
     * Get tumblr
     *
     * @return string
     */
    public function getTumblr()
    {
        return $this->tumblr;
    }

    /**
     * Set discord
     *
     * @param string $discord
     *
     * @return Reseau
     */
    public function setDiscord($discord)
    {
        $this->discord = $discord;

        return $this;
    }

    /**
     * Get discord
     *
     * @return string
     */
    public function getDiscord()
    {
        return $this->discord;
    }
}
