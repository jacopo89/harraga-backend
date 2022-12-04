<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221204153324 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE medico_curante DROP FOREIGN KEY FK_197A26924B3C3226');
        $this->addSql('DROP INDEX UNIQ_197A26924B3C3226 ON medico_curante');
        $this->addSql('ALTER TABLE medico_curante DROP sanitaria_id');
        $this->addSql('ALTER TABLE preso_in_carico DROP FOREIGN KEY FK_CE56C8E54B3C3226');
        $this->addSql('DROP INDEX UNIQ_CE56C8E54B3C3226 ON preso_in_carico');
        $this->addSql('ALTER TABLE preso_in_carico DROP sanitaria_id');
        $this->addSql('ALTER TABLE sanitaria ADD medico_curante_id INT DEFAULT NULL, ADD preso_in_carico_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE sanitaria ADD CONSTRAINT FK_9123C9C6EBD8B2B1 FOREIGN KEY (medico_curante_id) REFERENCES medico_curante (id)');
        $this->addSql('ALTER TABLE sanitaria ADD CONSTRAINT FK_9123C9C648437E32 FOREIGN KEY (preso_in_carico_id) REFERENCES preso_in_carico (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_9123C9C6EBD8B2B1 ON sanitaria (medico_curante_id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_9123C9C648437E32 ON sanitaria (preso_in_carico_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE medico_curante ADD sanitaria_id INT NOT NULL');
        $this->addSql('ALTER TABLE medico_curante ADD CONSTRAINT FK_197A26924B3C3226 FOREIGN KEY (sanitaria_id) REFERENCES sanitaria (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_197A26924B3C3226 ON medico_curante (sanitaria_id)');
        $this->addSql('ALTER TABLE preso_in_carico ADD sanitaria_id INT NOT NULL');
        $this->addSql('ALTER TABLE preso_in_carico ADD CONSTRAINT FK_CE56C8E54B3C3226 FOREIGN KEY (sanitaria_id) REFERENCES sanitaria (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_CE56C8E54B3C3226 ON preso_in_carico (sanitaria_id)');
        $this->addSql('ALTER TABLE sanitaria DROP FOREIGN KEY FK_9123C9C6EBD8B2B1');
        $this->addSql('ALTER TABLE sanitaria DROP FOREIGN KEY FK_9123C9C648437E32');
        $this->addSql('DROP INDEX UNIQ_9123C9C6EBD8B2B1 ON sanitaria');
        $this->addSql('DROP INDEX UNIQ_9123C9C648437E32 ON sanitaria');
        $this->addSql('ALTER TABLE sanitaria DROP medico_curante_id, DROP preso_in_carico_id');
    }
}
