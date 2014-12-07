<?php

namespace TC\TennisBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class JugementType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('date')
            ->add('fairplay')
            ->add('technique')
            ->add('ambiance')
            ->add('general')
            ->add('auteurJugement')
            ->add('receveurJugement')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'TC\TennisBundle\Entity\Jugement'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'tc_tennisbundle_jugement';
    }
}
