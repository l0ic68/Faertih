<?php

namespace Main\MainBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * RCommentaire
 *
 * @ORM\Table(name="reponse_commentaire")
 * @ORM\Entity(repositoryClass="Main\MainBundle\Repository\CommentsRepository")
 */
class RCommentaire
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
     * @ORM\Column(name="comment", type="string", length=255)
     */
    private $comment;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_comment", type="datetime")
     * @ORM\JoinColumn(nullable=true)
     */
    private $date_comment;

    /**
     * @ORM\ManyToOne(targetEntity="User\UserBundle\Entity\User", cascade={"persist"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $user;

    /**
     * @ORM\ManyToOne(targetEntity="Main\MainBundle\Entity\RCommentaire", cascade={"persist"})
     * @ORM\JoinColumn(nullable=true)
     */
    private $r_commentaire;


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
     * Set comment
     *
     * @param string $comment
     *
     * @return RCommentaire
     */
    public function setComment($comment)
    {
        $this->comment = $comment;

        return $this;
    }

    /**
     * Get comment
     *
     * @return string
     */
    public function getComment()
    {
        return $this->comment;
    }

    /**
     * Set dateComment
     *
     * @param \DateTime $dateComment
     *
     * @return RCommentaire
     */
    public function setDateComment($dateComment)
    {
        $this->date_comment = $dateComment;

        return $this;
    }

    /**
     * Get dateComment
     *
     * @return \DateTime
     */
    public function getDateComment()
    {
        return $this->date_comment;
    }

    /**
     * Set user
     *
     * @param \User\UserBundle\Entity\User $user
     *
     * @return RCommentaire
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
     * Set rCommentaire
     *
     * @param \Main\MainBundle\Entity\RCommentaire $rCommentaire
     *
     * @return RCommentaire
     */
    public function setRCommentaire(\Main\MainBundle\Entity\RCommentaire $rCommentaire = null)
    {
        $this->r_commentaire = $rCommentaire;

        return $this;
    }

    /**
     * Get rCommentaire
     *
     * @return \Main\MainBundle\Entity\RCommentaire
     */
    public function getRCommentaire()
    {
        return $this->r_commentaire;
    }
}
