<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221204161610 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE vaccino ADD allegato_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE vaccino ADD CONSTRAINT FK_470879AF68F4D369 FOREIGN KEY (allegato_id) REFERENCES allegato (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_470879AF68F4D369 ON vaccino (allegato_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE vaccino DROP FOREIGN KEY FK_470879AF68F4D369');
        $this->addSql('DROP INDEX UNIQ_470879AF68F4D369 ON vaccino');
        $this->addSql('ALTER TABLE vaccino DROP allegato_id');
    }
}
