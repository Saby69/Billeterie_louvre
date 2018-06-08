<?php

namespace AppBundle\Form;
use Symfony\Component\Form\Extension\Core\Type\CountryType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

/**
 * @ORM\Entity(repositoryClass="AppBundle\Repository\BookingRepository")
 * @ORM\Table(name="Booking")
 */
class InformationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name',
                TextType::class, [
                    'label' => 'Nom',
                ])
            ->add('first_name',
                TextType::class, [
                    'label' => 'Prénom',
                ])
            ->add('country',
                CountryType::class, [
                    'label' => 'Pays',
                ])
            ->add('birth_date',
                    DateType::class, [
                    'label' => 'Date de naissance',
                 ])
            ->add('reduced_price',
                ChoiceType::class, array(
                    'choices' => array(
                        'Réduction' => true,
                    ),
                    'expanded' => true,
                    'multiple' => true,
                    'required' => false,
                    'label' => ' '
                ));

    }

    public function configureOptions(OptionsResolver $resolver)
    {

    }

    public function getBlockPrefix()
    {
        return 'app_bundle_ticket_form_type';
    }
}
