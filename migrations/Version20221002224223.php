<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221002224223 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE allegato (id INT AUTO_INCREMENT NOT NULL, filename VARCHAR(255) NOT NULL, ext VARCHAR(255) NOT NULL, sub_dir VARCHAR(255) NOT NULL, path VARCHAR(255) NOT NULL, url VARCHAR(255) NOT NULL, weight INT NOT NULL, width INT DEFAULT NULL, height INT DEFAULT NULL, md5 VARCHAR(255) NOT NULL, title VARCHAR(255) DEFAULT NULL, description VARCHAR(255) DEFAULT NULL, mime_type VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE documento_identita (id INT AUTO_INCREMENT NOT NULL, anagrafica_id INT NOT NULL, allegato_id INT NOT NULL, INDEX IDX_2DF29E6B7E92415C (anagrafica_id), UNIQUE INDEX UNIQ_2DF29E6B68F4D369 (allegato_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE documento_identita ADD CONSTRAINT FK_2DF29E6B7E92415C FOREIGN KEY (anagrafica_id) REFERENCES anagrafica (id)');
        $this->addSql('ALTER TABLE documento_identita ADD CONSTRAINT FK_2DF29E6B68F4D369 FOREIGN KEY (allegato_id) REFERENCES allegato (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE documento_identita DROP FOREIGN KEY FK_2DF29E6B7E92415C');
        $this->addSql('ALTER TABLE documento_identita DROP FOREIGN KEY FK_2DF29E6B68F4D369');
        $this->addSql('DROP TABLE allegato');
        $this->addSql('DROP TABLE documento_identita');
    }
}
