<?php

namespace AppBundle\Form;

use Doctrine\ORM\EntityRepository;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use AppBundle\Entity\Address;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

class CalendarEditType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('start')
                ->add('category')
                ->add('club1')
                ->add('club2')
                ->add('address', EntityType::class, [
                    // looks for choices from this entity
                    'class' => Address::class,

                    'query_builder' => function (EntityRepository $er) {
                        return $er->createQueryBuilder('a')
                            ->orderBy('a.city', 'ASC');
                    },

                    'choice_label' => 'fullAddress'
                ]);
    }/**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Calendar'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_calendar';
    }


}
