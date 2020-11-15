<?php


namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * Class MainCategory
 * @package App\Entity
 * @ORM\Table(name="main_category")
 */
class MainCategory
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
     * @ORM\Column(name="name", type="string", nullable=false)
     * @Groups({"product_get"})
     */
    private $name;

    /**
     * @var ArrayCollection
     * @ORM\OneToMany(targetEntity="Category", mappedBy="mainCategory")
     */
    private $category;

    /**
     * MainCategory constructor.
     */
    public function __construct()
    {
        $this->category = new ArrayCollection();
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
     * @return MainCategory
     */
    public function setId(int $id): MainCategory
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
     * @return MainCategory
     */
    public function setName(string $name): MainCategory
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return ArrayCollection
     */
    public function getCategory(): ArrayCollection
    {
        return $this->category;
    }

    /**
     * @param ArrayCollection $category
     *
     * @return MainCategory
     */
    public function setCategory(ArrayCollection $category): MainCategory
    {
        $this->category = $category;
        return $this;
    }


}
