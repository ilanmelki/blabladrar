<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CreateSession
 *
 * @ORM\Table(name="create_session")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\CreateSessionRepository")
 */
class CreateSession
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
     * @ORM\Column(name="type_of_car", type="string", length=255)
     */
    private $typeOfCar;

    /**
     * @var int
     *
     * @ORM\Column(name="number_of_places", type="integer")
     */
    private $numberOfPlaces;

    /**
     * @var string
     *
     * @ORM\Column(name="address", type="string", length=255)
     */
    private $address;

    /**
     * @var string
     *
     * @ORM\Column(name="departure_time", type="string", length=255)
     */
    private $departureTime;


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
     * Set typeOfCar
     *
     * @param string $typeOfCar
     *
     * @return CreateSession
     */
    public function setTypeOfCar($typeOfCar)
    {
        $this->typeOfCar = $typeOfCar;

        return $this;
    }

    /**
     * Get typeOfCar
     *
     * @return string
     */
    public function getTypeOfCar()
    {
        return $this->typeOfCar;
    }

    /**
     * Set numberOfPlaces
     *
     * @param integer $numberOfPlaces
     *
     * @return CreateSession
     */
    public function setNumberOfPlaces($numberOfPlaces)
    {
        $this->numberOfPlaces = $numberOfPlaces;

        return $this;
    }

    /**
     * Get numberOfPlaces
     *
     * @return int
     */
    public function getNumberOfPlaces()
    {
        return $this->numberOfPlaces;
    }

    /**
     * Set address
     *
     * @param string $address
     *
     * @return CreateSession
     */
    public function setAddress($address)
    {
        $this->address = $address;

        return $this;
    }

    /**
     * Get address
     *
     * @return string
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * Set departureTime
     *
     * @param string $departureTime
     *
     * @return CreateSession
     */
    public function setDepartureTime($departureTime)
    {
        $this->departureTime = $departureTime;

        return $this;
    }

    /**
     * Get departureTime
     *
     * @return string
     */
    public function getDepartureTime()
    {
        return $this->departureTime;
    }
}

