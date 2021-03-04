<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210302152256 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE conge DROP employe_id');
        $this->addSql('ALTER TABLE demande_res ADD reference INT NOT NULL');
        $this->addSql('ALTER TABLE film DROP FOREIGN KEY FK_8244BE22B4CB84B6');
        $this->addSql('ALTER TABLE film DROP FOREIGN KEY FK_8244BE22E6286007');
        $this->addSql('DROP INDEX IDX_8244BE22B4CB84B6 ON film');
        $this->addSql('DROP INDEX IDX_8244BE22E6286007 ON film');
        $this->addSql('ALTER TABLE film DROP cinema_id, DROP film_id_id');
        $this->addSql('ALTER TABLE reservation DROP FOREIGN KEY FK_42C849552563DECF');
        $this->addSql('DROP INDEX UNIQ_42C849552563DECF ON reservation');
        $this->addSql('ALTER TABLE reservation ADD matricule VARCHAR(255) NOT NULL, ADD date DATE NOT NULL, ADD duree INT NOT NULL, CHANGE id_demande_id id_client INT NOT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE conge ADD employe_id INT NOT NULL');
        $this->addSql('ALTER TABLE demande_res DROP reference');
        $this->addSql('ALTER TABLE film ADD cinema_id INT NOT NULL, ADD film_id_id INT NOT NULL');
        $this->addSql('ALTER TABLE film ADD CONSTRAINT FK_8244BE22B4CB84B6 FOREIGN KEY (cinema_id) REFERENCES cinema (id)');
        $this->addSql('ALTER TABLE film ADD CONSTRAINT FK_8244BE22E6286007 FOREIGN KEY (film_id_id) REFERENCES cinema (id)');
        $this->addSql('CREATE INDEX IDX_8244BE22B4CB84B6 ON film (cinema_id)');
        $this->addSql('CREATE INDEX IDX_8244BE22E6286007 ON film (film_id_id)');
        $this->addSql('ALTER TABLE reservation ADD id_demande_id INT NOT NULL, DROP id_client, DROP matricule, DROP date, DROP duree');
        $this->addSql('ALTER TABLE reservation ADD CONSTRAINT FK_42C849552563DECF FOREIGN KEY (id_demande_id) REFERENCES demande_res (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_42C849552563DECF ON reservation (id_demande_id)');
    }
}
