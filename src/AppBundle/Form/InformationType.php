<?php

namespace AppBundle\Form;
use AppBundle\Entity\Information;
use Symfony\Component\Form\Extension\Core\Type\BirthdayType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\CountryType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;


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
                    BirthdayType::class, [
                    'label' => 'Date de naissance',
                    'format' => 'dd MM yyyy',
                 ])
            ->add('reduced_price',
                CheckboxType::class, array(
                    'required' => false,
                    'label' => "J'ai une réduction"
                ));

    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => Information::class,
        ));
    }

    public function getBlockPrefix()
    {
        return 'app_bundle_ticket_form_type';
    }
}
