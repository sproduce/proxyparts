<?php

namespace App\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;


use App\Repository\Interfaces\OfferPropertyRepositoryInterface;

//use Symfony\Bridge\Doctrine\Form\Type\EntityType;

use App\Entity\PartsOffer;
use App\Entity\OfferProperty;

use App\Form\Type\PartFormType;
//use App\Form\Type\OfferPropertyFormType;


class PartsOfferFormType extends AbstractType
{
    
    public function __construct(
        private OfferPropertyRepositoryInterface $offerPropertyRep,
    ) {
    }
    
    
    
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('id', HiddenType::class)
                //->add('Property', OfferPropertyFormType::class, ['label' => false,])
            ->add('property',ChoiceType::class, ['label' => false,
                'choices' => $this->offerPropertyRep->getOfferPropertys(),
                //'class' => OfferProperty::class,
                //'mapped' => false,
                'choice_label' => 'property',
                
                ])
            ->add('price', IntegerType::class, ['required' => false, 'label' => 'Price'])
            ->add('priceSale', IntegerType::class, ['label' => 'Price Sale', 'required' => false],)
            ->add('amount', IntegerType::class, ['label' => 'Amount', 'required' => false],)
            ->add('info', TextType::class, ['trim' => true, 'required' => false, 'label' => 'Info'],)
            ->add('comment', TextType::class, ['trim' => true, 'required' => false, 'label' => 'Comment',])
            ->add('public', CheckboxType::class, ['required' => false, 'label' => 'Public',])
            ->add('Part', PartFormType::class, ['label' => false,])
            ->add('Save', SubmitType::class, ['label' => $options['Save']]);
                    
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
           'data_class' => PartsOffer::class,
           'Save' => 'Add',
            
        ]);
    }
}
