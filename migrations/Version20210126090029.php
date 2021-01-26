<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210126090029 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE course (id INT AUTO_INCREMENT NOT NULL, content VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE proposal (id INT AUTO_INCREMENT NOT NULL, next_step_id INT DEFAULT NULL, step_id INT DEFAULT NULL, final_result_id INT DEFAULT NULL, content VARCHAR(255) NOT NULL, picture VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_BFE59472B13C343E (next_step_id), INDEX IDX_BFE5947273B21E9C (step_id), INDEX IDX_BFE5947221016FC1 (final_result_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE question (id INT AUTO_INCREMENT NOT NULL, title VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE result (id INT AUTO_INCREMENT NOT NULL, text VARCHAR(255) NOT NULL, sub_text VARCHAR(255) NOT NULL, result_name VARCHAR(255) NOT NULL, result_photo VARCHAR(255) NOT NULL, photo_species VARCHAR(255) DEFAULT NULL, photo_more VARCHAR(255) DEFAULT NULL, photo_complementary VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE proposal ADD CONSTRAINT FK_BFE59472B13C343E FOREIGN KEY (next_step_id) REFERENCES question (id)');
        $this->addSql('ALTER TABLE proposal ADD CONSTRAINT FK_BFE5947273B21E9C FOREIGN KEY (step_id) REFERENCES question (id)');
        $this->addSql('ALTER TABLE proposal ADD CONSTRAINT FK_BFE5947221016FC1 FOREIGN KEY (final_result_id) REFERENCES result (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE proposal DROP FOREIGN KEY FK_BFE59472B13C343E');
        $this->addSql('ALTER TABLE proposal DROP FOREIGN KEY FK_BFE5947273B21E9C');
        $this->addSql('ALTER TABLE proposal DROP FOREIGN KEY FK_BFE5947221016FC1');
        $this->addSql('DROP TABLE course');
        $this->addSql('DROP TABLE proposal');
        $this->addSql('DROP TABLE question');
        $this->addSql('DROP TABLE result');
    }
}
