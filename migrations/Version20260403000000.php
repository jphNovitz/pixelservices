<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

final class Version20260403000000 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Add image_alt columns to blogs and topic tables';
    }

    public function up(Schema $schema): void
    {
        $this->addSql('ALTER TABLE blogs ADD image_alt VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE topic ADD image_alt VARCHAR(255) DEFAULT NULL');
    }

    public function down(Schema $schema): void
    {
        $this->addSql('ALTER TABLE blogs DROP image_alt');
        $this->addSql('ALTER TABLE topic DROP image_alt');
    }
}
