<?php

namespace AppBundle\Form;

use AppBundle\Entity\Calendar;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use AppBundle\Entity\Address;
use AppBundle\Repository\AddressRepository;
use Symfony\Component\Validator\Constraints\Choice;

class CalendarType extends AbstractType
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
//            ->add('address')
            ->add('address', ChoiceType::class, array(
                'choices' => array(
                    'choice_label' => $city = function (Calendar $calendar){
                        return strtoupper($calendar->getAddress()->getCity());
                    }, array(
                        $addresses = function (Calendar $calendar){
                            return strtolower($calendar->getAddress()->getAddress());
                        }
                    )),
                )
            );

    }
    /**
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
