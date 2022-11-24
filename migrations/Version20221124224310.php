<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221124224310 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE penale (id INT AUTO_INCREMENT NOT NULL, cartella_sociale_id INT NOT NULL, UNIQUE INDEX UNIQ_8D4EC4046E81060D (cartella_sociale_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE procedura_penale (id INT AUTO_INCREMENT NOT NULL, pei_allegato_id INT DEFAULT NULL, stato_procedimento VARCHAR(255) DEFAULT NULL, nome_assistente_sociale VARCHAR(255) DEFAULT NULL, cognome_assistente_sociale VARCHAR(255) DEFAULT NULL, email_assistente_sociale VARCHAR(255) DEFAULT NULL, telefono_assistente_sociale VARCHAR(255) DEFAULT NULL, pei_descrizione VARCHAR(255) DEFAULT NULL, UNIQUE INDEX UNIQ_9FEE19CF1D0B4F41 (pei_allegato_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE penale ADD CONSTRAINT FK_8D4EC4046E81060D FOREIGN KEY (cartella_sociale_id) REFERENCES cartella_sociale (id)');
        $this->addSql('ALTER TABLE procedura_penale ADD CONSTRAINT FK_9FEE19CF1D0B4F41 FOREIGN KEY (pei_allegato_id) REFERENCES allegato (id)');
        $this->addSql('ALTER TABLE utente_cartella_sociale DROP FOREIGN KEY FK_E34091BD6E81060D');
        $this->addSql('ALTER TABLE utente_cartella_sociale DROP FOREIGN KEY FK_E34091BD6FD5D2A');
        $this->addSql('ALTER TABLE utente_cartella_sociale ADD id INT AUTO_INCREMENT NOT NULL, ADD ruolo VARCHAR(255) NOT NULL, DROP PRIMARY KEY, ADD PRIMARY KEY (id)');
        $this->addSql('ALTER TABLE utente_cartella_sociale ADD CONSTRAINT FK_E34091BD6E81060D FOREIGN KEY (cartella_sociale_id) REFERENCES cartella_sociale (id)');
        $this->addSql('ALTER TABLE utente_cartella_sociale ADD CONSTRAINT FK_E34091BD6FD5D2A FOREIGN KEY (utente_id) REFERENCES utente (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE penale DROP FOREIGN KEY FK_8D4EC4046E81060D');
        $this->addSql('ALTER TABLE procedura_penale DROP FOREIGN KEY FK_9FEE19CF1D0B4F41');
        $this->addSql('DROP TABLE penale');
        $this->addSql('DROP TABLE procedura_penale');
        $this->addSql('ALTER TABLE utente_cartella_sociale MODIFY id INT NOT NULL');
        $this->addSql('ALTER TABLE utente_cartella_sociale DROP FOREIGN KEY FK_E34091BD6FD5D2A');
        $this->addSql('ALTER TABLE utente_cartella_sociale DROP FOREIGN KEY FK_E34091BD6E81060D');
        $this->addSql('DROP INDEX `PRIMARY` ON utente_cartella_sociale');
        $this->addSql('ALTER TABLE utente_cartella_sociale DROP id, DROP ruolo');
        $this->addSql('ALTER TABLE utente_cartella_sociale ADD CONSTRAINT FK_E34091BD6FD5D2A FOREIGN KEY (utente_id) REFERENCES utente (id) ON UPDATE NO ACTION ON DELETE CASCADE');
        $this->addSql('ALTER TABLE utente_cartella_sociale ADD CONSTRAINT FK_E34091BD6E81060D FOREIGN KEY (cartella_sociale_id) REFERENCES cartella_sociale (id) ON UPDATE NO ACTION ON DELETE CASCADE');
        $this->addSql('ALTER TABLE utente_cartella_sociale ADD PRIMARY KEY (utente_id, cartella_sociale_id)');
    }
}
