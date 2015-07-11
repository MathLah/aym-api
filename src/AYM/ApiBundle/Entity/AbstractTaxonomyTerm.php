<?php

namespace AYM\ApiBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * AbstractTaxonomyTerm
 *
 * @ORM\MappedSuperclass
 */
class AbstractTaxonomyTerm extends BaseEntity
{

    /**
     * @var string
     *
     * @ORM\Column(name="title", type="string", length=255)
     */
    private $title;

    /**
     * Set title
     *
     * @param string $title
     * @return AbstractTaxonomyTerm
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title
     *
     * @return string 
     */
    public function getTitle()
    {
        return $this->title;
    }
}
