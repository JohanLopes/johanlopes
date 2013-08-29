<?php

namespace Johanlopes\CoreBundle\Entity;

use Doctrine\ORM\EntityRepository;

/**
 * CategoryRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class CategoryRepository extends EntityRepository
{
    public function findAllSorted()
    {
        $query = $this->createQueryBuilder('c')
        ->orderBy('c.rank', 'ASC')
        ->getQuery();

        return $query->getResult();
    }
}