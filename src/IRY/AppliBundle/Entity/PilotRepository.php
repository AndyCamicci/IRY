<?php

namespace IRY\AppliBundle\Entity;

use Doctrine\ORM\EntityRepository;

class PilotRepository extends EntityRepository
{
	public function findAllSortedByCall() {
    	$q = $this->createQueryBuilder('r')
	      ->orderBy('r.dateCalling', 'DESC')
          ->getQuery();

    	$results = $q->getResult();
		return $results;

	}
}
