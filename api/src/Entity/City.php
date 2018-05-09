<?php
// api/src/Entity/City.php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Core\Annotation\ApiResource;
use ApiPlatform\Core\Annotation\ApiSubresource;

/**
 * @ApiResource
 * @ORM\Entity
 */
 
class City
{
    /**
     * @var int The id of this city.
     *
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @var string The name of this city.
     *
     * @ORM\Column(type="string")
     */
    public $name;
	
	/**
     * @ORM\OneToMany(targetEntity="Places", mappedBy="city")
     * @ORM\JoinColumn(referencedColumnName="id", unique=true)
     * @ApiSubresource
     */
    public $places;

    public function getId(): ?int
    {
        return $this->id;
    }
}

