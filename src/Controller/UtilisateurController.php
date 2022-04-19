<?php

namespace App\Controller;

use App\Entity\User;
use App\Repository\UserRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class UtilisateurController extends AbstractController
{
    /**
     * @Route("/utilisateur", name="app_utilisateur")
     */
    public function index(): Response
    {
   
        return $this->render('utilisateur/index.html.twig');
    }

    /**
     * @Route("/uti", name="app_utilisateurk")
     */
    public function user(UserRepository $user)
    {
        $users = $user->findAll();

        $data = array();
        foreach ($users as $key => $value) {
            $data[$key]['nom'] = $value->getNom();
            $data[$key]['prenom'] = $value->getPrenom();
            $data[$key]['email'] = $value->getEmail();
            $data[$key]['id'] = $value->getId();
        }
        dump($users);
        return new JsonResponse($data);
    }

    /**
    * @Route("/utilisateur/{id}/delete", name="app_user_delete", methods={"POST"})
    */
    public function deleteUser(Request $request, User $user, UserRepository $userRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$user->getId(), $request->request->get('_token'))) {
            $userRepository->remove($user);
        }

        return $this->redirectToRoute('app_utilisateur', [], Response::HTTP_SEE_OTHER);
    }
}
