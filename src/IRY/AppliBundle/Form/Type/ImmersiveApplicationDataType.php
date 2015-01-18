<?php

namespace IRY\AppliBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use IRY\AppliBundle\Entity\ImmersiveApplicationData;

class ImmersiveApplicationDataType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('name', 'text')
            ->add('type', 'text')
            // ->add('type', 'choice', array(
            //     'multiple' => false,
            //     'choices' => array(
            //         ImmersiveApplicationData::TYPE_HELICOPTER
            //     )
            // ))
            ->add('data', 'collection', array(
                'allow_add' => true,
            ));
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
	{
	    $resolver->setDefaults(array(
	        'data_class' => 'IRY\AppliBundle\Entity\ImmersiveApplicationData',
            'csrf_protection' => false,
	    ));
	}

    public function getName()
    {
        return 'immersiveapplicationdata';
    }
}
