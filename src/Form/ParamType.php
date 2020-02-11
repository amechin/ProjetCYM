<?php

namespace App\Form;

use App\Entity\Duree;
use App\Entity\Groupe;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

class ParamType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('duree', EntityType::class, [

            'class' => Duree::class,
            'choice_label' => 'duree',
            'expanded' => 'false',

        ])
            ->add('groupe', EntityType::class, [
                'class' => Groupe::class,
                'choice_label' => 'groupe',
                'expanded' => 'false',
            ])
            ->getForm();
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            // Configure your form options here
        ]);
    }
}
