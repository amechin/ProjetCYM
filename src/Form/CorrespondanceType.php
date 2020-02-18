<?php

namespace App\Form;

use App\Entity\Correspondance;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CorrespondanceType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('exerciceId')
            ->add('categorie')
            ->add('carte')
            ->add('duree')
            ->add('groupe')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Correspondance::class,
        ]);
    }
}
