<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\ManyToOne as ManyToOne;
use Doctrine\ORM\Mapping\JoinColumn as JoinColumn;
use FOS\UserBundle\Model\User as FosUser;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Passager
 *
 * @ORM\Table(name="passager")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\PassagerRepository")
 */
class Passager
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
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\User", inversedBy="id")
     * @ORM\JoinColumn(nullable=false)
     */

    private $user;



    /**
     * @ManyToOne(targetEntity="Conducteur")
     * @JoinColumn(name="conducteur_id", referencedColumnName="id")
     */
    private $conducteur;

    public function __construct()
    {
        $this->user = new ArrayCollection();
    }

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
     * Set conducteur
     *
     * @param \AppBundle\Entity\Conducteur $conducteur
     *
     * @return Passager
     */
    public function setConducteur(\AppBundle\Entity\Conducteur $conducteur = null)
    {
        $this->conducteur = $conducteur;

        return $this;
    }

    /**
     * Get conducteur
     *
     * @return \AppBundle\Entity\Conducteur
     */
    public function getConducteur()
    {
        return $this->conducteur;
    }
    public function __toString()
    {
        return $this->id.'';
    }



    /**
     * Set user
     *
     * @param \App\Entity\User $user
     *
     * @return Passager
     */
    public function setUser(\App\Entity\User $user = null)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return \App\Entity\User
     */
    public function getUser()
    {
        return $this->user;
    }
}
