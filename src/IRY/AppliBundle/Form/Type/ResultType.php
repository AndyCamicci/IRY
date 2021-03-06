<?php

namespace IRY\AppliBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class ResultType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('pilot', "entity", array(
            'class' => 'IRYAppliBundle:Pilot',
            'property' => 'name',
            'required' => false,
        ))
        ->add('step', "entity", array(
            'class' => 'IRYAppliBundle:Step',
            'property' => 'name',
            'required' => false,
        ))
        ->add('isError', "checkbox")
        ->add('trial', "entity", array(
            'class' => 'IRYAppliBundle:Trial',
            'property' => 'id',
            'required' => false,
        ))
        ->add('isFavorite', "checkbox", array(
            'required' => false,
        ))
        ->add('isGlobal', "checkbox", array(
            'required' => false,
        ));

    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
	{
	    $resolver->setDefaults(array(
	        'data_class' => 'IRY\AppliBundle\Entity\Result',
            'csrf_protection' => false,
	    ));
	}

    public function getName()
    {
        return 'result';
    }
}
