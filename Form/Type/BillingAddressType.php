<?php

namespace Padam87\AddressBundle\Form\Type;

use Padam87\AddressBundle\Entity\Embeddables\BillingAddress;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class BillingAddressType extends AddressType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('recipient')
            ->add('vatin')
        ;

        parent::buildForm($builder, $options);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver
            ->setDefaults(
                [
                    'data_class' => BillingAddress::class,
                ]
            )
        ;
    }
}
