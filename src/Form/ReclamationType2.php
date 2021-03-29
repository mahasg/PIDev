<?php

namespace App\Form;

use App\Entity\Reclamation;
use Doctrine\DBAL\Types\TextType;
use Symfony\Component\Form\AbstractType;;

use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
class ReclamationType2 extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {

        $builder
            ->add('description',TextareaType::class)
           // ->add('typeReclamation',ChoiceType::class,['choices'=>$choices1,
             //   'expanded'=>false,
               // 'label'=>'Type Reclamation:',])
            ->add('Field', ChoiceType::class, ['choices'=>[
                        'cinema' => 'cinema',
                        'resto' => 'resto',
                        'parking' => 'parking',
                        'autre' => 'autre',
                   ]
               ]
           )
            ->add('abonne')






        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Reclamation::class,
        ]);
    }

    public function getBlockPrefix()
    {
        return 'reclamation';
    }
}
