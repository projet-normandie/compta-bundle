<?php

namespace ProjetNormandie\ComptaBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

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
