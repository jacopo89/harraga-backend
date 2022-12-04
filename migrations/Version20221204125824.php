<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221204125824 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE amministrativa ADD delega_amministrativa_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE amministrativa ADD CONSTRAINT FK_13F7B379CF34DC28 FOREIGN KEY (delega_amministrativa_id) REFERENCES delega_amministrativa (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_13F7B379CF34DC28 ON amministrativa (delega_amministrativa_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE amministrativa DROP FOREIGN KEY FK_13F7B379CF34DC28');
        $this->addSql('DROP INDEX UNIQ_13F7B379CF34DC28 ON amministrativa');
        $this->addSql('ALTER TABLE amministrativa DROP delega_amministrativa_id');
    }
}
