<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221003132755 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE documento_identita ADD allegato_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE documento_identita ADD CONSTRAINT FK_2DF29E6B68F4D369 FOREIGN KEY (allegato_id) REFERENCES allegato (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_2DF29E6B68F4D369 ON documento_identita (allegato_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE documento_identita DROP FOREIGN KEY FK_2DF29E6B68F4D369');
        $this->addSql('DROP INDEX UNIQ_2DF29E6B68F4D369 ON documento_identita');
        $this->addSql('ALTER TABLE documento_identita DROP allegato_id');
    }
}
