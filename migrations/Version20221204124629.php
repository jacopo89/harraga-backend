<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221204124629 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE cpa DROP FOREIGN KEY FK_A05A8453B2917D6A');
        $this->addSql('DROP INDEX UNIQ_A05A8453B2917D6A ON cpa');
        $this->addSql('ALTER TABLE cpa DROP storia_id');
        $this->addSql('ALTER TABLE hotspot DROP FOREIGN KEY FK_48B38313B2917D6A');
        $this->addSql('DROP INDEX UNIQ_48B38313B2917D6A ON hotspot');
        $this->addSql('ALTER TABLE hotspot DROP storia_id');
        $this->addSql('ALTER TABLE seconda_accoglienza DROP FOREIGN KEY FK_F1BD4A50B2917D6A');
        $this->addSql('DROP INDEX UNIQ_F1BD4A50B2917D6A ON seconda_accoglienza');
        $this->addSql('ALTER TABLE seconda_accoglienza DROP storia_id');
        $this->addSql('ALTER TABLE storia ADD hotspot_id INT DEFAULT NULL, ADD c_pa_id INT DEFAULT NULL, ADD seconda_accoglienza_id INT DEFAULT NULL, ADD valutazione_multidisciplinare_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE storia ADD CONSTRAINT FK_8A9C42883AE7F1EF FOREIGN KEY (hotspot_id) REFERENCES hotspot (id)');
        $this->addSql('ALTER TABLE storia ADD CONSTRAINT FK_8A9C428839A25FAF FOREIGN KEY (c_pa_id) REFERENCES cpa (id)');
        $this->addSql('ALTER TABLE storia ADD CONSTRAINT FK_8A9C4288B5BB83CF FOREIGN KEY (seconda_accoglienza_id) REFERENCES seconda_accoglienza (id)');
        $this->addSql('ALTER TABLE storia ADD CONSTRAINT FK_8A9C4288DBEA7043 FOREIGN KEY (valutazione_multidisciplinare_id) REFERENCES valutazione_multidisciplinare (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_8A9C42883AE7F1EF ON storia (hotspot_id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_8A9C428839A25FAF ON storia (c_pa_id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_8A9C4288B5BB83CF ON storia (seconda_accoglienza_id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_8A9C4288DBEA7043 ON storia (valutazione_multidisciplinare_id)');
        $this->addSql('ALTER TABLE valutazione_multidisciplinare DROP FOREIGN KEY FK_14EF4DBAB2917D6A');
        $this->addSql('DROP INDEX UNIQ_14EF4DBAB2917D6A ON valutazione_multidisciplinare');
        $this->addSql('ALTER TABLE valutazione_multidisciplinare DROP storia_id');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE cpa ADD storia_id INT NOT NULL');
        $this->addSql('ALTER TABLE cpa ADD CONSTRAINT FK_A05A8453B2917D6A FOREIGN KEY (storia_id) REFERENCES storia (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_A05A8453B2917D6A ON cpa (storia_id)');
        $this->addSql('ALTER TABLE hotspot ADD storia_id INT NOT NULL');
        $this->addSql('ALTER TABLE hotspot ADD CONSTRAINT FK_48B38313B2917D6A FOREIGN KEY (storia_id) REFERENCES storia (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_48B38313B2917D6A ON hotspot (storia_id)');
        $this->addSql('ALTER TABLE seconda_accoglienza ADD storia_id INT NOT NULL');
        $this->addSql('ALTER TABLE seconda_accoglienza ADD CONSTRAINT FK_F1BD4A50B2917D6A FOREIGN KEY (storia_id) REFERENCES storia (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_F1BD4A50B2917D6A ON seconda_accoglienza (storia_id)');
        $this->addSql('ALTER TABLE storia DROP FOREIGN KEY FK_8A9C42883AE7F1EF');
        $this->addSql('ALTER TABLE storia DROP FOREIGN KEY FK_8A9C428839A25FAF');
        $this->addSql('ALTER TABLE storia DROP FOREIGN KEY FK_8A9C4288B5BB83CF');
        $this->addSql('ALTER TABLE storia DROP FOREIGN KEY FK_8A9C4288DBEA7043');
        $this->addSql('DROP INDEX UNIQ_8A9C42883AE7F1EF ON storia');
        $this->addSql('DROP INDEX UNIQ_8A9C428839A25FAF ON storia');
        $this->addSql('DROP INDEX UNIQ_8A9C4288B5BB83CF ON storia');
        $this->addSql('DROP INDEX UNIQ_8A9C4288DBEA7043 ON storia');
        $this->addSql('ALTER TABLE storia DROP hotspot_id, DROP c_pa_id, DROP seconda_accoglienza_id, DROP valutazione_multidisciplinare_id');
        $this->addSql('ALTER TABLE valutazione_multidisciplinare ADD storia_id INT NOT NULL');
        $this->addSql('ALTER TABLE valutazione_multidisciplinare ADD CONSTRAINT FK_14EF4DBAB2917D6A FOREIGN KEY (storia_id) REFERENCES storia (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_14EF4DBAB2917D6A ON valutazione_multidisciplinare (storia_id)');
    }
}
