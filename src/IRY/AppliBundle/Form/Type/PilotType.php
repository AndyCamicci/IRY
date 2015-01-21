<?php

namespace IRY\AppliBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Symfony\Component\Form\Extension\Core\DataTransformer\DateTimeToStringTransformer;

class PilotType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('name', 'text')
            ->add('isCalling', 'checkbox')
            ->add('dateCalling', 'date')->addViewTransformer(new DateTimeToStringTransformer())
            ->add('serie', 'entity', array(
                'class' => 'IRYAppliBundle:Serie',
                'property' => 'name',
            ));
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
	{
	    $resolver->setDefaults(array(
	        'data_class' => 'IRY\AppliBundle\Entity\Pilot',
            'csrf_protection' => false,
	    ));
	}

    public function getName()
    {
        return 'pilot';
    }
}
