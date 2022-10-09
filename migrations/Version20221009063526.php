<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221009063526 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE adozione (id INT AUTO_INCREMENT NOT NULL, allegato_id INT DEFAULT NULL, storia_id INT NOT NULL, data VARCHAR(255) DEFAULT NULL, ente VARCHAR(255) DEFAULT NULL, UNIQUE INDEX UNIQ_8F59B53168F4D369 (allegato_id), INDEX IDX_8F59B531B2917D6A (storia_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE affido (id INT AUTO_INCREMENT NOT NULL, allegato_id INT DEFAULT NULL, storia_id INT NOT NULL, data VARCHAR(255) DEFAULT NULL, ente VARCHAR(255) DEFAULT NULL, UNIQUE INDEX UNIQ_E1CF75AB68F4D369 (allegato_id), INDEX IDX_E1CF75ABB2917D6A (storia_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE allontanamento (id INT AUTO_INCREMENT NOT NULL, comunicazione_id INT DEFAULT NULL, storia_id INT NOT NULL, tipologia VARCHAR(255) DEFAULT NULL, data VARCHAR(255) DEFAULT NULL, luogo VARCHAR(255) DEFAULT NULL, note LONGTEXT DEFAULT NULL, UNIQUE INDEX UNIQ_651848EE84AC125A (comunicazione_id), INDEX IDX_651848EEB2917D6A (storia_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE cpa (id INT AUTO_INCREMENT NOT NULL, storia_id INT NOT NULL, nome VARCHAR(255) DEFAULT NULL, data_ingresso VARCHAR(255) DEFAULT NULL, data_uscita VARCHAR(255) DEFAULT NULL, UNIQUE INDEX UNIQ_A05A8453B2917D6A (storia_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE hotspot (id INT AUTO_INCREMENT NOT NULL, storia_id INT NOT NULL, nome VARCHAR(255) DEFAULT NULL, data_ingresso VARCHAR(255) DEFAULT NULL, data_uscita VARCHAR(255) DEFAULT NULL, UNIQUE INDEX UNIQ_48B38313B2917D6A (storia_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE parente (id INT AUTO_INCREMENT NOT NULL, allegato_id INT DEFAULT NULL, storia_id INT NOT NULL, relazione_parentela VARCHAR(255) DEFAULT NULL, nome VARCHAR(255) DEFAULT NULL, cognome VARCHAR(255) DEFAULT NULL, email VARCHAR(255) DEFAULT NULL, telefono VARCHAR(255) DEFAULT NULL, paese_origine VARCHAR(255) DEFAULT NULL, in_vita TINYINT(1) DEFAULT NULL, in_ue TINYINT(1) DEFAULT NULL, note LONGTEXT DEFAULT NULL, UNIQUE INDEX UNIQ_984A83B68F4D369 (allegato_id), INDEX IDX_984A83BB2917D6A (storia_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE percorso_migratorio (id INT AUTO_INCREMENT NOT NULL, storia_id INT NOT NULL, anno_partenza VARCHAR(255) DEFAULT NULL, luogo_partenza VARCHAR(255) DEFAULT NULL, ragioni_espatrio LONGTEXT DEFAULT NULL, paesi_attraversati JSON NOT NULL, eventuali_timori_manifestati LONGTEXT DEFAULT NULL, INDEX IDX_4D07204BB2917D6A (storia_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE progetto_educativo_individuale (id INT AUTO_INCREMENT NOT NULL, comunicazione_id INT DEFAULT NULL, storia_id INT NOT NULL, descrizione LONGTEXT DEFAULT NULL, UNIQUE INDEX UNIQ_A4A0C3A884AC125A (comunicazione_id), INDEX IDX_A4A0C3A8B2917D6A (storia_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE relazione_assistente_sociale (id INT AUTO_INCREMENT NOT NULL, relazione_id INT DEFAULT NULL, storia_id INT NOT NULL, descrizione LONGTEXT DEFAULT NULL, UNIQUE INDEX UNIQ_8873CD077B0279B9 (relazione_id), INDEX IDX_8873CD07B2917D6A (storia_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE seconda_accoglienza (id INT AUTO_INCREMENT NOT NULL, storia_id INT NOT NULL, seconda_accoglienza VARCHAR(255) DEFAULT NULL, tipologia VARCHAR(255) DEFAULT NULL, nome_responsabile VARCHAR(255) DEFAULT NULL, cognome_responsabile VARCHAR(255) DEFAULT NULL, email_responsabile VARCHAR(255) DEFAULT NULL, telefono_responsabile VARCHAR(255) DEFAULT NULL, data_ingresso VARCHAR(255) DEFAULT NULL, data_uscita VARCHAR(255) DEFAULT NULL, UNIQUE INDEX UNIQ_F1BD4A50B2917D6A (storia_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE storia (id INT AUTO_INCREMENT NOT NULL, cartella_sociale_id INT NOT NULL, etnia VARCHAR(255) DEFAULT NULL, particolari_osservanze LONGTEXT DEFAULT NULL, informazioni_vita_minore LONGTEXT DEFAULT NULL, scuola LONGTEXT DEFAULT NULL, hobbies LONGTEXT DEFAULT NULL, ragioni_espatrio LONGTEXT DEFAULT NULL, timori_manifestati_rientro_paese_origine LONGTEXT DEFAULT NULL, informazioni_viaggio_paese_origine LONGTEXT DEFAULT NULL, osservazioni_educatori LONGTEXT DEFAULT NULL, area_multidisciplinare LONGTEXT DEFAULT NULL, diario_interventi LONGTEXT DEFAULT NULL, UNIQUE INDEX UNIQ_8A9C42886E81060D (cartella_sociale_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE valutazione_multidisciplinare (id INT AUTO_INCREMENT NOT NULL, storia_id INT NOT NULL, tipologia VARCHAR(255) DEFAULT NULL, valutazione LONGTEXT DEFAULT NULL, UNIQUE INDEX UNIQ_14EF4DBAB2917D6A (storia_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE adozione ADD CONSTRAINT FK_8F59B53168F4D369 FOREIGN KEY (allegato_id) REFERENCES allegato (id)');
        $this->addSql('ALTER TABLE adozione ADD CONSTRAINT FK_8F59B531B2917D6A FOREIGN KEY (storia_id) REFERENCES storia (id)');
        $this->addSql('ALTER TABLE affido ADD CONSTRAINT FK_E1CF75AB68F4D369 FOREIGN KEY (allegato_id) REFERENCES allegato (id)');
        $this->addSql('ALTER TABLE affido ADD CONSTRAINT FK_E1CF75ABB2917D6A FOREIGN KEY (storia_id) REFERENCES storia (id)');
        $this->addSql('ALTER TABLE allontanamento ADD CONSTRAINT FK_651848EE84AC125A FOREIGN KEY (comunicazione_id) REFERENCES allegato (id)');
        $this->addSql('ALTER TABLE allontanamento ADD CONSTRAINT FK_651848EEB2917D6A FOREIGN KEY (storia_id) REFERENCES storia (id)');
        $this->addSql('ALTER TABLE cpa ADD CONSTRAINT FK_A05A8453B2917D6A FOREIGN KEY (storia_id) REFERENCES storia (id)');
        $this->addSql('ALTER TABLE hotspot ADD CONSTRAINT FK_48B38313B2917D6A FOREIGN KEY (storia_id) REFERENCES storia (id)');
        $this->addSql('ALTER TABLE parente ADD CONSTRAINT FK_984A83B68F4D369 FOREIGN KEY (allegato_id) REFERENCES allegato (id)');
        $this->addSql('ALTER TABLE parente ADD CONSTRAINT FK_984A83BB2917D6A FOREIGN KEY (storia_id) REFERENCES storia (id)');
        $this->addSql('ALTER TABLE percorso_migratorio ADD CONSTRAINT FK_4D07204BB2917D6A FOREIGN KEY (storia_id) REFERENCES storia (id)');
        $this->addSql('ALTER TABLE progetto_educativo_individuale ADD CONSTRAINT FK_A4A0C3A884AC125A FOREIGN KEY (comunicazione_id) REFERENCES allegato (id)');
        $this->addSql('ALTER TABLE progetto_educativo_individuale ADD CONSTRAINT FK_A4A0C3A8B2917D6A FOREIGN KEY (storia_id) REFERENCES storia (id)');
        $this->addSql('ALTER TABLE relazione_assistente_sociale ADD CONSTRAINT FK_8873CD077B0279B9 FOREIGN KEY (relazione_id) REFERENCES allegato (id)');
        $this->addSql('ALTER TABLE relazione_assistente_sociale ADD CONSTRAINT FK_8873CD07B2917D6A FOREIGN KEY (storia_id) REFERENCES storia (id)');
        $this->addSql('ALTER TABLE seconda_accoglienza ADD CONSTRAINT FK_F1BD4A50B2917D6A FOREIGN KEY (storia_id) REFERENCES storia (id)');
        $this->addSql('ALTER TABLE storia ADD CONSTRAINT FK_8A9C42886E81060D FOREIGN KEY (cartella_sociale_id) REFERENCES cartella_sociale (id)');
        $this->addSql('ALTER TABLE valutazione_multidisciplinare ADD CONSTRAINT FK_14EF4DBAB2917D6A FOREIGN KEY (storia_id) REFERENCES storia (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE adozione DROP FOREIGN KEY FK_8F59B53168F4D369');
        $this->addSql('ALTER TABLE adozione DROP FOREIGN KEY FK_8F59B531B2917D6A');
        $this->addSql('ALTER TABLE affido DROP FOREIGN KEY FK_E1CF75AB68F4D369');
        $this->addSql('ALTER TABLE affido DROP FOREIGN KEY FK_E1CF75ABB2917D6A');
        $this->addSql('ALTER TABLE allontanamento DROP FOREIGN KEY FK_651848EE84AC125A');
        $this->addSql('ALTER TABLE allontanamento DROP FOREIGN KEY FK_651848EEB2917D6A');
        $this->addSql('ALTER TABLE cpa DROP FOREIGN KEY FK_A05A8453B2917D6A');
        $this->addSql('ALTER TABLE hotspot DROP FOREIGN KEY FK_48B38313B2917D6A');
        $this->addSql('ALTER TABLE parente DROP FOREIGN KEY FK_984A83B68F4D369');
        $this->addSql('ALTER TABLE parente DROP FOREIGN KEY FK_984A83BB2917D6A');
        $this->addSql('ALTER TABLE percorso_migratorio DROP FOREIGN KEY FK_4D07204BB2917D6A');
        $this->addSql('ALTER TABLE progetto_educativo_individuale DROP FOREIGN KEY FK_A4A0C3A884AC125A');
        $this->addSql('ALTER TABLE progetto_educativo_individuale DROP FOREIGN KEY FK_A4A0C3A8B2917D6A');
        $this->addSql('ALTER TABLE relazione_assistente_sociale DROP FOREIGN KEY FK_8873CD077B0279B9');
        $this->addSql('ALTER TABLE relazione_assistente_sociale DROP FOREIGN KEY FK_8873CD07B2917D6A');
        $this->addSql('ALTER TABLE seconda_accoglienza DROP FOREIGN KEY FK_F1BD4A50B2917D6A');
        $this->addSql('ALTER TABLE storia DROP FOREIGN KEY FK_8A9C42886E81060D');
        $this->addSql('ALTER TABLE valutazione_multidisciplinare DROP FOREIGN KEY FK_14EF4DBAB2917D6A');
        $this->addSql('DROP TABLE adozione');
        $this->addSql('DROP TABLE affido');
        $this->addSql('DROP TABLE allontanamento');
        $this->addSql('DROP TABLE cpa');
        $this->addSql('DROP TABLE hotspot');
        $this->addSql('DROP TABLE parente');
        $this->addSql('DROP TABLE percorso_migratorio');
        $this->addSql('DROP TABLE progetto_educativo_individuale');
        $this->addSql('DROP TABLE relazione_assistente_sociale');
        $this->addSql('DROP TABLE seconda_accoglienza');
        $this->addSql('DROP TABLE storia');
        $this->addSql('DROP TABLE valutazione_multidisciplinare');
    }
}
