<?php

namespace AYM\ApiBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Tag
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="AYM\ApiBundle\Entity\TagRepository")
 */
class Tag extends AbstractTaxonomyTerm
{
	/**
     * @ORM\OneToOne(targetEntity="Tag")
     * @ORM\JoinColumn(name="tag_id", referencedColumnName="id")
     **/
    private $parentTag;

    /**
     * Set parentTag
     *
     * @param \AYM\ApiBundle\Entity\Tag $parentTag
     * @return Tag
     */
    public function setParentTag(Tag $parentTag = null)
    {
        $this->parentTag = $parentTag;

        return $this;
    }

    /**
     * Get parentTag
     *
     * @return \AYM\ApiBundle\Entity\Tag 
     */
    public function getParentTag()
    {
        return $this->parentTag;
    }
}
