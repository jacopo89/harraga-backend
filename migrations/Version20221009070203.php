<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221009070203 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE altra_competenza (id INT AUTO_INCREMENT NOT NULL, certificazione_id INT DEFAULT NULL, competenze_id INT NOT NULL, tipo VARCHAR(255) DEFAULT NULL, descrizione LONGTEXT DEFAULT NULL, livello VARCHAR(255) DEFAULT NULL, UNIQUE INDEX UNIQ_E6B02A588A2F8A6C (certificazione_id), INDEX IDX_E6B02A587886E858 (competenze_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE competenza_digitale (id INT AUTO_INCREMENT NOT NULL, certificazione_id INT DEFAULT NULL, competenze_id INT NOT NULL, tipo VARCHAR(255) DEFAULT NULL, descrizione LONGTEXT DEFAULT NULL, livello VARCHAR(255) DEFAULT NULL, UNIQUE INDEX UNIQ_F059AE3D8A2F8A6C (certificazione_id), INDEX IDX_F059AE3D7886E858 (competenze_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE competenze (id INT AUTO_INCREMENT NOT NULL, cartella_sociale_id INT NOT NULL, UNIQUE INDEX UNIQ_FD4C1676E81060D (cartella_sociale_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE lingua_attestata (id INT AUTO_INCREMENT NOT NULL, certificazione_id INT DEFAULT NULL, competenze_id INT NOT NULL, lingua VARCHAR(255) DEFAULT NULL, livello_scritto VARCHAR(255) DEFAULT NULL, livello_orale VARCHAR(255) DEFAULT NULL, UNIQUE INDEX UNIQ_563EA2438A2F8A6C (certificazione_id), INDEX IDX_563EA2437886E858 (competenze_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE lingua_certificata (id INT AUTO_INCREMENT NOT NULL, certificazione_id INT DEFAULT NULL, competenze_id INT NOT NULL, lingua VARCHAR(255) DEFAULT NULL, livello_scritto VARCHAR(255) DEFAULT NULL, livello_orale VARCHAR(255) DEFAULT NULL, UNIQUE INDEX UNIQ_F0B628208A2F8A6C (certificazione_id), INDEX IDX_F0B628207886E858 (competenze_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE lingua_dichiarata (id INT AUTO_INCREMENT NOT NULL, competenze_id INT NOT NULL, lingua VARCHAR(255) DEFAULT NULL, livello_scritto VARCHAR(255) DEFAULT NULL, livello_orale VARCHAR(255) DEFAULT NULL, INDEX IDX_CE82E1AA7886E858 (competenze_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE patente (id INT AUTO_INCREMENT NOT NULL, allegato_id INT DEFAULT NULL, competenze_id INT NOT NULL, descrizione VARCHAR(255) DEFAULT NULL, UNIQUE INDEX UNIQ_86C45D9B68F4D369 (allegato_id), INDEX IDX_86C45D9B7886E858 (competenze_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE altra_competenza ADD CONSTRAINT FK_E6B02A588A2F8A6C FOREIGN KEY (certificazione_id) REFERENCES allegato (id)');
        $this->addSql('ALTER TABLE altra_competenza ADD CONSTRAINT FK_E6B02A587886E858 FOREIGN KEY (competenze_id) REFERENCES competenze (id)');
        $this->addSql('ALTER TABLE competenza_digitale ADD CONSTRAINT FK_F059AE3D8A2F8A6C FOREIGN KEY (certificazione_id) REFERENCES allegato (id)');
        $this->addSql('ALTER TABLE competenza_digitale ADD CONSTRAINT FK_F059AE3D7886E858 FOREIGN KEY (competenze_id) REFERENCES competenze (id)');
        $this->addSql('ALTER TABLE competenze ADD CONSTRAINT FK_FD4C1676E81060D FOREIGN KEY (cartella_sociale_id) REFERENCES cartella_sociale (id)');
        $this->addSql('ALTER TABLE lingua_attestata ADD CONSTRAINT FK_563EA2438A2F8A6C FOREIGN KEY (certificazione_id) REFERENCES allegato (id)');
        $this->addSql('ALTER TABLE lingua_attestata ADD CONSTRAINT FK_563EA2437886E858 FOREIGN KEY (competenze_id) REFERENCES competenze (id)');
        $this->addSql('ALTER TABLE lingua_certificata ADD CONSTRAINT FK_F0B628208A2F8A6C FOREIGN KEY (certificazione_id) REFERENCES allegato (id)');
        $this->addSql('ALTER TABLE lingua_certificata ADD CONSTRAINT FK_F0B628207886E858 FOREIGN KEY (competenze_id) REFERENCES competenze (id)');
        $this->addSql('ALTER TABLE lingua_dichiarata ADD CONSTRAINT FK_CE82E1AA7886E858 FOREIGN KEY (competenze_id) REFERENCES competenze (id)');
        $this->addSql('ALTER TABLE patente ADD CONSTRAINT FK_86C45D9B68F4D369 FOREIGN KEY (allegato_id) REFERENCES allegato (id)');
        $this->addSql('ALTER TABLE patente ADD CONSTRAINT FK_86C45D9B7886E858 FOREIGN KEY (competenze_id) REFERENCES competenze (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE altra_competenza DROP FOREIGN KEY FK_E6B02A588A2F8A6C');
        $this->addSql('ALTER TABLE altra_competenza DROP FOREIGN KEY FK_E6B02A587886E858');
        $this->addSql('ALTER TABLE competenza_digitale DROP FOREIGN KEY FK_F059AE3D8A2F8A6C');
        $this->addSql('ALTER TABLE competenza_digitale DROP FOREIGN KEY FK_F059AE3D7886E858');
        $this->addSql('ALTER TABLE competenze DROP FOREIGN KEY FK_FD4C1676E81060D');
        $this->addSql('ALTER TABLE lingua_attestata DROP FOREIGN KEY FK_563EA2438A2F8A6C');
        $this->addSql('ALTER TABLE lingua_attestata DROP FOREIGN KEY FK_563EA2437886E858');
        $this->addSql('ALTER TABLE lingua_certificata DROP FOREIGN KEY FK_F0B628208A2F8A6C');
        $this->addSql('ALTER TABLE lingua_certificata DROP FOREIGN KEY FK_F0B628207886E858');
        $this->addSql('ALTER TABLE lingua_dichiarata DROP FOREIGN KEY FK_CE82E1AA7886E858');
        $this->addSql('ALTER TABLE patente DROP FOREIGN KEY FK_86C45D9B68F4D369');
        $this->addSql('ALTER TABLE patente DROP FOREIGN KEY FK_86C45D9B7886E858');
        $this->addSql('DROP TABLE altra_competenza');
        $this->addSql('DROP TABLE competenza_digitale');
        $this->addSql('DROP TABLE competenze');
        $this->addSql('DROP TABLE lingua_attestata');
        $this->addSql('DROP TABLE lingua_certificata');
        $this->addSql('DROP TABLE lingua_dichiarata');
        $this->addSql('DROP TABLE patente');
    }
}
