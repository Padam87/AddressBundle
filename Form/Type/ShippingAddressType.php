<?php

namespace Padam87\AddressBundle\Form\Type;

use Padam87\AddressBundle\Entity\Embeddables\ShippingAddress;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ShippingAddressType extends AddressType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('recipient')
        ;

        parent::buildForm($builder, $options);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver
            ->setDefaults(
                [
                    'data_class' => ShippingAddress::class
                ]
            )
        ;
    }
}
