<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210130145731 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE feature (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, contente VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE feature_result (feature_id INT NOT NULL, result_id INT NOT NULL, INDEX IDX_6A7F27BD60E4B879 (feature_id), INDEX IDX_6A7F27BD7A7B643 (result_id), PRIMARY KEY(feature_id, result_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE feature_result ADD CONSTRAINT FK_6A7F27BD60E4B879 FOREIGN KEY (feature_id) REFERENCES feature (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE feature_result ADD CONSTRAINT FK_6A7F27BD7A7B643 FOREIGN KEY (result_id) REFERENCES result (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE feature_result DROP FOREIGN KEY FK_6A7F27BD60E4B879');
        $this->addSql('DROP TABLE feature');
        $this->addSql('DROP TABLE feature_result');
    }
}
