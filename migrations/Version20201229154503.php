<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20201229154503 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE sections ADD questionnaire_id INT NOT NULL, ADD slug VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE sections ADD CONSTRAINT FK_2B964398CE07E8FF FOREIGN KEY (questionnaire_id) REFERENCES questionnaires (id)');
        $this->addSql('CREATE INDEX IDX_2B964398CE07E8FF ON sections (questionnaire_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE sections DROP FOREIGN KEY FK_2B964398CE07E8FF');
        $this->addSql('DROP INDEX IDX_2B964398CE07E8FF ON sections');
        $this->addSql('ALTER TABLE sections DROP questionnaire_id, DROP slug');
    }
}
