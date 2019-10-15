<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\ManyToOne as ManyToOne;
use Doctrine\ORM\Mapping\JoinColumn as JoinColumn;

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
     * @ManyToOne(targetEntity="Conducteur")
     * @JoinColumn(name="conducteur_id", referencedColumnName="id")
     */
    private $conducteur;

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
}
