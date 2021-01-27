<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210126104754 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE proposal DROP INDEX UNIQ_BFE59472B13C343E, ADD INDEX IDX_BFE59472B13C343E (next_step_id)');
        $this->addSql('ALTER TABLE proposal CHANGE step_id step_id INT NOT NULL, CHANGE next_step_id next_step_id INT NOT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE proposal DROP INDEX IDX_BFE59472B13C343E, ADD UNIQUE INDEX UNIQ_BFE59472B13C343E (next_step_id)');
        $this->addSql('ALTER TABLE proposal CHANGE next_step_id next_step_id INT DEFAULT NULL, CHANGE step_id step_id INT DEFAULT NULL');
    }
}
