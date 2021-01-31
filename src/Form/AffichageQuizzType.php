<?php

namespace App\Form;


use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;


class AffichageQuizzType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {

        $qcm = $options['qcm'];
        $goingon = $options['goingon'];

        $i = 0;
        // dd($qcm);
        foreach ($qcm as $questions) {
            //Testing the ControlType to display
            if ($questions["listeAffichage"]["name"] == 'Liste') {

                $listeChoice = array();
                $reponses = $questions["reponses"];

                foreach ($reponses as $reponse) {
                    $listeChoice[$reponse['name']] =  $reponse['id'];
                }
                $builder->add(
                    'q' . $questions['id'],
                    ChoiceType::class,
                    [
                        'label' => $questions["name"],
                        'multiple' => false,
                        'expanded' => true,
                        'choices' => $listeChoice,
                        'mapped' => false,
                        'allow_extra_fields' => true,
                        'required' => true,
                        'attr' => [
                            'class' => 'form-check form-check-inline reponses-bloc-quizz',
                        ],
                        'help' => ''
                    ]
                );
            };
            if ($questions["listeAffichage"]["name"] == 'Titre') {
                $builder->add('titre' . $questions['id'], ChoiceType::class, [
                    'label' => $questions["name"],
                    'mapped' => false,
                    'label_attr' => [
                        "class" => "titre-quizz-custom"
                    ],
                    'multiple' => false,
                    'expanded' => true,
                ]);
            }
            if ($questions["listeAffichage"]["name"] == 'Sous-Titre') {
                $builder->add('soustitre' . $questions['id'], ChoiceType::class, [
                    'label' => $questions["name"],
                    'mapped' => false,
                    'label_attr' => [
                        "class" => "sous-titre-quizz-custom"
                    ],
                    'multiple' => false,
                    'expanded' => true,

                ]);
            }
            $i++;
        }

        if ($goingon) {
            $builder->add('submit', SubmitType::class, [
                'label' => 'Poursuivre vers "' . $goingon->getName() . '"',
                'attr' => [
                    'class' => 'btn btn-primary mt-5 ml-5'
                ],
            ]);
        } else {
            $builder->add('submit', SubmitType::class, [
                'label' => 'Valider'
            ]);
        };
    }


    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'qcm' => array(),
            'goingon' => array(),
            'section_name' => array()

        ]);
    }
}
