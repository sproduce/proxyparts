<?php

namespace App\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;



//use Symfony\Component\Form\Extension\Core\Type\SubmitType;


class UserContactFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('id', HiddenType::class)
            ->add('country', TextType::class,['trim' => true, 'label' => 'Страна'])
            ->add('city', TextType::class,['trim' => true, 'label' => 'Город'])
            ->add('address', TextType::class,['trim' => true, 'label' => 'Адрес'])
            ->add('phone', TextType::class,['trim' => true, 'label' => 'Телефон']);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            //'data_class' => Brand::class,
        ]);
    }
}
