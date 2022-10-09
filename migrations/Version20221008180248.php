<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221008180248 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE affidamento (id INT AUTO_INCREMENT NOT NULL, verbale_affidamento_id INT DEFAULT NULL, provvedimento_affidamento_definitivo_id INT DEFAULT NULL, amministrativa_id INT NOT NULL, data_verbale_affidamento VARCHAR(255) DEFAULT NULL, autorita_affido VARCHAR(255) DEFAULT NULL, data_provvedimento_affidamento VARCHAR(255) DEFAULT NULL, UNIQUE INDEX UNIQ_C3E5E9482402469E (verbale_affidamento_id), UNIQUE INDEX UNIQ_C3E5E948EBED3CC (provvedimento_affidamento_definitivo_id), UNIQUE INDEX UNIQ_C3E5E948D1500C38 (amministrativa_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE amministrativa (id INT AUTO_INCREMENT NOT NULL, cartella_sociale_id INT NOT NULL, patto_accoglienza_id INT DEFAULT NULL, tessera_sanitaria_id INT DEFAULT NULL, stp_id INT DEFAULT NULL, codice_fiscale_id INT DEFAULT NULL, UNIQUE INDEX UNIQ_13F7B3796E81060D (cartella_sociale_id), UNIQUE INDEX UNIQ_13F7B379FEF41693 (patto_accoglienza_id), UNIQUE INDEX UNIQ_13F7B3792D3FA349 (tessera_sanitaria_id), UNIQUE INDEX UNIQ_13F7B379C219247D (stp_id), UNIQUE INDEX UNIQ_13F7B379E2561D6A (codice_fiscale_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE appuntamento (id INT AUTO_INCREMENT NOT NULL, procedura_legale_id INT NOT NULL, luogo VARCHAR(255) DEFAULT NULL, data VARCHAR(255) DEFAULT NULL, motivo VARCHAR(255) DEFAULT NULL, esiti VARCHAR(255) DEFAULT NULL, INDEX IDX_DDDEBF6BFF6C8603 (procedura_legale_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE delega_amministrativa (id INT AUTO_INCREMENT NOT NULL, protocollo VARCHAR(255) DEFAULT NULL, richiesta_uoni VARCHAR(255) DEFAULT NULL, data VARCHAR(255) DEFAULT NULL, altro LONGTEXT DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE documento_identita_amministrativa (id INT AUTO_INCREMENT NOT NULL, allegato_id INT DEFAULT NULL, amministrativa_id INT NOT NULL, UNIQUE INDEX UNIQ_8142BD2B68F4D369 (allegato_id), INDEX IDX_8142BD2BD1500C38 (amministrativa_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE foto_segnalazione (id INT AUTO_INCREMENT NOT NULL, allegato_id INT DEFAULT NULL, amministrativa_id INT NOT NULL, data VARCHAR(255) DEFAULT NULL, ufficio_competente VARCHAR(255) DEFAULT NULL, UNIQUE INDEX UNIQ_E455F45C68F4D369 (allegato_id), UNIQUE INDEX UNIQ_E455F45CD1500C38 (amministrativa_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE permesso_soggiorno (id INT AUTO_INCREMENT NOT NULL, allegato_id INT DEFAULT NULL, amministrativa_id INT NOT NULL, stato VARCHAR(255) NOT NULL, data_richiesta VARCHAR(255) DEFAULT NULL, data_rilascio VARCHAR(255) DEFAULT NULL, rilasciato_da VARCHAR(255) DEFAULT NULL, data_scadenza VARCHAR(255) DEFAULT NULL, tipologia VARCHAR(255) DEFAULT NULL, UNIQUE INDEX UNIQ_50D281A68F4D369 (allegato_id), INDEX IDX_50D281AD1500C38 (amministrativa_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE procedura_legale (id INT AUTO_INCREMENT NOT NULL, regolamento_dublino_id INT DEFAULT NULL, amministrativa_id INT NOT NULL, UNIQUE INDEX UNIQ_96F294A5E812F6DA (regolamento_dublino_id), INDEX IDX_96F294A5D1500C38 (amministrativa_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE proseguimento_amministrativo (id INT AUTO_INCREMENT NOT NULL, allegato_id INT DEFAULT NULL, amministrativa_id INT NOT NULL, data_attribuzione VARCHAR(255) DEFAULT NULL, data_finale VARCHAR(255) DEFAULT NULL, note LONGTEXT DEFAULT NULL, UNIQUE INDEX UNIQ_A88383AC68F4D369 (allegato_id), UNIQUE INDEX UNIQ_A88383ACD1500C38 (amministrativa_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE provvedimento_giudiziario (id INT AUTO_INCREMENT NOT NULL, allegato_id INT DEFAULT NULL, amministrativa_id INT NOT NULL, data VARCHAR(255) DEFAULT NULL, tipo VARCHAR(255) DEFAULT NULL, istituzione_emittente VARCHAR(255) DEFAULT NULL, nome_avvocato VARCHAR(255) DEFAULT NULL, UNIQUE INDEX UNIQ_556A05E568F4D369 (allegato_id), INDEX IDX_556A05E5D1500C38 (amministrativa_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE regolamento_dublino (id INT AUTO_INCREMENT NOT NULL, allegato_id INT DEFAULT NULL, paese_origine VARCHAR(255) DEFAULT NULL, paese_arrivo VARCHAR(255) DEFAULT NULL, data VARCHAR(255) DEFAULT NULL, stato_procedura VARCHAR(255) DEFAULT NULL, UNIQUE INDEX UNIQ_FB15401968F4D369 (allegato_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE revoca_tutela (id INT AUTO_INCREMENT NOT NULL, allegato_id INT DEFAULT NULL, amministrativa_id INT NOT NULL, motivazione VARCHAR(255) DEFAULT NULL, UNIQUE INDEX UNIQ_759BC0F68F4D369 (allegato_id), UNIQUE INDEX UNIQ_759BC0FD1500C38 (amministrativa_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE ricorso_amministrativo (id INT AUTO_INCREMENT NOT NULL, procedura_legale_id INT NOT NULL, data_inoltro_ricorso VARCHAR(255) DEFAULT NULL, note LONGTEXT DEFAULT NULL, nome_avvocato VARCHAR(255) DEFAULT NULL, patrocinio_gratuito TINYINT(1) DEFAULT NULL, date_udienze JSON DEFAULT NULL, INDEX IDX_AF3C9056FF6C8603 (procedura_legale_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE riferimento_legale (id INT AUTO_INCREMENT NOT NULL, amministrativa_id INT NOT NULL, tipo VARCHAR(255) DEFAULT NULL, nome VARCHAR(255) DEFAULT NULL, cognome VARCHAR(255) DEFAULT NULL, email VARCHAR(255) DEFAULT NULL, telefono VARCHAR(255) DEFAULT NULL, UNIQUE INDEX UNIQ_3C236902D1500C38 (amministrativa_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE affidamento ADD CONSTRAINT FK_C3E5E9482402469E FOREIGN KEY (verbale_affidamento_id) REFERENCES allegato (id)');
        $this->addSql('ALTER TABLE affidamento ADD CONSTRAINT FK_C3E5E948EBED3CC FOREIGN KEY (provvedimento_affidamento_definitivo_id) REFERENCES allegato (id)');
        $this->addSql('ALTER TABLE affidamento ADD CONSTRAINT FK_C3E5E948D1500C38 FOREIGN KEY (amministrativa_id) REFERENCES amministrativa (id)');
        $this->addSql('ALTER TABLE amministrativa ADD CONSTRAINT FK_13F7B3796E81060D FOREIGN KEY (cartella_sociale_id) REFERENCES cartella_sociale (id)');
        $this->addSql('ALTER TABLE amministrativa ADD CONSTRAINT FK_13F7B379FEF41693 FOREIGN KEY (patto_accoglienza_id) REFERENCES allegato (id)');
        $this->addSql('ALTER TABLE amministrativa ADD CONSTRAINT FK_13F7B3792D3FA349 FOREIGN KEY (tessera_sanitaria_id) REFERENCES allegato (id)');
        $this->addSql('ALTER TABLE amministrativa ADD CONSTRAINT FK_13F7B379C219247D FOREIGN KEY (stp_id) REFERENCES allegato (id)');
        $this->addSql('ALTER TABLE amministrativa ADD CONSTRAINT FK_13F7B379E2561D6A FOREIGN KEY (codice_fiscale_id) REFERENCES allegato (id)');
        $this->addSql('ALTER TABLE appuntamento ADD CONSTRAINT FK_DDDEBF6BFF6C8603 FOREIGN KEY (procedura_legale_id) REFERENCES procedura_legale (id)');
        $this->addSql('ALTER TABLE documento_identita_amministrativa ADD CONSTRAINT FK_8142BD2B68F4D369 FOREIGN KEY (allegato_id) REFERENCES allegato (id)');
        $this->addSql('ALTER TABLE documento_identita_amministrativa ADD CONSTRAINT FK_8142BD2BD1500C38 FOREIGN KEY (amministrativa_id) REFERENCES amministrativa (id)');
        $this->addSql('ALTER TABLE foto_segnalazione ADD CONSTRAINT FK_E455F45C68F4D369 FOREIGN KEY (allegato_id) REFERENCES allegato (id)');
        $this->addSql('ALTER TABLE foto_segnalazione ADD CONSTRAINT FK_E455F45CD1500C38 FOREIGN KEY (amministrativa_id) REFERENCES amministrativa (id)');
        $this->addSql('ALTER TABLE permesso_soggiorno ADD CONSTRAINT FK_50D281A68F4D369 FOREIGN KEY (allegato_id) REFERENCES allegato (id)');
        $this->addSql('ALTER TABLE permesso_soggiorno ADD CONSTRAINT FK_50D281AD1500C38 FOREIGN KEY (amministrativa_id) REFERENCES amministrativa (id)');
        $this->addSql('ALTER TABLE procedura_legale ADD CONSTRAINT FK_96F294A5E812F6DA FOREIGN KEY (regolamento_dublino_id) REFERENCES regolamento_dublino (id)');
        $this->addSql('ALTER TABLE procedura_legale ADD CONSTRAINT FK_96F294A5D1500C38 FOREIGN KEY (amministrativa_id) REFERENCES amministrativa (id)');
        $this->addSql('ALTER TABLE proseguimento_amministrativo ADD CONSTRAINT FK_A88383AC68F4D369 FOREIGN KEY (allegato_id) REFERENCES allegato (id)');
        $this->addSql('ALTER TABLE proseguimento_amministrativo ADD CONSTRAINT FK_A88383ACD1500C38 FOREIGN KEY (amministrativa_id) REFERENCES amministrativa (id)');
        $this->addSql('ALTER TABLE provvedimento_giudiziario ADD CONSTRAINT FK_556A05E568F4D369 FOREIGN KEY (allegato_id) REFERENCES allegato (id)');
        $this->addSql('ALTER TABLE provvedimento_giudiziario ADD CONSTRAINT FK_556A05E5D1500C38 FOREIGN KEY (amministrativa_id) REFERENCES amministrativa (id)');
        $this->addSql('ALTER TABLE regolamento_dublino ADD CONSTRAINT FK_FB15401968F4D369 FOREIGN KEY (allegato_id) REFERENCES allegato (id)');
        $this->addSql('ALTER TABLE revoca_tutela ADD CONSTRAINT FK_759BC0F68F4D369 FOREIGN KEY (allegato_id) REFERENCES allegato (id)');
        $this->addSql('ALTER TABLE revoca_tutela ADD CONSTRAINT FK_759BC0FD1500C38 FOREIGN KEY (amministrativa_id) REFERENCES amministrativa (id)');
        $this->addSql('ALTER TABLE ricorso_amministrativo ADD CONSTRAINT FK_AF3C9056FF6C8603 FOREIGN KEY (procedura_legale_id) REFERENCES procedura_legale (id)');
        $this->addSql('ALTER TABLE riferimento_legale ADD CONSTRAINT FK_3C236902D1500C38 FOREIGN KEY (amministrativa_id) REFERENCES amministrativa (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE affidamento DROP FOREIGN KEY FK_C3E5E9482402469E');
        $this->addSql('ALTER TABLE affidamento DROP FOREIGN KEY FK_C3E5E948EBED3CC');
        $this->addSql('ALTER TABLE affidamento DROP FOREIGN KEY FK_C3E5E948D1500C38');
        $this->addSql('ALTER TABLE amministrativa DROP FOREIGN KEY FK_13F7B3796E81060D');
        $this->addSql('ALTER TABLE amministrativa DROP FOREIGN KEY FK_13F7B379FEF41693');
        $this->addSql('ALTER TABLE amministrativa DROP FOREIGN KEY FK_13F7B3792D3FA349');
        $this->addSql('ALTER TABLE amministrativa DROP FOREIGN KEY FK_13F7B379C219247D');
        $this->addSql('ALTER TABLE amministrativa DROP FOREIGN KEY FK_13F7B379E2561D6A');
        $this->addSql('ALTER TABLE appuntamento DROP FOREIGN KEY FK_DDDEBF6BFF6C8603');
        $this->addSql('ALTER TABLE documento_identita_amministrativa DROP FOREIGN KEY FK_8142BD2B68F4D369');
        $this->addSql('ALTER TABLE documento_identita_amministrativa DROP FOREIGN KEY FK_8142BD2BD1500C38');
        $this->addSql('ALTER TABLE foto_segnalazione DROP FOREIGN KEY FK_E455F45C68F4D369');
        $this->addSql('ALTER TABLE foto_segnalazione DROP FOREIGN KEY FK_E455F45CD1500C38');
        $this->addSql('ALTER TABLE permesso_soggiorno DROP FOREIGN KEY FK_50D281A68F4D369');
        $this->addSql('ALTER TABLE permesso_soggiorno DROP FOREIGN KEY FK_50D281AD1500C38');
        $this->addSql('ALTER TABLE procedura_legale DROP FOREIGN KEY FK_96F294A5E812F6DA');
        $this->addSql('ALTER TABLE procedura_legale DROP FOREIGN KEY FK_96F294A5D1500C38');
        $this->addSql('ALTER TABLE proseguimento_amministrativo DROP FOREIGN KEY FK_A88383AC68F4D369');
        $this->addSql('ALTER TABLE proseguimento_amministrativo DROP FOREIGN KEY FK_A88383ACD1500C38');
        $this->addSql('ALTER TABLE provvedimento_giudiziario DROP FOREIGN KEY FK_556A05E568F4D369');
        $this->addSql('ALTER TABLE provvedimento_giudiziario DROP FOREIGN KEY FK_556A05E5D1500C38');
        $this->addSql('ALTER TABLE regolamento_dublino DROP FOREIGN KEY FK_FB15401968F4D369');
        $this->addSql('ALTER TABLE revoca_tutela DROP FOREIGN KEY FK_759BC0F68F4D369');
        $this->addSql('ALTER TABLE revoca_tutela DROP FOREIGN KEY FK_759BC0FD1500C38');
        $this->addSql('ALTER TABLE ricorso_amministrativo DROP FOREIGN KEY FK_AF3C9056FF6C8603');
        $this->addSql('ALTER TABLE riferimento_legale DROP FOREIGN KEY FK_3C236902D1500C38');
        $this->addSql('DROP TABLE affidamento');
        $this->addSql('DROP TABLE amministrativa');
        $this->addSql('DROP TABLE appuntamento');
        $this->addSql('DROP TABLE delega_amministrativa');
        $this->addSql('DROP TABLE documento_identita_amministrativa');
        $this->addSql('DROP TABLE foto_segnalazione');
        $this->addSql('DROP TABLE permesso_soggiorno');
        $this->addSql('DROP TABLE procedura_legale');
        $this->addSql('DROP TABLE proseguimento_amministrativo');
        $this->addSql('DROP TABLE provvedimento_giudiziario');
        $this->addSql('DROP TABLE regolamento_dublino');
        $this->addSql('DROP TABLE revoca_tutela');
        $this->addSql('DROP TABLE ricorso_amministrativo');
        $this->addSql('DROP TABLE riferimento_legale');
    }
}
