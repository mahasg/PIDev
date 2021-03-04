<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210302152553 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE conge ADD employe_id INT NOT NULL');
        $this->addSql('ALTER TABLE conge ADD CONSTRAINT FK_2ED893481B65292 FOREIGN KEY (employe_id) REFERENCES employe (idemp)');
        $this->addSql('CREATE INDEX IDX_2ED893481B65292 ON conge (employe_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE conge DROP FOREIGN KEY FK_2ED893481B65292');
        $this->addSql('DROP INDEX IDX_2ED893481B65292 ON conge');
        $this->addSql('ALTER TABLE conge DROP employe_id');
    }
}
