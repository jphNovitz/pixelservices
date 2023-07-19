<?php

namespace App\Controller\Admin\Blog;

use App\Entity\Blog;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
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
            TextField::new('title', new TranslatableMessage('Title')),
            TextEditorField::new('content', new TranslatableMessage('Content')),
//            TextareaField::new('content', new TranslatableMessage('Content'))->renderAsHtml(),
            BooleanField::new('pin', new TranslatableMessage('Pin')),
            BooleanField::new('published', new TranslatableMessage('Published')),
            ImageField::new('image', new TranslatableMessage('Image'))
                ->setUploadDir('public/images/blog/')
                ->setBasePath('public/images/blog/')

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
