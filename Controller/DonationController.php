<?php

namespace ProjetNormandie\ComptaBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

class DonationController extends AbstractController
{
    /**
     * @return mixed
     */
    public function donors()
    {
        return $this->getDoctrine()->getRepository('ProjetNormandieComptaBundle:Donation')
            ->getDonors();
    }
}