<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20260821221812 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE blog_blog (blog_source INT NOT NULL, blog_target INT NOT NULL, INDEX IDX_20C5DDD3CAC5DAB2 (blog_source), INDEX IDX_20C5DDD3D3208A3D (blog_target), PRIMARY KEY(blog_source, blog_target)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE blog_blog ADD CONSTRAINT FK_20C5DDD3CAC5DAB2 FOREIGN KEY (blog_source) REFERENCES blogs (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE blog_blog ADD CONSTRAINT FK_20C5DDD3D3208A3D FOREIGN KEY (blog_target) REFERENCES blogs (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE blog_blog DROP FOREIGN KEY FK_20C5DDD3CAC5DAB2');
        $this->addSql('ALTER TABLE blog_blog DROP FOREIGN KEY FK_20C5DDD3D3208A3D');
        $this->addSql('DROP TABLE blog_blog');
    }
}
