<?php

namespace App\Controller;

use App\Repository\StatusRepository;
use App\Repository\TaskRepository;
use DateTime;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    /**
     * @Route("/home", name="app_home")
     */
    public function index(TaskRepository $repoTask, StatusRepository $repoStatut): Response
    {
        $statut_tache_user = $repoStatut->find(2);
        $statut_tache_user_termine = $repoStatut->find(3);
        $user = $this->getUser();
        $tache_en_cours_user = $repoTask->CountTask($user,$statut_tache_user);
        $tache_termine_user = $repoTask->CountTaskFinished($user,$statut_tache_user_termine);
        // $tache_terminer_user = $repoTask;
        $role_user = $this->getUser()->getRoles();
        $date = new DateTime();
        $mois = $date->format('M');
        $jour = $date->format('d');
        $annee = $date->format('Y');

        return $this->render('home/index.html.twig', [
            'controller_name' => 'HomeController',
            'nb_task' => count($tache_en_cours_user),
            'nb_task_finished' => count($tache_termine_user),
            'role' => $role_user[0],
            'mois' => $mois,
            'jour' => $jour,
            'annee' => $annee,
        ]);
    }
}
