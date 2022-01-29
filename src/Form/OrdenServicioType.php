<?php

namespace App\Form;

use App\Entity\Cliente;
use App\Entity\Equipo;
use App\Entity\OrdenServicio;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
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
            ->add('fechaIngreso', DateType::class, [
                'widget' => 'single_text',
            ])
            ->add('fechaSalida', DateType::class, [
                'widget' => 'single_text',
                'required' => false,
            ])
            ->add('numeroOrden')
            ->add('clienteOrden', EntityType::class, [
                'class' => Cliente::class,
                'choice_label' => 'rucAndNombreApellidos',
            ])
            ->add('equipo', EntityType::class, [
                'class' => Equipo::class,
            ])
            ->add('estadoOrden')
            ->add('tecnicoOrden')
            ->add('precio')
            ->add('detalles', CollectionType::class, [
                'entry_type' => DetalleOrdenType::class,
                'entry_options' => ['label' => false],
                'allow_add' => true,
                'allow_delete' => true,
                'by_reference' => false,
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
