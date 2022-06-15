<?php

namespace App\Form;

use App\Entity\Entree;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class EntreeType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('qteE',TextType::class)
            ->add('puE',TextType::class)
            ->add('dateE',DateType::class, [
                'widget' => 'choice',
            ])
            ->add('produit',EntityType::class, ['class' => Produit::class,
            'choice_label' => 'label',
            'multiple' => true,
            'expanded' => false])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Entree::class,
        ]);
    }
}
