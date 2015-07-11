<?php

namespace AYM\ApiBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Category
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="AYM\ApiBundle\Entity\CategoryRepository")
 */
class Category extends AbstractTaxonomyTerm
{

}
