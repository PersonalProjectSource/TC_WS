<?php

namespace TC\TennisBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

use TC\TennisBundle\Entity\Adresse;

class UserType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nom')
            ->add('prenom')
            ->add('role')
<<<<<<< HEAD
            ->add('adresses', new AdresseType());
            
=======
            ->add('email')
            ->add('isAdherent')
            ->add('password')
        ;
>>>>>>> bd2a7cc2479cdf9c7002f073226730a5c6876c90
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'TC\TennisBundle\Entity\User'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'tc_tennisbundle_user';
    }
}
