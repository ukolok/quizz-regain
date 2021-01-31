<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class QuizzOutController extends AbstractController
{
    /**
     * @Route("questionnaire/end", name="quizzout")
     */
    public function index(): Response
    {
        return $this->render('quizz_out/index.html.twig', [
            'controller_name' => 'QuizzOutController',
        ]);
    }
}
