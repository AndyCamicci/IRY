<?php

namespace IRY\AppliBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use IRY\AppliBundle\Entity\ImmersiveMovie;
use IRY\AppliBundle\Entity\CourseRepository;

class ImmersiveMovieType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('name', 'text')
            ->add('course', 'entity',array(
                'class'=>'IRYAppliBundle:Course',
                'property'=>'fullName',
                'query_builder' => function(CourseRepository $er) {
                    return $er->createQueryBuilder('c')
                    ->where('c.typeCourse = 3');
                }))
            ->add('file', 'file')
            ->add('save', 'submit');
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'IRY\AppliBundle\Entity\ImmersiveMovie',
        ));
    }

    public function getName()
    {
        return 'immersiveMovie';
    }
}
