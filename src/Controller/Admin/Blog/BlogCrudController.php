<?php

namespace App\Controller\Admin\Blog;

use App\Entity\Blog;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use Symfony\Component\Translation\TranslatableMessage;

class BlogCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Blog::class;
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setEntityLabelInSingular('Blog')
            ->setEntityLabelInPlural('Blog')
            ->setDateFormat('long')
//            ->setDateIntervalFormat('%%d Day(s) %%m Month(s) %%y Year(s)')
//            ->setPageTitle('index', '%entity_label_plural% listing')
            // ...
            ;
    }

    public function configureActions(Actions $actions): Actions
    {
        return $actions
            // ...
            ->add(Crud::PAGE_INDEX, Action::DETAIL)
            ->add(Crud::PAGE_EDIT, Action::SAVE_AND_ADD_ANOTHER);
    }

    public function configureFields(string $pageName): iterable
    {
        return [
//            IdField::new('id'),
            TextField::new('title', new TranslatableMessage('Title'))->setColumns(12),
            TextField::new('summary', new TranslatableMessage('Summary'))->setColumns(12)
                ->setMaxLength(255),
            TextEditorField::new('content', new TranslatableMessage('Content'))
                ->setNumOfRows(20)
            ->setTrixEditorConfig([
                'blockAttributes' => [
                    'default' => ['tagName' => 'p'],
                    'heading1' => ['tagName' => 'h3']
                ]
            ]),
//            TextareaField::new('content', new TranslatableMessage('Content'))->renderAsHtml(),
            BooleanField::new('pin', new TranslatableMessage('Pin')),
            BooleanField::new('published', new TranslatableMessage('Published')),
            ImageField::new('image', new TranslatableMessage('Image'))
                ->setUploadDir('public/images/blog/')
                ->setBasePath('public/images/blog/'),
            AssociationField::new('topic', new TranslatableMessage('Topic'))
                ->setRequired(true)
                ->setColumns(12)
                ->setFormTypeOption('choice_label', 'name')
                ->setFormTypeOption('placeholder', 'Select a topic'),

        ];
    }
//    public function configureFields(string $pageName): iterable
//    {
//        return [
//            IdField::new('id'),
//            TextField::new('title'),
//            TextEditorField::new('description'),
//        ];
//
//    }

}
