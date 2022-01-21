<?php

namespace App\Form;

use App\Entity\DetalleOrden;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class DetalleOrdenType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('fechaIngreso')
            ->add('fechaEntrega')
            ->add('observacion')
            ->add('equipoDetalleOrden')
            ->add('tipoServicioDetalleOrden')
            ->add('ordenServicio')
            ->add('estadoDetalleOrden')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => DetalleOrden::class,
        ]);
    }
}
