<?php

namespace Main\MainBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Don
 *
 * @ORM\Table(name="don")
 * @ORM\Entity(repositoryClass="Main\MainBundle\Repository\DonRepository")
 */
class Don
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
     * @ORM\Column(name="Paypal", type="text")
     */
    private $paypal;

    /**
     * @var string
     *
     * @ORM\Column(name="Tipeee", type="text")
     */
    private $tipeee;

    /**
     * @var string
     *
     * @ORM\Column(name="TwitchAlerts", type="text")
     */
    private $twitchAlerts;

    /**
     * @var string
     *
     * @ORM\Column(name="Paypal_lien", type="string", length=255)
     */
    private $paypal_lien;

    /**
     * @var string
     *
     * @ORM\Column(name="Tipeee_lien", type="string", length=255)
     */
    private $tipeee_lien;

    /**
     * @var string
     *
     * @ORM\Column(name="TwitchAlerts_lien", type="string", length=255)
     */
    private $twitchAlerts_lien;

    /**
     * @ORM\ManyToOne(targetEntity="User\UserBundle\Entity\User", cascade={"persist"})
     * @ORM\JoinColumn(nullable=false)
     */
    public $user;




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
     * Set paypal
     *
     * @param string $paypal
     *
     * @return Don
     */
    public function setPaypal($paypal)
    {
        $this->paypal = $paypal;

        return $this;
    }

    /**
     * Get paypal
     *
     * @return string
     */
    public function getPaypal()
    {
        return $this->paypal;
    }

    /**
     * Set tipeee
     *
     * @param string $tipeee
     *
     * @return Don
     */
    public function setTipeee($tipeee)
    {
        $this->tipeee = $tipeee;

        return $this;
    }

    /**
     * Get tipeee
     *
     * @return string
     */
    public function getTipeee()
    {
        return $this->tipeee;
    }

    /**
     * Set twitchAlerts
     *
     * @param string $twitchAlerts
     *
     * @return Don
     */
    public function setTwitchAlerts($twitchAlerts)
    {
        $this->twitchAlerts = $twitchAlerts;

        return $this;
    }

    /**
     * Get twitchAlerts
     *
     * @return string
     */
    public function getTwitchAlerts()
    {
        return $this->twitchAlerts;
    }

    /**
     * Set paypalLien
     *
     * @param string $paypalLien
     *
     * @return Don
     */
    public function setPaypalLien($paypalLien)
    {
        $this->paypal_lien = $paypalLien;

        return $this;
    }

    /**
     * Get paypalLien
     *
     * @return string
     */
    public function getPaypalLien()
    {
        return $this->paypal_lien;
    }

    /**
     * Set tipeeeLien
     *
     * @param string $tipeeeLien
     *
     * @return Don
     */
    public function setTipeeeLien($tipeeeLien)
    {
        $this->tipeee_lien = $tipeeeLien;

        return $this;
    }

    /**
     * Get tipeeeLien
     *
     * @return string
     */
    public function getTipeeeLien()
    {
        return $this->tipeee_lien;
    }

    /**
     * Set twitchAlertsLien
     *
     * @param string $twitchAlertsLien
     *
     * @return Don
     */
    public function setTwitchAlertsLien($twitchAlertsLien)
    {
        $this->twitchAlerts_lien = $twitchAlertsLien;

        return $this;
    }

    /**
     * Get twitchAlertsLien
     *
     * @return string
     */
    public function getTwitchAlertsLien()
    {
        return $this->twitchAlerts_lien;
    }

    /**
     * Set user
     *
     * @param \User\UserBundle\Entity\User $user
     *
     * @return Don
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
}
