<?php
// api/src/Entity/Events.php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Core\Annotation\ApiResource;
use ApiPlatform\Core\Annotation\ApiSubresource;

/**
 * An event.
 * @ApiResource
 * @ORM\Entity
 */
class Events
{
    /**
     * @var int The id of this event.
     *
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @var int The name of this event.
     *
     * @ORM\Column(type="string")
     */
    public $name;

    /**
     * @var string The address of the event.
     *
     * @ORM\Column(type="text")
     */
    public $address;

    /**
     * @var float The latitude of the event.
     *
     * @ORM\Column(type="float")
     * @ORM\Column(length=2)
     * @ORM\Column(precision=2)
     */
    public $latitude;

    /**
     * @var float The longitude of the event.
     *
     * @ORM\Column(type="float")
     * @ORM\Column(length=2)
     * @ORM\Column(precision=2)
     */
    public $longitude;

    /**
     * @var \DateTimeInterface The date of this event.
     *
     * @ORM\Column(type="datetime_immutable")
     */
    public $eventDate;

    /**
     * @var \DateTimeInterface The time of this event.
     *
     * @ORM\Column(type="datetime_immutable")
     */
    public $eventTime;

    /**
     * @var string The description of the event.
     *
     * @ORM\Column(type="text")
     */
    public $description;
	
	/**
     * @var string The images of the event.
     *
     * @ORM\Column(type="text")
     */
    public $images;

    /**
     * @var string The city of the event.
     *
     * @ORM\Column(type="integer")
     */
    public $city;

    public function getId(): ?int
    {
        return $this->id;
    }
}

