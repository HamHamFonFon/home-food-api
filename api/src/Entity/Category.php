<?php


namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * Class Category
 * @package App\Entity
 *
 * @ORM\Table(name="categories")
 * @ORM\Entity
 * @ApiResource(
 *     attributes={
 *           "normalizationContext"={"groups"={"category_get"}},
 *          "denormalizationContext"={"groups"={"category_write"}}
 *      },
 *      itemOperations={
 *          "get",
 *          "put",
 *          "delete"
 *      },
 *      collectionOperations={"get", "post"}
 * )
 */
class Category
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
     * @ORM\Column(name="name", type="string", length=255, nullable=false)
     * @Groups({"product_get"})
     */
    private $name;

    /**
     * @var MainCategory
     * @ORM\ManyToOne(targetEntity="MainCategory", inversedBy="category")
     * @ORM\JoinColumn(name="main_category_id", referencedColumnName="id")
     * @Groups({"product_get"})
     */
    private $mainCategory;

    /**
     * @var ArrayCollection
     * @ORM\OneToMany(targetEntity="Product", mappedBy="category")
     */
    private $product;

    /**
     * Category constructor.
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
     * @return Category
     */
    public function setId(int $id): Category
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
     * @return Category
     */
    public function setName(string $name): Category
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getMainCategory()
    {
        return $this->mainCategory;
    }

    /**
     * @param MainCategory $mainCategory
     *
     * @return Category
     */
    public function setMainCategory(MainCategory $mainCategory): Category
    {
        $this->mainCategory = $mainCategory;
        return $this;
    }

    /**
     * @return Product
     */
    public function getProduct(): Product
    {
        return $this->product;
    }

    /**
     * @param Product $product
     *
     * @return Category
     */
    public function setProduct(Product $product): Category
    {
        $this->product = $product;
        return $this;
    }

}
