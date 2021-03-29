<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210328002214 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE equipement DROP FOREIGN KEY FK_B8B4C6F3B4CB84B6');
        $this->addSql('DROP INDEX IDX_B8B4C6F3B4CB84B6 ON equipement');
        $this->addSql('ALTER TABLE equipement ADD prix DOUBLE PRECISION NOT NULL, ADD dates DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL, DROP cinema_id, DROP numsalle');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE equipement ADD cinema_id INT DEFAULT NULL, ADD numsalle INT DEFAULT NULL, DROP prix, DROP dates');
        $this->addSql('ALTER TABLE equipement ADD CONSTRAINT FK_B8B4C6F3B4CB84B6 FOREIGN KEY (cinema_id) REFERENCES cinema (num)');
        $this->addSql('CREATE INDEX IDX_B8B4C6F3B4CB84B6 ON equipement (cinema_id)');
    }
}
