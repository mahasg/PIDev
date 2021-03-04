<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210227121324 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE demande_res ADD reference INT NOT NULL');
        $this->addSql('ALTER TABLE reservation DROP FOREIGN KEY FK_42C849551645DEA9');
        $this->addSql('ALTER TABLE reservation DROP FOREIGN KEY FK_42C8495521B741A9');
        $this->addSql('DROP INDEX UNIQ_42C849551645DEA9 ON reservation');
        $this->addSql('DROP INDEX UNIQ_42C8495521B741A9 ON reservation');
        $this->addSql('ALTER TABLE reservation ADD dem INT NOT NULL, DROP ref_id, DROP reference_id, DROP duree, CHANGE frais frais INT NOT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE demande_res DROP reference');
        $this->addSql('ALTER TABLE reservation ADD reference_id INT NOT NULL, ADD duree INT NOT NULL, CHANGE frais frais DOUBLE PRECISION NOT NULL, CHANGE dem ref_id INT NOT NULL');
        $this->addSql('ALTER TABLE reservation ADD CONSTRAINT FK_42C849551645DEA9 FOREIGN KEY (reference_id) REFERENCES demande_res (id)');
        $this->addSql('ALTER TABLE reservation ADD CONSTRAINT FK_42C8495521B741A9 FOREIGN KEY (ref_id) REFERENCES demande_res (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_42C849551645DEA9 ON reservation (reference_id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_42C8495521B741A9 ON reservation (ref_id)');
    }
}
