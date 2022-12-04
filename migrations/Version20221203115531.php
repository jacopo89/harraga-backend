<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221203115531 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE affidamento DROP FOREIGN KEY FK_C3E5E948D1500C38');
        $this->addSql('DROP INDEX UNIQ_C3E5E948D1500C38 ON affidamento');
        $this->addSql('ALTER TABLE affidamento DROP amministrativa_id');
        $this->addSql('ALTER TABLE amministrativa ADD riferimento_legale_id INT DEFAULT NULL, ADD revoca_tutela_id INT DEFAULT NULL, ADD foto_segnalazione_id INT DEFAULT NULL, ADD proseguimento_amministrativo_id INT DEFAULT NULL, ADD affidamento_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE amministrativa ADD CONSTRAINT FK_13F7B379739DB0FE FOREIGN KEY (riferimento_legale_id) REFERENCES riferimento_legale (id)');
        $this->addSql('ALTER TABLE amministrativa ADD CONSTRAINT FK_13F7B37937DA8AEE FOREIGN KEY (revoca_tutela_id) REFERENCES revoca_tutela (id)');
        $this->addSql('ALTER TABLE amministrativa ADD CONSTRAINT FK_13F7B379683693C2 FOREIGN KEY (foto_segnalazione_id) REFERENCES foto_segnalazione (id)');
        $this->addSql('ALTER TABLE amministrativa ADD CONSTRAINT FK_13F7B379D23C788E FOREIGN KEY (proseguimento_amministrativo_id) REFERENCES proseguimento_amministrativo (id)');
        $this->addSql('ALTER TABLE amministrativa ADD CONSTRAINT FK_13F7B379471447D9 FOREIGN KEY (affidamento_id) REFERENCES affidamento (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_13F7B379739DB0FE ON amministrativa (riferimento_legale_id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_13F7B37937DA8AEE ON amministrativa (revoca_tutela_id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_13F7B379683693C2 ON amministrativa (foto_segnalazione_id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_13F7B379D23C788E ON amministrativa (proseguimento_amministrativo_id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_13F7B379471447D9 ON amministrativa (affidamento_id)');
        $this->addSql('ALTER TABLE foto_segnalazione DROP FOREIGN KEY FK_E455F45CD1500C38');
        $this->addSql('DROP INDEX UNIQ_E455F45CD1500C38 ON foto_segnalazione');
        $this->addSql('ALTER TABLE foto_segnalazione DROP amministrativa_id');
        $this->addSql('ALTER TABLE proseguimento_amministrativo DROP FOREIGN KEY FK_A88383ACD1500C38');
        $this->addSql('DROP INDEX UNIQ_A88383ACD1500C38 ON proseguimento_amministrativo');
        $this->addSql('ALTER TABLE proseguimento_amministrativo DROP amministrativa_id');
        $this->addSql('ALTER TABLE revoca_tutela DROP FOREIGN KEY FK_759BC0FD1500C38');
        $this->addSql('DROP INDEX UNIQ_759BC0FD1500C38 ON revoca_tutela');
        $this->addSql('ALTER TABLE revoca_tutela DROP amministrativa_id');
        $this->addSql('ALTER TABLE riferimento_legale DROP FOREIGN KEY FK_3C236902D1500C38');
        $this->addSql('DROP INDEX UNIQ_3C236902D1500C38 ON riferimento_legale');
        $this->addSql('ALTER TABLE riferimento_legale DROP amministrativa_id');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE affidamento ADD amministrativa_id INT NOT NULL');
        $this->addSql('ALTER TABLE affidamento ADD CONSTRAINT FK_C3E5E948D1500C38 FOREIGN KEY (amministrativa_id) REFERENCES amministrativa (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_C3E5E948D1500C38 ON affidamento (amministrativa_id)');
        $this->addSql('ALTER TABLE amministrativa DROP FOREIGN KEY FK_13F7B379739DB0FE');
        $this->addSql('ALTER TABLE amministrativa DROP FOREIGN KEY FK_13F7B37937DA8AEE');
        $this->addSql('ALTER TABLE amministrativa DROP FOREIGN KEY FK_13F7B379683693C2');
        $this->addSql('ALTER TABLE amministrativa DROP FOREIGN KEY FK_13F7B379D23C788E');
        $this->addSql('ALTER TABLE amministrativa DROP FOREIGN KEY FK_13F7B379471447D9');
        $this->addSql('DROP INDEX UNIQ_13F7B379739DB0FE ON amministrativa');
        $this->addSql('DROP INDEX UNIQ_13F7B37937DA8AEE ON amministrativa');
        $this->addSql('DROP INDEX UNIQ_13F7B379683693C2 ON amministrativa');
        $this->addSql('DROP INDEX UNIQ_13F7B379D23C788E ON amministrativa');
        $this->addSql('DROP INDEX UNIQ_13F7B379471447D9 ON amministrativa');
        $this->addSql('ALTER TABLE amministrativa DROP riferimento_legale_id, DROP revoca_tutela_id, DROP foto_segnalazione_id, DROP proseguimento_amministrativo_id, DROP affidamento_id');
        $this->addSql('ALTER TABLE foto_segnalazione ADD amministrativa_id INT NOT NULL');
        $this->addSql('ALTER TABLE foto_segnalazione ADD CONSTRAINT FK_E455F45CD1500C38 FOREIGN KEY (amministrativa_id) REFERENCES amministrativa (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_E455F45CD1500C38 ON foto_segnalazione (amministrativa_id)');
        $this->addSql('ALTER TABLE proseguimento_amministrativo ADD amministrativa_id INT NOT NULL');
        $this->addSql('ALTER TABLE proseguimento_amministrativo ADD CONSTRAINT FK_A88383ACD1500C38 FOREIGN KEY (amministrativa_id) REFERENCES amministrativa (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_A88383ACD1500C38 ON proseguimento_amministrativo (amministrativa_id)');
        $this->addSql('ALTER TABLE revoca_tutela ADD amministrativa_id INT NOT NULL');
        $this->addSql('ALTER TABLE revoca_tutela ADD CONSTRAINT FK_759BC0FD1500C38 FOREIGN KEY (amministrativa_id) REFERENCES amministrativa (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_759BC0FD1500C38 ON revoca_tutela (amministrativa_id)');
        $this->addSql('ALTER TABLE riferimento_legale ADD amministrativa_id INT NOT NULL');
        $this->addSql('ALTER TABLE riferimento_legale ADD CONSTRAINT FK_3C236902D1500C38 FOREIGN KEY (amministrativa_id) REFERENCES amministrativa (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_3C236902D1500C38 ON riferimento_legale (amministrativa_id)');
    }
}
