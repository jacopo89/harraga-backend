<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221009072041 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE esperienza_lavorativa (id INT AUTO_INCREMENT NOT NULL, lavoro_id INT NOT NULL, stato VARCHAR(255) DEFAULT NULL, tipologia VARCHAR(255) DEFAULT NULL, ambiti_lavorativi VARCHAR(255) DEFAULT NULL, inquadramento_lavorativo VARCHAR(255) DEFAULT NULL, data_inizio VARCHAR(255) DEFAULT NULL, data_fine VARCHAR(255) DEFAULT NULL, nome_azienda VARCHAR(255) DEFAULT NULL, luogo_azienda VARCHAR(255) DEFAULT NULL, email_azienda VARCHAR(255) DEFAULT NULL, telefono_azienda VARCHAR(255) DEFAULT NULL, competenze_acquisite LONGTEXT DEFAULT NULL, INDEX IDX_9BFCB4104F52D67D (lavoro_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE lavoro (id INT AUTO_INCREMENT NOT NULL, cartella_sociale_id INT NOT NULL, UNIQUE INDEX UNIQ_A77D249F6E81060D (cartella_sociale_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE esperienza_lavorativa ADD CONSTRAINT FK_9BFCB4104F52D67D FOREIGN KEY (lavoro_id) REFERENCES lavoro (id)');
        $this->addSql('ALTER TABLE lavoro ADD CONSTRAINT FK_A77D249F6E81060D FOREIGN KEY (cartella_sociale_id) REFERENCES cartella_sociale (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE esperienza_lavorativa DROP FOREIGN KEY FK_9BFCB4104F52D67D');
        $this->addSql('ALTER TABLE lavoro DROP FOREIGN KEY FK_A77D249F6E81060D');
        $this->addSql('DROP TABLE esperienza_lavorativa');
        $this->addSql('DROP TABLE lavoro');
    }
}
