<?php
// api/src/Entity/Reviews.php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Core\Annotation\ApiResource;

/**
 * @ORM\Entity
 * @ApiResource
 */
class Reviews
{
    /**
	 * @var string The id of the review.
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
	 * @var string The text content of the review.
     * @ORM\Column(type="string")
     */
    public $reviewDesc;
	
	/**
	 * @var integer The rating given in the review.
     * @ORM\Column(type="integer")
     */
    public $rating;
	
	/**
	 * @var string The date of the review.
     * @ORM\Column(type="string")
     */
    public $reviewDate;
	
	/**
	 * @var string The images in the review.
     * @ORM\Column(type="string")
     */
    public $reviewImages;
	
	/**
	 * @var string The user id of the user that wrote the review.
     * @ORM\ManyToOne(targetEntity="Users")
     */
    public $userId;

    /**
	 * @var string The place for which the review is written.
     * @ORM\ManyToOne(targetEntity="Places")
     */
    public $place;

    public function getId(): ?int
    {
        return $this->id;
    }
}