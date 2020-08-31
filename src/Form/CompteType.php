<?php

namespace App\Form;

use App\Entity\Compte;

use App\Entity\Client;
use App\Entity\Entreprise;
use App\Entity\Typecompte;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
class CompteType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('solde', TextType :: class, [
                "attr" => [
                    "class" => "form-control",
                    "id" => "solde",
                    "value" => 10000
                ]
            ])
            ->add('agios', TextType :: class, [
                "attr" => [
                    "class" => "form-control",
                    "id" => "solde",
                    "value" => 150000,
                    "readonly" => true,
                ]
            ])
            ->add('remuneration', TextType :: class, [
                "attr" => [
                    "class" => "form-control",
                    "id" => "remuneration",
                    "value" => 150000,
                    "readonly" => true,
                ]
            ])
            ->add('fraisOuverture', TextType :: class, [
                "attr" => [
                    "class" => "form-control",
                    "id" => "fraisOuverture",
                    "value" => 150000,
                    "readonly" => true,
                ]
            ])
            ->add('dateDebut', DateType :: class, [
                "attr" => [
                    "class" => "form-control",
                    "id" => "dateDebut",
                    'required ' => false
                ]
            ])
            ->add('dateFin', DateType :: class, [
                "attr" => [
                    "class" => "form-control",
                    "id" => "dateFIn",
                    'required ' => false
                ]
            ])
            ->add('client', EntityType::class, [
                'class' => Client::class,
                'placeholder' => 'selectionrer',
                'attr' => array(
                    'class' => 'form-control ',
                    'id' => 'client_id'
                )
            ])
            ->add('entreprise', EntityType::class, [
                'class' => Entreprise::class,
                'placeholder' => 'selectionrer',

                'attr' => array(
                    'class' => 'form-control ',
                    'id' => 'entreprise_id',
                    'required ' => 'none'
                )
            ])
            ->add('typecompte', EntityType::class, [
                'class' => Typecompte::class,
                'placeholder' => 'selectionrer',
                'attr' => array(
                    'class' => 'form-control ',
                    'id' => 'entreprise_id',
                    
                )
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Compte::class,
        ]);
    }
}
