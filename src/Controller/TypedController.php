<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class TypedController extends AbstractController {

    #[Route('/typed', name: 'app_typed')]
    public function index(): Response {
        return $this->render('typed/index.html.twig');
    }

}
