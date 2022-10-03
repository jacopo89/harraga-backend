<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221002151355 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE anagrafica (id INT AUTO_INCREMENT NOT NULL, cartella_sociale_id INT NOT NULL, nome VARCHAR(255) NOT NULL, cognome VARCHAR(255) NOT NULL, numero_tutela VARCHAR(255) NOT NULL, a�ltro_nome VARCHAR(255) DEFAULT NULL, italiano TINYINT(1) DEFAULT NULL, sesso VARCHAR(255) DEFAULT NULL, luogo_nascita VARCHAR(255) DEFAULT NULL, paese_origine VARCHAR(255) DEFAULT NULL, cittadinanza VARCHAR(255) DEFAULT NULL, data_nascita_prima_identificazione VARCHAR(255) DEFAULT NULL, data_nascita_corretta VARCHAR(255) DEFAULT NULL, lingua_madre VARCHAR(255) DEFAULT NULL, gruppo_etnico_appartenenza VARCHAR(255) DEFAULT NULL, data_arrivo_in_italia DATE DEFAULT NULL, luogo_arrivo_in_italia VARCHAR(255) DEFAULT NULL, UNIQUE INDEX UNIQ_D4C84CAD6E81060D (cartella_sociale_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE cartella_sociale (id INT AUTO_INCREMENT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(255) NOT NULL, created_at DATETIME NOT NULL, available_at DATETIME NOT NULL, delivered_at DATETIME DEFAULT NULL, INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE anagrafica ADD CONSTRAINT FK_D4C84CAD6E81060D FOREIGN KEY (cartella_sociale_id) REFERENCES cartella_sociale (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE anagrafica DROP FOREIGN KEY FK_D4C84CAD6E81060D');
        $this->addSql('DROP TABLE anagrafica');
        $this->addSql('DROP TABLE cartella_sociale');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
