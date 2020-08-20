<?php

namespace App\Form;

use App\Entity\Client;
use App\Entity\Entreprise;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType as TypeDateType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class ClientType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nom', TextType :: class, [
                "attr" => [
                    "class" => "form-control",
                    "id" => "nom"
                ]
            ])
            ->add('prenom', TextType :: class, [
                "attr" => [
                    "class" => "form-control",
                    "id" => "prenom"
                ]
            ])
            ->add('salaire', NumberType :: class, [
                "attr" => [
                    "class" => "form-control",
                    "id" => "salaire",
                    'required'=> false
                ]
            ])
            
            ->add('cni', TextType :: class, [
                "attr" => [
                    "class" => "form-control",
                    "id" => "cni"
                ]
            ])
            ->add('sexe', TextType :: class, [
                "attr" => [
                    "class" => "form-control",
                    "id" => "sexe"
                ]
            ])
            ->add('dateNaiss', TypeDateType :: class, [
                "attr" => [
                    "class" => "form-control",
                    "id" => "dateNaiss"
                ]
            ])
            ->add('telephone', TextType :: class, [
                "attr" => [
                    "class" => "form-control",
                    "id" => "telephone"
                ]
            ])
            ->add('adresse', TextType :: class, [
                "attr" => [
                    "class" => "form-control",
                    "id" => "adresse"
                ]
            ])
            ->add('email', EmailType :: class, [
                "attr" => [
                    "class" => "form-control",
                    "id" => "email"
                ]
            ])
            
            ->add(
                'entreprise', EntityType::class, [
                    'class' => Entreprise::class,
                    'attr' => array(
                        'class' => 'form-control ',
                        'id' => 'entreprise_id'
                    )
                ]
            )
            // ->add('login')
            // ->add('password')
          
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Client::class,
        ]);
    }
}
