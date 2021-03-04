<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210228204049 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE reserv ADD reference_id INT NOT NULL');
        $this->addSql('ALTER TABLE reserv ADD CONSTRAINT FK_35033C901645DEA9 FOREIGN KEY (reference_id) REFERENCES demande (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_35033C901645DEA9 ON reserv (reference_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE reserv DROP FOREIGN KEY FK_35033C901645DEA9');
        $this->addSql('DROP INDEX UNIQ_35033C901645DEA9 ON reserv');
        $this->addSql('ALTER TABLE reserv DROP reference_id');
    }
}
