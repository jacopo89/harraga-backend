<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221003144600 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE assistente_sociale (id INT AUTO_INCREMENT NOT NULL, nome VARCHAR(255) DEFAULT NULL, cognome VARCHAR(255) DEFAULT NULL, email VARCHAR(255) DEFAULT NULL, telefono VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE documenti_possesso (id INT AUTO_INCREMENT NOT NULL, allegato_id INT DEFAULT NULL, tipologia VARCHAR(255) DEFAULT NULL, UNIQUE INDEX UNIQ_5D0D8FFF68F4D369 (allegato_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE domicilio (id INT AUTO_INCREMENT NOT NULL, anagrafica_id INT NOT NULL, tipologia_domicilio VARCHAR(255) DEFAULT NULL, nome VARCHAR(255) DEFAULT NULL, tipo_inserimento VARCHAR(255) DEFAULT NULL, responsabile VARCHAR(255) DEFAULT NULL, email VARCHAR(255) DEFAULT NULL, telefono VARCHAR(255) DEFAULT NULL, INDEX IDX_9B942ED17E92415C (anagrafica_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE polizza_assicurativa (id INT AUTO_INCREMENT NOT NULL, allegato_id INT DEFAULT NULL, tipologia VARCHAR(255) DEFAULT NULL, numero VARCHAR(255) DEFAULT NULL, data_inizio VARCHAR(255) DEFAULT NULL, data_fine VARCHAR(255) DEFAULT NULL, UNIQUE INDEX UNIQ_AF45739268F4D369 (allegato_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE tutore (id INT AUTO_INCREMENT NOT NULL, decreto_tribunale_id INT DEFAULT NULL, nome VARCHAR(255) DEFAULT NULL, cognome VARCHAR(255) DEFAULT NULL, email VARCHAR(255) DEFAULT NULL, telefono VARCHAR(255) DEFAULT NULL, numero_tutela VARCHAR(255) DEFAULT NULL, data_assegnazione VARCHAR(255) DEFAULT NULL, luogo_assegnazione VARCHAR(255) DEFAULT NULL, motivazione_tutela VARCHAR(255) DEFAULT NULL, tribunale_minori VARCHAR(255) DEFAULT NULL, giudice_tutelare VARCHAR(255) DEFAULT NULL, rettifica_tutela VARCHAR(255) DEFAULT NULL, UNIQUE INDEX UNIQ_9744B4BE56BAC8C1 (decreto_tribunale_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE documenti_possesso ADD CONSTRAINT FK_5D0D8FFF68F4D369 FOREIGN KEY (allegato_id) REFERENCES allegato (id)');
        $this->addSql('ALTER TABLE domicilio ADD CONSTRAINT FK_9B942ED17E92415C FOREIGN KEY (anagrafica_id) REFERENCES anagrafica (id)');
        $this->addSql('ALTER TABLE polizza_assicurativa ADD CONSTRAINT FK_AF45739268F4D369 FOREIGN KEY (allegato_id) REFERENCES allegato (id)');
        $this->addSql('ALTER TABLE tutore ADD CONSTRAINT FK_9744B4BE56BAC8C1 FOREIGN KEY (decreto_tribunale_id) REFERENCES allegato (id)');
        $this->addSql('ALTER TABLE anagrafica ADD polizza_assicurativa_id INT DEFAULT NULL, ADD tutore_id INT DEFAULT NULL, ADD assistente_sociale_id INT DEFAULT NULL, ADD documenti_possesso_id INT DEFAULT NULL, ADD email VARCHAR(255) DEFAULT NULL, ADD telefono VARCHAR(255) DEFAULT NULL, ADD unita_operativa VARCHAR(255) DEFAULT NULL, ADD data_assegnazione_uo VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE anagrafica ADD CONSTRAINT FK_D4C84CAD9A72362B FOREIGN KEY (polizza_assicurativa_id) REFERENCES polizza_assicurativa (id)');
        $this->addSql('ALTER TABLE anagrafica ADD CONSTRAINT FK_D4C84CAD5899F888 FOREIGN KEY (tutore_id) REFERENCES tutore (id)');
        $this->addSql('ALTER TABLE anagrafica ADD CONSTRAINT FK_D4C84CADE6CC238C FOREIGN KEY (assistente_sociale_id) REFERENCES assistente_sociale (id)');
        $this->addSql('ALTER TABLE anagrafica ADD CONSTRAINT FK_D4C84CAD1A7309B9 FOREIGN KEY (documenti_possesso_id) REFERENCES documenti_possesso (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_D4C84CAD9A72362B ON anagrafica (polizza_assicurativa_id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_D4C84CAD5899F888 ON anagrafica (tutore_id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_D4C84CADE6CC238C ON anagrafica (assistente_sociale_id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_D4C84CAD1A7309B9 ON anagrafica (documenti_possesso_id)');
        $this->addSql('ALTER TABLE documento_identita ADD tipologia VARCHAR(255) DEFAULT NULL, ADD note LONGTEXT DEFAULT NULL');
        $this->addSql('ALTER TABLE mediatore ADD cognome VARCHAR(255) DEFAULT NULL, ADD email VARCHAR(255) DEFAULT NULL, ADD telefono VARCHAR(255) DEFAULT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE anagrafica DROP FOREIGN KEY FK_D4C84CADE6CC238C');
        $this->addSql('ALTER TABLE anagrafica DROP FOREIGN KEY FK_D4C84CAD1A7309B9');
        $this->addSql('ALTER TABLE anagrafica DROP FOREIGN KEY FK_D4C84CAD9A72362B');
        $this->addSql('ALTER TABLE anagrafica DROP FOREIGN KEY FK_D4C84CAD5899F888');
        $this->addSql('ALTER TABLE documenti_possesso DROP FOREIGN KEY FK_5D0D8FFF68F4D369');
        $this->addSql('ALTER TABLE domicilio DROP FOREIGN KEY FK_9B942ED17E92415C');
        $this->addSql('ALTER TABLE polizza_assicurativa DROP FOREIGN KEY FK_AF45739268F4D369');
        $this->addSql('ALTER TABLE tutore DROP FOREIGN KEY FK_9744B4BE56BAC8C1');
        $this->addSql('DROP TABLE assistente_sociale');
        $this->addSql('DROP TABLE documenti_possesso');
        $this->addSql('DROP TABLE domicilio');
        $this->addSql('DROP TABLE polizza_assicurativa');
        $this->addSql('DROP TABLE tutore');
        $this->addSql('ALTER TABLE documento_identita DROP tipologia, DROP note');
        $this->addSql('ALTER TABLE mediatore DROP cognome, DROP email, DROP telefono');
        $this->addSql('DROP INDEX UNIQ_D4C84CAD9A72362B ON anagrafica');
        $this->addSql('DROP INDEX UNIQ_D4C84CAD5899F888 ON anagrafica');
        $this->addSql('DROP INDEX UNIQ_D4C84CADE6CC238C ON anagrafica');
        $this->addSql('DROP INDEX UNIQ_D4C84CAD1A7309B9 ON anagrafica');
        $this->addSql('ALTER TABLE anagrafica DROP polizza_assicurativa_id, DROP tutore_id, DROP assistente_sociale_id, DROP documenti_possesso_id, DROP email, DROP telefono, DROP unita_operativa, DROP data_assegnazione_uo');
    }
}
