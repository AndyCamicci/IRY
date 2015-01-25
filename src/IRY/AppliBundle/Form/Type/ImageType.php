<?php

namespace IRY\AppliBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use IRY\AppliBundle\Entity\Image;

class ImageType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('name', 'text')
            ->add('folder', 'choice', array(
                    'choices'=>array(
                        Image::IMAGE_CM => Image::IMAGE_CM,
                        Image::IMAGE_SCHEMA => Image::IMAGE_SCHEMA
                    )
                ))
            ->add('course', 'entity', array(
                'class' => 'IRYAppliBundle:Course',
                'property' => 'name',
            ))
            ->add('file', 'file')
            ->add('save', 'submit');
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'IRY\AppliBundle\Entity\Image',
        ));
    }

    public function getName()
    {
        return 'image';
    }
}
