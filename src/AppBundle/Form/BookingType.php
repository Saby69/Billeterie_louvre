<?php

namespace AppBundle\Form;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class BookingType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('date',
                DateType::class, [
                    'widget' => 'single_text',
                    'attr' => ['class' => 'js-datepicker'],
                    'html5' => false,
                ])
            ->add('type',
                ChoiceType::class, array(
                    'choices' => array(
                        'Journée' => 'd',
                        'Demi-journée' => 'h',
                    ),
                    'expanded' => true,
                    'multiple' => false,
                    'label' => ' '
                ))
            ->add('amount',
                ChoiceType::class, array(
                    'choices' => array(
                        '1' => 1,
                        '2' => 2,
                        '3' => 3,
                        '4' => 4,
                    ),
                    'label' => 'Nombre de place',
                ))
            ->add('mail',
                EmailType::class, array(
                    'required'   => true,
                ));
    }


    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => 'AppBundle\Entity\Booking'
        ]);
    }

    public function getBlockPrefix()
    {
        return 'app_bundle_ticket_form_type';
    }
}
