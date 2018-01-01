<?php

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Categorie
 *
 * @ORM\Table(name="blog_categories")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\Blog\CategoriesRepository")
 */
class Categorie
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="Name", type="string", length=255)
     */
    private $name;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Expense", mappedBy="category")
     */
    private $expenses;

    public function __construct()
    {
        $this->expenses = new ArrayCollection();
    }

    /**
     * @return mixed
     */
    public function getExpenses()
    {
        return $this->expenses;
    }

    /**
     * @param mixed $expenses
     */
    public function setExpenses($expenses)
    {
        $this->expenses = $expenses;
    }

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set name
     *
     * @param string $name
     * @return Categorie
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName()
    {
        return $this->name;
    }
}
