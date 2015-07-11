<?php

namespace AYM\ApiBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Link
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="AYM\ApiBundle\Entity\LinkRepository")
 */
class Link
{
    /**
     * @var string
     *
     * @ORM\Column(name="url", type="string", length=2048)
     */
    private $url;

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
}
