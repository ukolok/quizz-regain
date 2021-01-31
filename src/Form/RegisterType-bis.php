<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Mime\Email;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;

class RegisterType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('titre', HiddenType::class, [
                'data' => 'Ceci est un titre',
                'mapped' => false,
                'label_attr' => [
                    "class" => "titre-quizz-custom"
                ]
            ])

            ->add('agreement', ChoiceType::class, [
                'label' => 'Accord',
                'choices' => [
                    'Peut-être' => null,
                    'Non'       => true,
                    'Oui'       => false,
                ],
                'multiple' => false,
                'expanded' => true,
                'attr' => [
                    'class' => 'form-check form-check-inline reponses-bloc-quizz'
                ]
            ])
            ->add('titre2', HiddenType::class, [
                'data' => 'Ceci est un sous-titre',
                'mapped' => false,
                'label_attr' => [
                    "class" => "sous-titre-quizz-custom"
                ]
            ])
            ->add('wishes', ChoiceType::class, [
                'label' => 'Souhait',
                'choices' => [
                    'Un peu' => null,
                    'Beaucoup'       => false,
                    'Pas du tout'       => false,
                ],
                'multiple' => false,
                'expanded' => true,
                'attr' => [
                    'class' => 'form-check form-check-inline reponses-bloc-quizz'
                ]
            ])
            ->add('firstname', TextType::class, [
                'label' => 'Prénom',
                'attr'  => [
                    'placeholder' => 'Merci de saisir votre prénom'
                ]
            ])

            ->add('lastname', TextType::class, [
                'label' => 'Nom',
                'attr'  => [
                    'placeholder' => 'Merci de saisir votre nom'
                ]
            ])
            ->add('email', EmailType::class, [
                'label' => 'Email',
                'attr' => [
                    'placeholder' => 'Merci de saisir votre adresse email'
                ]
            ])
            ->add('password', RepeatedType::class, [
                'label' => 'Mot de Passe',
                'type' => PasswordType::class,
                'invalid_message' => 'Les mots de passe doivent être identiques.',
                'required' => true,
                'first_options' => ['label' => 'Mot de passe'],
                'second_options' => ['label' => 'Confirmez votre mot de passe'],
                'attr' => [
                    'placehoder' => 'Merci de saisir un mot de passe'
                ]
            ])

            ->add('submit', SubmitType::class, [
                'label' => 'S\'inscrire'
            ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
