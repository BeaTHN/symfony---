<?php

namespace App\Form;

use App\Entity\Produit;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ProduitType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('Libelle', TextType::class)
            ->add('stock',TextType::class)
            ->add('user',EntityType::class, ['class' => User::class,
                                             'choice_label' => 'label',
                                             'multiple' => true,
                                             'expanded' => false])
            ->add('categorie', EntityType::class, ['class' => Categorie::class,
                                                   'choice_label' => 'label',
                                                   'multiple' => true,
                                                   'expanded' => false])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Produit::class,
        ]);
    }
}
