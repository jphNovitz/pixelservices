<?php

namespace App\Controller\Admin\Project;

use App\Entity\Project;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class ProjectCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Project::class;
    }


    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id'),
            TextField::new('title'),
            TextField::new('header'),
            TextField::new('link'),
            TextEditorField::new('description'),
            AssociationField::new('category', 'Category'),
            AssociationField::new('tags', 'Tags')
                ->setFormTypeOptions([
                    'by_reference' => false, // Nécessaire pour ManyToMany
                ])
                ->autocomplete(), // Ajoute une recherche auto-complétée pour améliorer l'expérience utilisateur
            AssociationField::new('technologies', 'Technologies')
                ->setFormTypeOptions([

                    'by_reference' => false, // Nécessaire pour gérer ManyToMany
                ])
                ->autocomplete(),
        ];
    }

}
