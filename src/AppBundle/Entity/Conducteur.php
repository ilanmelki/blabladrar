<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\ManyToOne as ManyToOne;
use Doctrine\ORM\Mapping\JoinColumn as JoinColumn;
use FOS\UserBundle\Model\User as FosUser;

/**
 * Conducteur
 *
 * @ORM\Table(name="conducteur")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ConducteurRepository")
 */
class Conducteur
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
     * @ORM\Column(name="typevoiture", type="string", length=255)
     */
    private $typevoiture;

    /**
     * @var int
     *
     * @ORM\Column(name="nbplaces", type="integer")
     */
    private $nbplaces;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="date")
     */
    private $date;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="heure", type="time")
     */
    private $heure;


    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\User", inversedBy="id")
     * @ORM\JoinColumn(nullable=false)
     */

    private $author;


    /**
     * @var string
     *
     * @ORM\Column(name="adresse", type="string", length=255)
     */
    private $adresse;



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
     * Set typevoiture
     *
     * @param string $typevoiture
     *
     * @return Conducteur
     */
    public function setTypevoiture($typevoiture)
    {
        $this->typevoiture = $typevoiture;

        return $this;
    }

    /**
     * Get typevoiture
     *
     * @return string
     */
    public function getTypevoiture()
    {
        return $this->typevoiture;
    }

    /**
     * Set nbplaces
     *
     * @param integer $nbplaces
     *
     * @return Conducteur
     */
    public function setNbplaces($nbplaces)
    {
        $this->nbplaces = $nbplaces;

        return $this;
    }

    /**
     * Get nbplaces
     *
     * @return int
     */
    public function getNbplaces()
    {
        return $this->nbplaces;
    }

    /**
     * Set date
     *
     * @param \DateTime $date
     *
     * @return Conducteur
     */
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }

    /**
     * Get date
     *
     * @return \DateTime
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Set heure
     *
     * @param \DateTime $heure
     *
     * @return Conducteur
     */
    public function setHeure($heure)
    {
        $this->heure = $heure;

        return $this;
    }

    /**
     * Get heure
     *
     * @return \DateTime
     */
    public function getHeure()
    {
        return $this->heure;
    }
    public function __toString()
    {
        return 'voiture: '.$this->typevoiture.' nombre de place(s): '.$this->nbplaces. ' conducteur: '. $this->author;
    }

    /**
     * Set passager
     *
     * @param \AppBundle\Entity\Passager $passager
     *
     * @return Conducteur
     */
    public function setPassager(\AppBundle\Entity\Passager $passager = null)
    {
        $this->passager = $passager;

        return $this;
    }

    /**
     * Get passager
     *
     * @return \AppBundle\Entity\Passager
     */
    public function getPassager()
    {
        return $this->passager;
    }

    /**
     * Set profil
     *
     * @param \AppBundle\Entity\Profil $profil
     *
     * @return Conducteur
     */
    public function setProfil(\AppBundle\Entity\Profil $profil = null)
    {
        $this->profil = $profil;

        return $this;
    }

    /**
     * Get profil
     *
     * @return \AppBundle\Entity\Profil
     */
    public function getProfil()
    {
        return $this->profil;
    }


    /**
     * Set author
     *
     * @param string $author
     *
     * @return Conducteur
     */
    public function setAuthor($author)
    {
        $this->author = $author;

        return $this;
    }

    /**
     * Get author
     *
     * @return string
     */
    public function getAuthor()
    {
        return $this->author;
    }


    /**
     * Set adresse
     *
     * @param string $adresse
     *
     * @return Conducteur
     */
    public function setAdresse($adresse)
    {
        $this->adresse = $adresse;

        return $this;
    }

    /**
     * Get adresse
     *
     * @return string
     */
    public function getAdresse()
    {
        return $this->adresse;
    }


}
