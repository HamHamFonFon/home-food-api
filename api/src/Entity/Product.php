<?php


namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\ORM\Mapping as ORM;

/**
 * Class Product
 * @ORM\Table(
 *      name="products",
 *      indexes={}
 * )
 * @package App\Entity
 *
 * @ApiResource
 */
class Product
{

    /**
     * @var integer
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @var integer
     * @ORM\Column(name="amount", type="integer")
     */
    private $amount;

    /**
     * @var Place
     * @ORM\ManyToOne(targetEntity="Place", inversedBy="product", cascade={"persist"})
     * @ORM\JoinColumn(name="place_id", referencedColumnName="")
     */
    private $place;


    private $category;

    /**
     * @var \DateTimeInterface
     * @ORM\Column(name="created_at", type="datetime", nullable=false)
     */
    private $createdAt;

    /**
     * @var \DateTimeInterface
     * @ORM\Column(name="updated_at", type="datetime", nullable=true)
     */
    private $updatedAt;
}
