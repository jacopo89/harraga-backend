<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221003122317 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE mediatore (id INT AUTO_INCREMENT NOT NULL, nome VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE anagrafica ADD mediatore_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE anagrafica ADD CONSTRAINT FK_D4C84CAD2F494328 FOREIGN KEY (mediatore_id) REFERENCES mediatore (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_D4C84CAD2F494328 ON anagrafica (mediatore_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE anagrafica DROP FOREIGN KEY FK_D4C84CAD2F494328');
        $this->addSql('DROP TABLE mediatore');
        $this->addSql('DROP INDEX UNIQ_D4C84CAD2F494328 ON anagrafica');
        $this->addSql('ALTER TABLE anagrafica DROP mediatore_id');
    }
}
