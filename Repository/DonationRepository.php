<?php

namespace ProjetNormandie\ComptaBundle\Repository;

use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\Query\ResultSetMappingBuilder;

class DonationRepository extends EntityRepository
{
    public function getDonors()
    {
        $rsm = new ResultSetMappingBuilder($this->_em);
        $rsm->addRootEntityFromClassMetadata('ProjetNormandie\ComptaBundle\Entity\UserInterface', 'u');
        $query = $this->_em->createNativeQuery("SELECT distinct user.id, user.username, user.avatar FROM cpt_donation INNER JOIN user ON cpt_donation.idUser = user.id ORDER BY user.id DESC", $rsm);

        return $query->getResult();
    }
}