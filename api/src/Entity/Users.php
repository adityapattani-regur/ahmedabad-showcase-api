<?php
// api/src/Entity/Users.php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Core\Annotation\ApiResource;
use ApiPlatform\Core\Annotation\ApiSubresource;

/**
 * A user.
 * @ApiResource
 * @ORM\Entity
 */
class Users
{
    /**
     * @var int The id of this user.
     *
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @var string The name of this user.
     *
     * @ORM\Column(nullable=true)
     */
    public $name;
	
	/**
     * @var string The image of this user.
     *
     * @ORM\Column(nullable=true)
     */
    public $image;

    /**
     * @var string If google is linked.
     *
     * @ORM\Column(type="boolean")
     */
    public $isGoogleLinked;

    /**
     * @var string If Facebook is linked.
     *
     * @ORM\Column(type="boolean")
     */
    public $isFacebookLinked;

    /**
     * @var string If Twitter is linked.
     *
     * @ORM\Column(type="boolean")
     */
    public $isTwitterLinked;
	
	/**
     * @ORM\OneToMany(targetEntity="Reviews", mappedBy="userId")
     * @ORM\JoinColumn(referencedColumnName="id", unique=true)
     * @ApiSubresource
     */
    public $reviews;

    public function getId(): ?int
    {
        return $this->id;
    }
}

