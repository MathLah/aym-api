<?php

namespace AYM\ApiBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Link
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="AYM\ApiBundle\Entity\LinkRepository")
 */
class Link extends BaseEntity
{
    /**
     * @var string
     *
     * @ORM\Column(name="url", type="string", length=2048)
     */
    private $url;
    
    /**
     * @ORM\ManyToOne(targetEntity="Category")
     * @ORM\JoinColumn(name="category_id", referencedColumnName="id")
     */
    private $category;
    
    /**
     * @ORM\ManyToMany(targetEntity="Tag")
     * @ORM\JoinTable(
     *      name = "links_tags",
     *      joinColumns = {@ORM\JoinColumn(name = "link_id", referencedColumnName = "id")},
     *      inverseJoinColumns = {@ORM\JoinColumn(name = "tag_id", referencedColumnName = "id")}
     * )
     */
    private $tags;
    
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->tags = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Set url
     *
     * @param string $url
     * @return Link
     */
    public function setUrl($url)
    {
        $this->url = $url;

        return $this;
    }

    /**
     * Get url
     *
     * @return string 
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * Set category
     *
     * @param \AYM\ApiBundle\Entity\Category $category
     * @return Link
     */
    public function setCategory(\AYM\ApiBundle\Entity\Category $category = null)
    {
        $this->category = $category;

        return $this;
    }

    /**
     * Get category
     *
     * @return \AYM\ApiBundle\Entity\Category 
     */
    public function getCategory()
    {
        return $this->category;
    }

    /**
     * Add tags
     *
     * @param \AYM\ApiBundle\Entity\Tag $tags
     * @return Link
     */
    public function addTag(\AYM\ApiBundle\Entity\Tag $tags)
    {
        $this->tags[] = $tags;

        return $this;
    }

    /**
     * Remove tags
     *
     * @param \AYM\ApiBundle\Entity\Tag $tags
     */
    public function removeTag(\AYM\ApiBundle\Entity\Tag $tags)
    {
        $this->tags->removeElement($tags);
    }

    /**
     * Get tags
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getTags()
    {
        return $this->tags;
    }
}
