<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221009075901 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE associazione (id INT AUTO_INCREMENT NOT NULL, certificazione_id INT DEFAULT NULL, socialita_id INT NOT NULL, pregressa VARCHAR(255) DEFAULT NULL, tipo VARCHAR(255) DEFAULT NULL, data_inizio VARCHAR(255) DEFAULT NULL, data_fine VARCHAR(255) DEFAULT NULL, nome_referente VARCHAR(255) DEFAULT NULL, cognome_referente VARCHAR(255) DEFAULT NULL, email_referente VARCHAR(255) DEFAULT NULL, telefono_referente VARCHAR(255) DEFAULT NULL, UNIQUE INDEX UNIQ_C2C5CF818A2F8A6C (certificazione_id), INDEX IDX_C2C5CF8148596D74 (socialita_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE attivita_sportiva (id INT AUTO_INCREMENT NOT NULL, certificazione_id INT DEFAULT NULL, socialita_id INT NOT NULL, pregressa VARCHAR(255) DEFAULT NULL, tipo VARCHAR(255) DEFAULT NULL, data_inizio VARCHAR(255) DEFAULT NULL, data_fine VARCHAR(255) DEFAULT NULL, nome_referente VARCHAR(255) DEFAULT NULL, cognome_referente VARCHAR(255) DEFAULT NULL, email_referente VARCHAR(255) DEFAULT NULL, telefono_referente VARCHAR(255) DEFAULT NULL, UNIQUE INDEX UNIQ_BE0368328A2F8A6C (certificazione_id), INDEX IDX_BE03683248596D74 (socialita_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE esperienza_volontariato (id INT AUTO_INCREMENT NOT NULL, certificazione_id INT DEFAULT NULL, socialita_id INT NOT NULL, stato VARCHAR(255) DEFAULT NULL, tipo VARCHAR(255) DEFAULT NULL, data_inizio VARCHAR(255) DEFAULT NULL, data_fine VARCHAR(255) DEFAULT NULL, competenze_acquisite LONGTEXT DEFAULT NULL, nome_referente VARCHAR(255) DEFAULT NULL, cognome_referente VARCHAR(255) DEFAULT NULL, email_referente VARCHAR(255) DEFAULT NULL, telefono_referente VARCHAR(255) DEFAULT NULL, UNIQUE INDEX UNIQ_873FF6398A2F8A6C (certificazione_id), INDEX IDX_873FF63948596D74 (socialita_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE laboratorio (id INT AUTO_INCREMENT NOT NULL, certificazione_id INT DEFAULT NULL, socialita_id INT NOT NULL, pregressa VARCHAR(255) DEFAULT NULL, tipo VARCHAR(255) DEFAULT NULL, data_inizio VARCHAR(255) DEFAULT NULL, data_fine VARCHAR(255) DEFAULT NULL, nome_referente VARCHAR(255) DEFAULT NULL, cognome_referente VARCHAR(255) DEFAULT NULL, email_referente VARCHAR(255) DEFAULT NULL, telefono_referente VARCHAR(255) DEFAULT NULL, UNIQUE INDEX UNIQ_9D3D6DD68A2F8A6C (certificazione_id), INDEX IDX_9D3D6DD648596D74 (socialita_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE socialita (id INT AUTO_INCREMENT NOT NULL, cartella_sociale_id INT NOT NULL, UNIQUE INDEX UNIQ_500B5A966E81060D (cartella_sociale_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE associazione ADD CONSTRAINT FK_C2C5CF818A2F8A6C FOREIGN KEY (certificazione_id) REFERENCES allegato (id)');
        $this->addSql('ALTER TABLE associazione ADD CONSTRAINT FK_C2C5CF8148596D74 FOREIGN KEY (socialita_id) REFERENCES socialita (id)');
        $this->addSql('ALTER TABLE attivita_sportiva ADD CONSTRAINT FK_BE0368328A2F8A6C FOREIGN KEY (certificazione_id) REFERENCES allegato (id)');
        $this->addSql('ALTER TABLE attivita_sportiva ADD CONSTRAINT FK_BE03683248596D74 FOREIGN KEY (socialita_id) REFERENCES socialita (id)');
        $this->addSql('ALTER TABLE esperienza_volontariato ADD CONSTRAINT FK_873FF6398A2F8A6C FOREIGN KEY (certificazione_id) REFERENCES allegato (id)');
        $this->addSql('ALTER TABLE esperienza_volontariato ADD CONSTRAINT FK_873FF63948596D74 FOREIGN KEY (socialita_id) REFERENCES socialita (id)');
        $this->addSql('ALTER TABLE laboratorio ADD CONSTRAINT FK_9D3D6DD68A2F8A6C FOREIGN KEY (certificazione_id) REFERENCES allegato (id)');
        $this->addSql('ALTER TABLE laboratorio ADD CONSTRAINT FK_9D3D6DD648596D74 FOREIGN KEY (socialita_id) REFERENCES socialita (id)');
        $this->addSql('ALTER TABLE socialita ADD CONSTRAINT FK_500B5A966E81060D FOREIGN KEY (cartella_sociale_id) REFERENCES cartella_sociale (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE associazione DROP FOREIGN KEY FK_C2C5CF818A2F8A6C');
        $this->addSql('ALTER TABLE associazione DROP FOREIGN KEY FK_C2C5CF8148596D74');
        $this->addSql('ALTER TABLE attivita_sportiva DROP FOREIGN KEY FK_BE0368328A2F8A6C');
        $this->addSql('ALTER TABLE attivita_sportiva DROP FOREIGN KEY FK_BE03683248596D74');
        $this->addSql('ALTER TABLE esperienza_volontariato DROP FOREIGN KEY FK_873FF6398A2F8A6C');
        $this->addSql('ALTER TABLE esperienza_volontariato DROP FOREIGN KEY FK_873FF63948596D74');
        $this->addSql('ALTER TABLE laboratorio DROP FOREIGN KEY FK_9D3D6DD68A2F8A6C');
        $this->addSql('ALTER TABLE laboratorio DROP FOREIGN KEY FK_9D3D6DD648596D74');
        $this->addSql('ALTER TABLE socialita DROP FOREIGN KEY FK_500B5A966E81060D');
        $this->addSql('DROP TABLE associazione');
        $this->addSql('DROP TABLE attivita_sportiva');
        $this->addSql('DROP TABLE esperienza_volontariato');
        $this->addSql('DROP TABLE laboratorio');
        $this->addSql('DROP TABLE socialita');
    }
}
