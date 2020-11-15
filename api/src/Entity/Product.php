<?php


namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * Class Product
 * @ORM\Table(
 *      name="products",
 *      indexes={@ORM\Index(name="product_idx", columns={"id", "name"})}
 * )
 * @ORM\Entity
 * @package App\Entity
 *
 * @ApiResource(
 *      attributes={
 *          normalizationContext={"groups"={"product_get"}},
 *          denormalizationContext={groups={"product_put", "product_post"}}
 *     },
 *      itemOperations={
 *          "get",
 *          "put",
 *          "post",
 *          "delete"
 *      },
 *      collectionOperations={"get"}
 * )
 */
class Product
{

    /**
     * @var integer
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     * @Groups({"product_get"})
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
     * @ORM\JoinColumn(name="place_id", referencedColumnName="id")
     */
    private $place;

    /**
     * @var
     * @ORM\ManyToOne(targetEntity="Category", inversedBy="product", cascade={"persist"})
     * @ORM\JoinColumn(name="category_id", referencedColumnName="id")
     */
    private $category;

    /**
     * @var \DateTimeInterface
     * @ORM\Column(name="dlc", type="datetime", nullable=true)
     */
    private $dlc;


    /**
     * @var \DateTimeInterface
     * @ORM\Column(name="dluo", type="datetime", nullable=true)
     */
    private $dluo;

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
     * @return Product
     */
    public function setId(int $id): Product
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
     * @return Product
     */
    public function setName(string $name): Product
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return int
     */
    public function getAmount(): int
    {
        return $this->amount;
    }

    /**
     * @param int $amount
     *
     * @return Product
     */
    public function setAmount(int $amount): Product
    {
        $this->amount = $amount;
        return $this;
    }

    /**
     * @return Place
     */
    public function getPlace(): Place
    {
        return $this->place;
    }

    /**
     * @param Place $place
     *
     * @return Product
     */
    public function setPlace(Place $place): Product
    {
        $this->place = $place;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getCategory()
    {
        return $this->category;
    }

    /**
     * @param mixed $category
     *
     * @return Product
     */
    public function setCategory($category)
    {
        $this->category = $category;
        return $this;
    }

    /**
     * @return \DateTimeInterface
     */
    public function getDlc(): \DateTimeInterface
    {
        return $this->dlc;
    }

    /**
     * @param \DateTimeInterface $dlc
     *
     * @return Product
     */
    public function setDlc(\DateTimeInterface $dlc): Product
    {
        $this->dlc = $dlc;
        return $this;
    }

    /**
     * @return \DateTimeInterface
     */
    public function getDluo(): \DateTimeInterface
    {
        return $this->dluo;
    }

    /**
     * @param \DateTimeInterface $dluo
     *
     * @return Product
     */
    public function setDluo(\DateTimeInterface $dluo): Product
    {
        $this->dluo = $dluo;
        return $this;
    }

    /**
     * @return \DateTimeInterface
     */
    public function getCreatedAt(): \DateTimeInterface
    {
        return $this->createdAt;
    }

    /**
     * @param \DateTimeInterface $createdAt
     *
     * @return Product
     */
    public function setCreatedAt(\DateTimeInterface $createdAt): Product
    {
        $this->createdAt = $createdAt;
        return $this;
    }

    /**
     * @return \DateTimeInterface
     */
    public function getUpdatedAt(): \DateTimeInterface
    {
        return $this->updatedAt;
    }

    /**
     * @param \DateTimeInterface $updatedAt
     *
     * @return Product
     */
    public function setUpdatedAt(\DateTimeInterface $updatedAt): Product
    {
        $this->updatedAt = $updatedAt;
        return $this;
    }

}
