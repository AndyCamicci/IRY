<?php

namespace IRY\AppliBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Symfony\Component\Form\Extension\Core\DataTransformer\DateTimeToStringTransformer;
use IRY\AppliBundle\Entity\Helicopter;

class HelicopterType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('name', 'text')
            ->add('type', 'choice', array(
                'choices'   => array(
                    Helicopter::TYPE_MILITARY => Helicopter::TYPE_MILITARY, 
                    Helicopter::TYPE_CIVIL => Helicopter::TYPE_CIVIL
                )))
            ->add('imgHelico', 'text')
            ->add('submit', 'submit');
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
	{
	    $resolver->setDefaults(array(
	        'data_class' => 'IRY\AppliBundle\Entity\Helicopter',
            'csrf_protection' => false,
	    ));
	}

    public function getName()
    {
        return 'helicopter';
    }
}
