<?php

namespace App\Controller\Admin\Work;

use App\Entity\Work;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use Symfony\Component\Translation\TranslatableMessage;

class WorkCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Work::class;
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setEntityLabelInSingular('Service')
            ->setEntityLabelInPlural('Service')
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
            TextField::new('name', new TranslatableMessage('Name')),
            TextField::new('description_short', new TranslatableMessage('Description_short')),
            TextEditorField::new('description_long', new TranslatableMessage('Description_long')),
            IntegerField::new('price', new TranslatableMessage('Price')),
            BooleanField::new('active', new TranslatableMessage('Active')),
            ImageField::new('image', new TranslatableMessage('Image'))
                ->setUploadDir('public/images/work/')
                ->setBasePath('public/images/work/'),
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
