<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ChangeLocaleController extends AbstractController
{
    /**
     * @Route("/change_locale/{locale}", name="app_change_locale")
     */
    public function ChangeLocale($locale, Request $request)
    {

        // stoker la langue demandée dans la session
        $request->getSession()->set('_locale', $locale);

        return $this->redirect($request->headers->get('referer'));
    }
}
