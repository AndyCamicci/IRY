<?php

namespace IRY\AppliBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use IRY\AppliBundle\Entity\ImmersiveMovie;

class ImmersiveMovieType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('name', 'text')
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
