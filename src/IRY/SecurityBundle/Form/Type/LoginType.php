<?php

namespace IRY\SecurityBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class LoginType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('_username', 'text', array(
                    'attr' => array(
                        'id' => 'username',
                        'placeholder' => 'Username',
                        'value' => 'IRYDemo',
                    )))
                ->add('_password', 'password', array(
                    'attr' => array(
                        'id' => 'password',
                        'placeholder' => 'Password',
                        'value' => 'airbushelicopters',
                    )))
                ->add('serie', 'entity', array(
                    'class' => 'IRY\AppliBundle\Entity\Serie',
                    'property' => 'name',
                    'empty_value' => 'Select your serie',
                ))
                ->add('submit', 'submit');
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'csrf_protection' => false,
        ));
    }

    public function getName()
    {
        return '';
    }
}