<?php


namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Class Place
 * @ORM\Table(name="places")
 * @package App\Entity
 */
class Place
{
    /**
     * @var int
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     * @ORM\Column(name="place", type="string", length=255, nullable=false)
     */
    private $name;

    /**
     * @var string
     * @ORM\Column(name="room", type="string", length=255, nullable=false)
     */
    private $room;

    /**
     * @var Product
     * @ORM\OneToMany(targetEntity="Product", mappedBy="place")
     */
    private $product;

    /**
     * Place constructor.
     */
    public function __construct()
    {
        $this->product = new ArrayCollection();
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     *
     * @return Place
     */
    public function setId(int $id): Place
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     *
     * @return Place
     */
    public function setName(string $name): Place
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return string
     */
    public function getRoom(): string
    {
        return $this->room;
    }

    /**
     * @param string $room
     *
     * @return Place
     */
    public function setRoom(string $room): Place
    {
        $this->room = $room;
        return $this;
    }


    /**
     * @return ArrayCollection
     */
    public function getProduct(): ArrayCollection
    {
        return $this->product;
    }


    public function addProduct(Product $product)
    {

    }

    /**
     * @param Product $product
     *
     * @return Place
     */
    public function setProduct(Product $product): self
    {
        $this->product = $product;
        return $this;
    }


}
