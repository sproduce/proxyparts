<?php

namespace App\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use App\Entity\PartsOffer;

use App\Form\Type\PartFormType;



class PartsOfferFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('id', HiddenType::class)
            ->add('price', IntegerType::class,['required' => false, 'label' => 'Цена'])
            ->add('priceSale', IntegerType::class,['label' => 'Цена продажи', 'required' => false],)
            ->add('amount', IntegerType::class,['label' => 'Количество', 'required' => false],)
            ->add('info', TextType::class,['trim' => true, 'required' => false, 'label' => 'Описание'],)
            ->add('comment', TextType::class,['trim' => true, 'required' => false, 'label' => 'Комментарий',])
            ->add('public', CheckboxType::class,['required' => false, 'label' => 'Опубликовать',])
            ->add('Part', PartFormType::class,['label' => false,]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
           'data_class' => PartsOffer::class,
        ]);
    }
}
