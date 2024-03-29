<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\ManyToOne as ManyToOne;
use Doctrine\ORM\Mapping\JoinColumn as JoinColumn;

/**
 * Profil
 *
 * @ORM\Table(name="profil")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ProfilRepository")
 */
class Profil
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
     * @ManyToOne(targetEntity="Passager")
     * @JoinColumn(name="passager_id", referencedColumnName="id")
     */
    private $passager;
    /**
     * @var string
     *
     * @ORM\Column(name="nom", type="string", length=255)
     */
    private $nom;

    /**
     * @var string
     *
     * @ORM\Column(name="prenom", type="string", length=255)
     */
    private $prenom;

    /**
     * @var string
     *
     * @ORM\Column(name="Adresse", type="string", length=255)
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
     * Set nom
     *
     * @param string $nom
     *
     * @return Profil
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
     * @return Profil
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
     * Set adresse
     *
     * @param string $adresse
     *
     * @return Profil
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

    /**
     * Set conducteur
     *
     * @param \AppBundle\Entity\Conducteur $conducteur
     *
     * @return Profil
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

    /**
     * Set passager
     *
     * @param \AppBundle\Entity\Passager $passager
     *
     * @return Profil
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
    public function __toString()
    {
        return $this->id.'';
    }
}
