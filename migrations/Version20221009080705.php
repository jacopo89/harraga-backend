<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221009080705 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE utente (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_DE45B3E0E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE utente_cartella_sociale (id INT AUTO_INCREMENT NOT NULL, utente_id INT NOT NULL, cartella_sociale_id INT NOT NULL, ruolo VARCHAR(255) NOT NULL, INDEX IDX_E34091BD6FD5D2A (utente_id), INDEX IDX_E34091BD6E81060D (cartella_sociale_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE utente_cartella_sociale ADD CONSTRAINT FK_E34091BD6FD5D2A FOREIGN KEY (utente_id) REFERENCES utente (id)');
        $this->addSql('ALTER TABLE utente_cartella_sociale ADD CONSTRAINT FK_E34091BD6E81060D FOREIGN KEY (cartella_sociale_id) REFERENCES cartella_sociale (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE utente_cartella_sociale DROP FOREIGN KEY FK_E34091BD6FD5D2A');
        $this->addSql('ALTER TABLE utente_cartella_sociale DROP FOREIGN KEY FK_E34091BD6E81060D');
        $this->addSql('DROP TABLE utente');
        $this->addSql('DROP TABLE utente_cartella_sociale');
    }
}
