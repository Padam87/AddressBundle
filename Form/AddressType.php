<?php

namespace Padam87\AddressBundle\Form;

use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\AbstractType;

/**
 * Default form type for the Address entity
 */
class AddressType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('country', 'country', array(
        ));
        $builder->add('state', 'text', array(
            'required' => false
        ));
        $builder->add('zipcode', 'text', array(
            'required' => false
        ));
        $builder->add('city', 'text', array(
        ));
        $builder->add('street', 'text', array(
        ));

        parent::buildForm($builder, $options);
    }

    public function getDefaultOptions(array $options)
    {
        return array(
            'data_class' => 'Padam87\AddressBundle\Entity\Address',
        );
    }

    public function getName()
    {
        return 'address';
    }
}
