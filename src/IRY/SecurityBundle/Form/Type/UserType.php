<?php

namespace IRY\SecurityBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class UserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('username', 'text')
                ->add('password', 'text')
                ->add('email', 'text')
                ->add('submit', 'submit');
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
	{
	    $resolver->setDefaults(array(
	        'data_class' => 'IRY\SecurityBundle\Entity\User',
            'csrf_protection' => false,
	    ));
	}

    public function getName()
    {
        return 'user';
    }
}
