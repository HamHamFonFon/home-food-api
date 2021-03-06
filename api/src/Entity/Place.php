<?php


namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * Class Place
 * @ORM\Table(name="places")
 * @ORM\Entity
 * @package App\Entity
 * @ApiResource(
 *     itemOperations={"get", "put", "delete"},
 *     collectionOperations={"post"}
 * )
 *
 */
class Place
{
    /**
     * @var int
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     * @ORM\Column(name="place", type="string", length=255, nullable=false)
     * @Groups({"product_get"})
     */
    private $name;

    /**
     * @var string
     * @ORM\Column(name="room", type="string", length=255, nullable=false)
     * @Groups({"product_get"})
     */
    private $room;

    /**
     * @var ArrayCollection
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
