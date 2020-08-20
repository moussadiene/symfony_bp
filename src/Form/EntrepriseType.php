<?php

namespace App\Form;

use App\Entity\Entreprise;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\TelType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class EntrepriseType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nomEntreprise', TextType :: class, [
                "attr" => [
                    "class" => "form-control",
                    "id" => "nomEntreprise"
                ]
            ])
            ->add('ninea', TextType :: class, [
                "attr" => [
                    "class" => "form-control",
                    "id" => "ninea"
                ]
            ])
            ->add('adresse', TextType :: class, [
                "attr" => [
                    "class" => "form-control",
                    "id" => "adresse"
                ]
            ])
            ->add('telephone', TelType :: class, [
                "attr" => [
                    "class" => "form-control",
                    "id" => "telephone"
                ]
            ])
            ->add('email', EmailType :: class, [
                "attr" => [
                    "class" => "form-control",
                    "id" => "email"
                ]
            ])
            ->add('budget', NumberType :: class, [
                "attr" => [
                    "class" => "form-control",
                    "id" => "budget"
                ]
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Entreprise::class,
        ]);
    }
}
