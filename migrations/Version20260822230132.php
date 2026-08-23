<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20260822230132 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Add the unidirectional relation between topics and related blogs';
    }

    public function up(Schema $schema): void
    {
        $this->addSql('CREATE TABLE topic_related_blog (topic_id INT NOT NULL, blog_id INT NOT NULL, INDEX IDX_TOPIC_RELATED_BLOG_TOPIC (topic_id), INDEX IDX_TOPIC_RELATED_BLOG_BLOG (blog_id), PRIMARY KEY(topic_id, blog_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE topic_related_blog ADD CONSTRAINT FK_TOPIC_RELATED_BLOG_TOPIC FOREIGN KEY (topic_id) REFERENCES topic (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE topic_related_blog ADD CONSTRAINT FK_TOPIC_RELATED_BLOG_BLOG FOREIGN KEY (blog_id) REFERENCES blogs (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        $this->addSql('ALTER TABLE topic_related_blog DROP FOREIGN KEY FK_TOPIC_RELATED_BLOG_TOPIC');
        $this->addSql('ALTER TABLE topic_related_blog DROP FOREIGN KEY FK_TOPIC_RELATED_BLOG_BLOG');
        $this->addSql('DROP TABLE topic_related_blog');
    }
}
