<?php

namespace App\Form;

use App\Entity\EquipoMarca;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class EquipoMarcaType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nombreMarca', TextType::class,[
                'label' => 'Nombre',
                'attr'=> ['placeholder' => 'Ingrese un Nombre']
            ])
            ->add('detalle', TextType::class,[
                'required'=>false,
                'label'=>'Detalle',
                'attr'=> ['placeholder' => 'Ingrese un Detalle']

            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => EquipoMarca::class,
        ]);
    }
}
