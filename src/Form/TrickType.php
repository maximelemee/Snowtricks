<?php

namespace App\Form;

use App\Entity\Trick;
use App\Entity\User;
use Faker\Core\DateTime;
use http\Env\Request;
use http\Env\Response;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class TrickType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nameTrick', TextType::class)
            ->add('description', TextareaType::class)
            ->add('creationDate')
            ->add('user', EntityType::class, [
                'class' => User::class,
                'choice_label' => 'nickname'
            ])

            ->add('groupTrick')

            ->add('photoTricks', CollectionType::class, [
                'entry_type' => PhotoTrickType::class,
                'entry_options' => ['label' => false],
                'label' => false,
                'allow_add' => true,
                'allow_delete' => true,
                'by_reference' => false


            ])

            ->add('videoTricks',CollectionType::class,[
                'entry_type'=>VideoTrickType::class,
                'entry_options' => ['label' => false],
                'label' => false,
                'allow_add' => true,
                'allow_delete' => true,
                'by_reference' => false
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Trick::class,
        ]);
    }
}
