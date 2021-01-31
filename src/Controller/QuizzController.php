<?php

namespace App\Controller;


use App\Entity\Sections;
use App\Entity\Questions;
use App\Entity\Resultats;
use App\Form\AffichageQuizzType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class QuizzController extends AbstractController
{
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    /**
     * @Route("/quizz/{slug}", name="quizz")
     */

    public function index(Request $request, $slug)
    {
        $section = $this->entityManager->getRepository(Sections::class)->findOneBySlug($slug);
        $rangeid = $section->getRangeid();
        $sectionid = $section->getId();
        $section_name = $section->getName();
        $section_description = $section->getDescription();
        $section_utilisation = $section->getUtilisation();
        $rangeid++;
        $nextslug = $this->entityManager->getRepository(Sections::class)->findOneBy(['rangeid' => $rangeid]);

        $qcm = $this->entityManager->getRepository(Questions::class)->questions_reponses($sectionid);
        //dd($qcm);
        $nb = count($qcm);

        $form = $this->createForm(AffichageQuizzType::class, null, [
            "qcm" => $qcm,
            "goingon" => $nextslug,
            "section_name" => $section_name
        ]);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $usermail = $this->getUser()->getEmail();
            $userid = $this->getUser()->getId();
            $elements = $form->all();
            $questionsReponses = array();

            foreach ($elements as $element) {
                if ($element->getName() != 'submit') {
                    $resultats = $this->entityManager->getRepository(Resultats::class);
                    $questionsReponses[$element->getName()] =  $element->getViewData();
                    $question = $element->getName();
                    $reponse = $element->getViewData();
                    $resultats = new Resultats();
                    $resultats->setQuestionid($question);
                    $resultats->setAnswerid($reponse);
                    $resultats->setSectionId($sectionid);
                    $resultats->setUserid($usermail);
                    $resultats->setIdusersection($userid . $sectionid);
                    $this->entityManager->persist($resultats);
                    $this->entityManager->flush();
                }
            }
            // redirects to the "homepage" route
            if (!$nextslug) {
                return $this->redirectToRoute('quizzout');
            } else {
                $newslug = $nextslug->getSlug();
                return $this->redirectToRoute('quizz', ['slug' => $newslug]);
            }
        }

        return $this->render('quizz/index.html.twig', [
            'form' => $form->createView(),
            'section_name' => $section_name,
            'section_description' => $section_description,
            'section_utilisation' => $section_utilisation
        ]);
    }
}
