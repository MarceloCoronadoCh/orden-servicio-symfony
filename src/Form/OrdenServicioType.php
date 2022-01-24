<?php

namespace App\Form;

use App\Entity\OrdenServicio;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\DateTime;

class OrdenServicioType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('numeroOrden')
            ->add('fechaOrden', DateType::class,[
                'widget'=> 'single_text'
            ])
            ->add('cliente')
            ->add('tecnicoEncargado')
            ->add('ordenServicio', CollectionType::class,[
                'entry_type'=> DetalleOrdenType::class,
                'entry_options' =>['label'=>false,
                'allow_add' => true,
                'allow_delete' =>true,
                'by_reference' =>false]

            ])
            
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => OrdenServicio::class,
        ]);
    }
}
