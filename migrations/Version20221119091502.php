<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221119091502 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE utente_cartella_sociale MODIFY id INT NOT NULL');
        $this->addSql('ALTER TABLE utente_cartella_sociale DROP FOREIGN KEY FK_E34091BD6E81060D');
        $this->addSql('ALTER TABLE utente_cartella_sociale DROP FOREIGN KEY FK_E34091BD6FD5D2A');
        $this->addSql('DROP INDEX `primary` ON utente_cartella_sociale');
        $this->addSql('ALTER TABLE utente_cartella_sociale DROP id, DROP ruolo');
        $this->addSql('ALTER TABLE utente_cartella_sociale ADD CONSTRAINT FK_E34091BD6E81060D FOREIGN KEY (cartella_sociale_id) REFERENCES cartella_sociale (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE utente_cartella_sociale ADD CONSTRAINT FK_E34091BD6FD5D2A FOREIGN KEY (utente_id) REFERENCES utente (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE utente_cartella_sociale ADD PRIMARY KEY (utente_id, cartella_sociale_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE utente_cartella_sociale DROP FOREIGN KEY FK_E34091BD6FD5D2A');
        $this->addSql('ALTER TABLE utente_cartella_sociale DROP FOREIGN KEY FK_E34091BD6E81060D');
        $this->addSql('ALTER TABLE utente_cartella_sociale ADD id INT AUTO_INCREMENT NOT NULL, ADD ruolo VARCHAR(255) NOT NULL, DROP PRIMARY KEY, ADD PRIMARY KEY (id)');
        $this->addSql('ALTER TABLE utente_cartella_sociale ADD CONSTRAINT FK_E34091BD6FD5D2A FOREIGN KEY (utente_id) REFERENCES utente (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('ALTER TABLE utente_cartella_sociale ADD CONSTRAINT FK_E34091BD6E81060D FOREIGN KEY (cartella_sociale_id) REFERENCES cartella_sociale (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
    }
}
