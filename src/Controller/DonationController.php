<?php

namespace ProjetNormandie\ComptaBundle\Controller;

use ProjetNormandie\ComptaBundle\Repository\DonationRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class DonationController extends AbstractController
{
    private DonationRepository $donationRepository;

    public function __construct(DonationRepository $donationRepository)
    {
        $this->donationRepository = $donationRepository;
    }

    /**
     * @return mixed
     */
    public function donors()
    {
        return $this->donationRepository->getDonors();
    }
}
