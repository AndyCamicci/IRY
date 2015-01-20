<?php

namespace IRY\AppliBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class SerieType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('name', 'text');
            // ->add('save', 'submit');
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
	{
	    $resolver->setDefaults(array(
	        'data_class' => 'IRY\AppliBundle\Entity\Serie',
            'csrf_protection' => false,
	    ));
	}

    public function getName()
    {
        return 'serie';
    }
}
