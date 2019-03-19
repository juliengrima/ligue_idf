<?php

namespace CalendarBundle\Form;

use AppBundle\Form\Media;
use CalendarBundle\Entity\Agenda;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;

class AgendaType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('start')
           // ->add('end', 'datetime' , array(
           //      'minutes' => range(0, 30, 30)
           //))
            ->add('end')
            //->add('start', DateTimeType::class)
            //->add('end', DateTimeType::class)
            ->add('titre')
            ->add('texte')
            ->add('lieu')
            ->add('color')
            ->add('media', Media::class, array(
                'required' => false,
//                'data_class' => null,
            ))
            ->add('slider', CheckboxType::class, array(
                'required' => false,
            ))
        ;
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'CalendarBundle\Entity\Agenda'
        ));
    }

//    /**
//    * {@inheritdoc}
//    */
//    public function getBlockPrefix()
//    {
//        return 'calendarbundle_agenda';
//    }


}
