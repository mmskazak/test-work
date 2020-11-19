<?php

namespace App\Form;

use App\Entity\Address;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class AddressType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('street')
            ->add('house')
            ->add('appartment')
            ->add('client', 'Symfony\Bridge\Doctrine\Form\Type\EntityType', array(
                'class' => 'App\Entity\Client',
                'choice_label' => 'name',
            ))
            ->add('city', 'Symfony\Bridge\Doctrine\Form\Type\EntityType', array(
                'class' => 'App\Entity\City',
                'choice_label' => 'title',
            ))
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Address::class,
        ]);
    }
}
