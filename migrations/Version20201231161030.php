<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20201231161030 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE resultats (id INT AUTO_INCREMENT NOT NULL, totaluser_id INT DEFAULT NULL, totalreponse_id INT DEFAULT NULL, totalquestion_id INT DEFAULT NULL, created_at DATETIME DEFAULT NULL, INDEX IDX_55ED970296491700 (totaluser_id), INDEX IDX_55ED97023E5C6689 (totalreponse_id), INDEX IDX_55ED970289046BEA (totalquestion_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE resultats ADD CONSTRAINT FK_55ED970296491700 FOREIGN KEY (totaluser_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE resultats ADD CONSTRAINT FK_55ED97023E5C6689 FOREIGN KEY (totalreponse_id) REFERENCES reponses (id)');
        $this->addSql('ALTER TABLE resultats ADD CONSTRAINT FK_55ED970289046BEA FOREIGN KEY (totalquestion_id) REFERENCES questions (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE resultats');
    }
}
