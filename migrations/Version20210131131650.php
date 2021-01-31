<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210131131650 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE proposal ADD courses_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE proposal ADD CONSTRAINT FK_BFE59472F9295384 FOREIGN KEY (courses_id) REFERENCES course (id)');
        $this->addSql('CREATE INDEX IDX_BFE59472F9295384 ON proposal (courses_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE proposal DROP FOREIGN KEY FK_BFE59472F9295384');
        $this->addSql('DROP INDEX IDX_BFE59472F9295384 ON proposal');
        $this->addSql('ALTER TABLE proposal DROP courses_id');
    }
}
