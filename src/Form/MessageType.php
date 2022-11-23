<?php

namespace App\Form;

use App\Entity\Message;
use phpDocumentor\Reflection\Types\Boolean;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class MessageType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name', TextType::class, [
                'label' => 'Name'
            ])
            ->add('email', EmailType::class, [
                'label' => 'Email'
            ])
            ->add('text', TextareaType::class, [
                'label' => 'Your_message'
            ])
            ->add('seen', CheckboxType::class, [
                'required' => false,
                'label' => 'Seen'
                ])
            ->add('save', SubmitType::class, [
                'label' => 'Send'
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Message::class,
            'sanitize_html' => true,
        ]);
    }
}
