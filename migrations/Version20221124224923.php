<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221124224923 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE procedura_penale ADD penale_id INT NOT NULL');
        $this->addSql('ALTER TABLE procedura_penale ADD CONSTRAINT FK_9FEE19CF5FBA13BC FOREIGN KEY (penale_id) REFERENCES penale (id)');
        $this->addSql('CREATE INDEX IDX_9FEE19CF5FBA13BC ON procedura_penale (penale_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE procedura_penale DROP FOREIGN KEY FK_9FEE19CF5FBA13BC');
        $this->addSql('DROP INDEX IDX_9FEE19CF5FBA13BC ON procedura_penale');
        $this->addSql('ALTER TABLE procedura_penale DROP penale_id');
    }
}
