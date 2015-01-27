<?php

namespace IRY\AppliBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Symfony\Component\Form\Extension\Core\DataTransformer\DateTimeToStringTransformer;

class CourseType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('name', 'text')
            ->add('serie', 'entity', array(
                'class' => 'IRYAppliBundle:Serie',
                'property' => 'name',
            ))
            ->add('subTheme', 'entity', array(
                'class' => 'IRYAppliBundle:SubTheme',
                'property' => 'name',
            ))
            ->add('typeCourse', 'entity', array(
                'class' => 'IRYAppliBundle:TypeCourse',
                'property' => 'name',
            ));
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
	{
	    $resolver->setDefaults(array(
	        'data_class' => 'IRY\AppliBundle\Entity\Course',
            'csrf_protection' => false,
	    ));
	}

    public function getName()
    {
        return 'course';
    }
}
