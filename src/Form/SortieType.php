<?php

namespace App\Form;

use App\Entity\Sortie;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class SortieType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('qteS',TextType::class)
            ->add('puS',TextType::class)
            ->add('dateS',DateType::class, [
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
            'data_class' => Sortie::class,
        ]);
    }
}
