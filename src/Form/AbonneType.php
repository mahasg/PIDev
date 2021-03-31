<?php

namespace App\Form;

use App\Entity\Abonne;
use Doctrine\DBAL\Types\DateType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;


class AbonneType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nomabonne')
            ->add('prenomabonne')
            ->add('mailabonne')
            ->add('datenaissabonne', \Symfony\Component\Form\Extension\Core\Type\DateType::class, array(
                'data' => new \DateTime("now"),'years' => range(1920,date('Y'))))
            ->add('telephoneabonne')
            ->add('password', PasswordType::class)
        ->add('confirm_password',PasswordType::class);
            #-> add ( 'submit' , SubmitType::class ) ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Abonne::class,
        ]);
    }

}
