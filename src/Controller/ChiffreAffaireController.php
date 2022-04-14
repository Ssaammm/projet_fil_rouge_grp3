<?php

namespace App\Controller;

use App\Entity\ChiffreAffaire;
use App\Repository\ChiffreAffaireRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ChiffreAffaireController extends AbstractController
{
    /**
     * @Route("/chiffre_affaire", name="app_chiffre_affaire")
     */
    public function chiffreAffaire(ChiffreAffaireRepository $ChiffreAffaire, EntityManagerInterface $manager): Response
    {
        $chiffre = $ChiffreAffaire->find(1);

        $chiffre->setTotalPetite($chiffre->getNbPetite()*1000);
        $chiffre->setTotalMoyen($chiffre->getNbMoyen()*2500);
        $chiffre->setTotalGrande($chiffre->getNbGrande()*10000);

        $totalChiffre = $chiffre->getNbPetite()+$chiffre->getNbMoyen()+$chiffre->getNbGrande();
        $chiffre->setPourcPetite(number_format((($chiffre->getNbPetite()/$totalChiffre)*100),2));
        $chiffre->setPourcMoyen(($chiffre->getNbMoyen()/$totalChiffre)*100);
        $chiffre->setPourcGrande(($chiffre->getNbGrande()/$totalChiffre)*100);

        $manager->persist($chiffre);
        $manager->flush($chiffre);

        $totalAffaire = $chiffre->getTotalPetite()+$chiffre->getTotalMoyen()+$chiffre->getTotalGrande();

        return $this->render('chiffre_affaire/index.html.twig', [
            'chiffre' => $chiffre,
            'totalAffaire' => $totalAffaire,
            

        ]);
    }
}
