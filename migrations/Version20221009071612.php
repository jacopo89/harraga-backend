<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221009071612 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE istruzione (id INT AUTO_INCREMENT NOT NULL, cartella_sociale_id INT NOT NULL, UNIQUE INDEX UNIQ_7F3565C26E81060D (cartella_sociale_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE percorso_istruzione_formazione_italia (id INT AUTO_INCREMENT NOT NULL, progetto_formativo_id INT DEFAULT NULL, patto_formativo_id INT DEFAULT NULL, bilancio_competenze_id INT DEFAULT NULL, istruzione_id INT NOT NULL, tipologia VARCHAR(255) DEFAULT NULL, indirizzo_studi VARCHAR(255) DEFAULT NULL, data_inizio VARCHAR(255) DEFAULT NULL, data_fine_prevista VARCHAR(255) DEFAULT NULL, classe VARCHAR(255) DEFAULT NULL, istituto VARCHAR(255) DEFAULT NULL, luogo VARCHAR(255) DEFAULT NULL, orari_giorni LONGTEXT DEFAULT NULL, UNIQUE INDEX UNIQ_18A170304A2502A3 (progetto_formativo_id), UNIQUE INDEX UNIQ_18A17030D56D2255 (patto_formativo_id), UNIQUE INDEX UNIQ_18A17030778DFEF2 (bilancio_competenze_id), INDEX IDX_18A17030BA53DCA0 (istruzione_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE percorso_istruzione_italia_concluso (id INT AUTO_INCREMENT NOT NULL, allegato_id INT DEFAULT NULL, istruzione_id INT NOT NULL, tipologia VARCHAR(255) DEFAULT NULL, data_inizio VARCHAR(255) DEFAULT NULL, data_fine VARCHAR(255) DEFAULT NULL, istituto VARCHAR(255) DEFAULT NULL, UNIQUE INDEX UNIQ_C188F16F68F4D369 (allegato_id), INDEX IDX_C188F16FBA53DCA0 (istruzione_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE percorso_istruzione_origine (id INT AUTO_INCREMENT NOT NULL, allegato_id INT DEFAULT NULL, istruzione_id INT NOT NULL, sa_leggere VARCHAR(255) DEFAULT NULL, sa_scrivere VARCHAR(255) DEFAULT NULL, tipologia VARCHAR(255) DEFAULT NULL, UNIQUE INDEX UNIQ_FE00053768F4D369 (allegato_id), INDEX IDX_FE000537BA53DCA0 (istruzione_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE valutazione (id INT AUTO_INCREMENT NOT NULL, valutazione_id INT DEFAULT NULL, percorso_istruzione_formazione_id INT NOT NULL, UNIQUE INDEX UNIQ_B63C9C956F02060C (valutazione_id), INDEX IDX_B63C9C959E01EAAD (percorso_istruzione_formazione_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE istruzione ADD CONSTRAINT FK_7F3565C26E81060D FOREIGN KEY (cartella_sociale_id) REFERENCES cartella_sociale (id)');
        $this->addSql('ALTER TABLE percorso_istruzione_formazione_italia ADD CONSTRAINT FK_18A170304A2502A3 FOREIGN KEY (progetto_formativo_id) REFERENCES allegato (id)');
        $this->addSql('ALTER TABLE percorso_istruzione_formazione_italia ADD CONSTRAINT FK_18A17030D56D2255 FOREIGN KEY (patto_formativo_id) REFERENCES allegato (id)');
        $this->addSql('ALTER TABLE percorso_istruzione_formazione_italia ADD CONSTRAINT FK_18A17030778DFEF2 FOREIGN KEY (bilancio_competenze_id) REFERENCES allegato (id)');
        $this->addSql('ALTER TABLE percorso_istruzione_formazione_italia ADD CONSTRAINT FK_18A17030BA53DCA0 FOREIGN KEY (istruzione_id) REFERENCES istruzione (id)');
        $this->addSql('ALTER TABLE percorso_istruzione_italia_concluso ADD CONSTRAINT FK_C188F16F68F4D369 FOREIGN KEY (allegato_id) REFERENCES allegato (id)');
        $this->addSql('ALTER TABLE percorso_istruzione_italia_concluso ADD CONSTRAINT FK_C188F16FBA53DCA0 FOREIGN KEY (istruzione_id) REFERENCES istruzione (id)');
        $this->addSql('ALTER TABLE percorso_istruzione_origine ADD CONSTRAINT FK_FE00053768F4D369 FOREIGN KEY (allegato_id) REFERENCES allegato (id)');
        $this->addSql('ALTER TABLE percorso_istruzione_origine ADD CONSTRAINT FK_FE000537BA53DCA0 FOREIGN KEY (istruzione_id) REFERENCES istruzione (id)');
        $this->addSql('ALTER TABLE valutazione ADD CONSTRAINT FK_B63C9C956F02060C FOREIGN KEY (valutazione_id) REFERENCES allegato (id)');
        $this->addSql('ALTER TABLE valutazione ADD CONSTRAINT FK_B63C9C959E01EAAD FOREIGN KEY (percorso_istruzione_formazione_id) REFERENCES percorso_istruzione_formazione_italia (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE istruzione DROP FOREIGN KEY FK_7F3565C26E81060D');
        $this->addSql('ALTER TABLE percorso_istruzione_formazione_italia DROP FOREIGN KEY FK_18A170304A2502A3');
        $this->addSql('ALTER TABLE percorso_istruzione_formazione_italia DROP FOREIGN KEY FK_18A17030D56D2255');
        $this->addSql('ALTER TABLE percorso_istruzione_formazione_italia DROP FOREIGN KEY FK_18A17030778DFEF2');
        $this->addSql('ALTER TABLE percorso_istruzione_formazione_italia DROP FOREIGN KEY FK_18A17030BA53DCA0');
        $this->addSql('ALTER TABLE percorso_istruzione_italia_concluso DROP FOREIGN KEY FK_C188F16F68F4D369');
        $this->addSql('ALTER TABLE percorso_istruzione_italia_concluso DROP FOREIGN KEY FK_C188F16FBA53DCA0');
        $this->addSql('ALTER TABLE percorso_istruzione_origine DROP FOREIGN KEY FK_FE00053768F4D369');
        $this->addSql('ALTER TABLE percorso_istruzione_origine DROP FOREIGN KEY FK_FE000537BA53DCA0');
        $this->addSql('ALTER TABLE valutazione DROP FOREIGN KEY FK_B63C9C956F02060C');
        $this->addSql('ALTER TABLE valutazione DROP FOREIGN KEY FK_B63C9C959E01EAAD');
        $this->addSql('DROP TABLE istruzione');
        $this->addSql('DROP TABLE percorso_istruzione_formazione_italia');
        $this->addSql('DROP TABLE percorso_istruzione_italia_concluso');
        $this->addSql('DROP TABLE percorso_istruzione_origine');
        $this->addSql('DROP TABLE valutazione');
    }
}
