<?php

namespace ProjetNormandie\ComptaBundle\Repository;

use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\Query\ResultSetMappingBuilder;
use Doctrine\Persistence\ManagerRegistry;
use ProjetNormandie\ComptaBundle\Entity\Donation;

class DonationRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Donation::class);
    }

    public function getDonors()
    {
        $rsm = new ResultSetMappingBuilder($this->_em);
        $rsm->addRootEntityFromClassMetadata('ProjetNormandie\ComptaBundle\Entity\UserInterface', 'u');
        $query = $this->_em->createNativeQuery(
            "SELECT distinct user.id, user.username, user.avatar, user.slug 
            FROM cpt_donation INNER JOIN user ON cpt_donation.idUser = user.id ORDER BY user.id DESC",
            $rsm
        );

        return $query->getResult();
    }
}
