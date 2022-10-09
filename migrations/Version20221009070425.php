<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221009070425 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE desideri (id INT AUTO_INCREMENT NOT NULL, cartella_sociale_id INT NOT NULL, aspirazioni LONGTEXT DEFAULT NULL, ascolto_minore LONGTEXT DEFAULT NULL, UNIQUE INDEX UNIQ_22A6D32E6E81060D (cartella_sociale_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE desideri ADD CONSTRAINT FK_22A6D32E6E81060D FOREIGN KEY (cartella_sociale_id) REFERENCES cartella_sociale (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE desideri DROP FOREIGN KEY FK_22A6D32E6E81060D');
        $this->addSql('DROP TABLE desideri');
    }
}
