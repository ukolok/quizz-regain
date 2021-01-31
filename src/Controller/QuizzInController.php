<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class QuizzInController extends AbstractController
{
    /**
     * @Route("questionnaire/welcome", name="quizzin")
     */
    public function index(): Response
    {
        return $this->render('quizz_in/index.html.twig');
    }
}
