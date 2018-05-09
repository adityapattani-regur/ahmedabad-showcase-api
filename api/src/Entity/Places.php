<?php
// api/src/Entity/Places.php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Core\Annotation\ApiResource;
use ApiPlatform\Core\Annotation\ApiSubresource;

/**
 * A place.
 * @ApiResource
 * @ORM\Entity
 */
class Places
{
    /**
     * @var int The id of this place.
     *
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @var int The name of this place.
     *
     * @ORM\Column(type="string")
     */
    public $name;

    /**
     * @var string the address of the place.
     *
     * @ORM\Column(type="text")
     */
    public $address;

    /**
     * @var float The latitude of the place.
     *
     * @ORM\Column(type="float")
     * @ORM\Column(length=2)
     * @ORM\Column(precision=2)
     */
    public $latitude;

    /**
     * @var float The longitude of the place.
     *
     * @ORM\Column(type="float")
     * @ORM\Column(length=2)
     * @ORM\Column(precision=2)
     */
    public $longitude;

    /**
     * @var string The description of the place.
     *
     * @ORM\Column(type="text")
     */
    public $description;
	
	/**
     * @var string The images of the place.
     *
     * @ORM\Column(type="text")
     */
    public $images;

    /**
     * @var The city of the place.
     *
	 * @ORM\ManyToOne(targetEntity="City")
     */
    public $city;
	
	/**
     * @ORM\OneToMany(targetEntity="Reviews", mappedBy="place")
     * @ORM\JoinColumn(referencedColumnName="id", unique=true)
     * @ApiSubresource
     */
    public $reviews;

    public function getId(): ?int
    {
        return $this->id;
    }
}

