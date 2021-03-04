<?php

namespace App\Form;

use App\Entity\employe;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;


class EmployeType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('idemp')
            ->add('nomemp')
            ->add('prenomemp')
            ->add('numtelemp')
            ->add('adresseemp', EmailType::class)
            -> add ( 'submit' , SubmitType::class );
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => employe::class,
        ]);
    }
}
