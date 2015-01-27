<?php

namespace IRY\AppliBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Symfony\Component\Form\Extension\Core\DataTransformer\DateTimeToStringTransformer;

class StepType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('name', 'text')
            ->add('btn_name', 'text')
            ->add('btn_state', 'text')
            ->add('theOrder', 'text')
            ->add('course', 'entity', array(
                'class' => 'IRYAppliBundle:Course',
                'property' => 'name',
            ));
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
	{
	    $resolver->setDefaults(array(
	        'data_class' => 'IRY\AppliBundle\Entity\Step',
            'csrf_protection' => false,
	    ));
	}

    public function getName()
    {
        return 'step';
    }
}
