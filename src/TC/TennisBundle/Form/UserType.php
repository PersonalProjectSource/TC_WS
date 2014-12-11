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
                
            ->add('adresses', 'collection', array(
                // chaque item du tableau sera un champ « email »
                'type'   => 'adresse',
                // ces options sont passées à chaque type « email »
                'options'=> array(
                    'required'  => false,
                    'attr'      => array('class' => 'email-box')
                )
            ));
//            ->add('adresse', 'entity', array(
//                'class' => 'TCTennisBundle:Adresse',
//            ))
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
