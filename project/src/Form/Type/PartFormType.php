<?php

namespace App\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use App\Entity\PartNumber;

use App\Form\Type\BrandFormType;



class PartFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('id', HiddenType::class)
            ->add('numberText', TextType::class,['trim' => true, 'label' => 'Part Number'])
            ->add('info', TextType::class,['trim' => true, 'required' => false, 'label' => 'Info'])
            ->add('partBrand', BrandFormType::class,[
                'label' => false,
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
           'data_class' => PartNumber::class,
        ]);
    }
}
