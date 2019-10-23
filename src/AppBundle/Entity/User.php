<?php

namespace AppBundle\Entity;

use FOS\UserBundle\Model\User as FosUser;
use Doctrine\ORM\Mapping as ORM;
use AppBundle\Entity\Conducteur;

/**
 * @ORM\Entity
 * @ORM\Table(name="User")
 */

class User extends FosUser
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\OneToMany(targetEntity="App\Entity\Conducteur", mappedBy="author")
     */
    protected $id;

    /**
     * @ORM\Column(type="string")
     */
    protected $first_name;
    /**
     * @ORM\Column(type="string")
     */
    protected $last_name;

    /**
     * Set firstName
     *
     * @param string $firstName
     *
     * @return User
     */
    public function setFirstName($firstName)
    {
        $this->first_name = $firstName;
        return $this;
    }
    /**
     * Get firstName
     *
     * @return string
     */
    public function getFirstName()
    {
        return $this->first_name;
    }
    /**
     * Set lastName
     *
     * @param string $lastName
     *
     * @return User
     */
    public function setLastName($lastName)
    {
        $this->last_name = $lastName;
        return $this;
    }
    /**
     * Get lastName
     *
     * @return string
     */
    public function getLastName()
    {
        return $this->last_name;
    }

    public function __construct()
    {
        parent::__construct();
    }

    public function getFullName()
    {
        return "{this->firstName} {this->lastName}";
    }

}
?>