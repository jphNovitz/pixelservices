<?php

namespace App\Controller\Admin\Blog;

use App\Entity\Topic;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use FOS\CKEditorBundle\Form\Type\CKEditorType;
use Symfony\Component\Translation\TranslatableMessage;

class TopicCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Topic::class;
    }

    public function configureCrud(Crud $crud): Crud
    {
        $crud->setFormThemes(['@FOSCKEditor/Form/ckeditor_widget.html.twig', '@EasyAdmin/crud/form_theme.html.twig']);
        return $crud;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('title'),
            TextField::new('summary')->setColumns('20'),
            TextEditorField::new('content')
                ->setFormType(CKEditorType::class)
                ->setColumns('20')
                ->hideOnIndex(),
            ImageField::new('image', new TranslatableMessage('Image'))
                ->setUploadDir('public/images/topic/')
                ->setBasePath('public/images/topic/'),
        ];
    }

}
