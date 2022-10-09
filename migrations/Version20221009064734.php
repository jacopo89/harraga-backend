<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221009064734 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE medico_curante (id INT AUTO_INCREMENT NOT NULL, allegato_id INT DEFAULT NULL, sanitaria_id INT NOT NULL, nome VARCHAR(255) NOT NULL, cognome VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, telefono VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_197A269268F4D369 (allegato_id), UNIQUE INDEX UNIQ_197A26924B3C3226 (sanitaria_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE patologia_allergica (id INT AUTO_INCREMENT NOT NULL, allegato_id INT DEFAULT NULL, sanitaria_id INT NOT NULL, patologia VARCHAR(255) DEFAULT NULL, UNIQUE INDEX UNIQ_607A1E868F4D369 (allegato_id), INDEX IDX_607A1E84B3C3226 (sanitaria_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE preso_in_carico (id INT AUTO_INCREMENT NOT NULL, allegato_id INT DEFAULT NULL, sanitaria_id INT NOT NULL, nome VARCHAR(255) DEFAULT NULL, cognome VARCHAR(255) DEFAULT NULL, email VARCHAR(255) DEFAULT NULL, telefono VARCHAR(255) DEFAULT NULL, UNIQUE INDEX UNIQ_CE56C8E568F4D369 (allegato_id), UNIQUE INDEX UNIQ_CE56C8E54B3C3226 (sanitaria_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE sanitaria (id INT AUTO_INCREMENT NOT NULL, cartella_sociale_id INT NOT NULL, UNIQUE INDEX UNIQ_9123C9C66E81060D (cartella_sociale_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE specifica_disabilita (id INT AUTO_INCREMENT NOT NULL, allegato_id INT DEFAULT NULL, sanitaria_id INT NOT NULL, disabilita VARCHAR(255) DEFAULT NULL, UNIQUE INDEX UNIQ_C81FF8D268F4D369 (allegato_id), INDEX IDX_C81FF8D24B3C3226 (sanitaria_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE vaccino (id INT AUTO_INCREMENT NOT NULL, sanitaria_id INT NOT NULL, vaccino VARCHAR(255) DEFAULT NULL, INDEX IDX_470879AF4B3C3226 (sanitaria_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE visita (id INT AUTO_INCREMENT NOT NULL, allegato_id INT DEFAULT NULL, sanitaria_id INT NOT NULL, tipo VARCHAR(255) DEFAULT NULL, presidio_ospedaliero VARCHAR(255) DEFAULT NULL, uo VARCHAR(255) DEFAULT NULL, data VARCHAR(255) DEFAULT NULL, nome_medico VARCHAR(255) DEFAULT NULL, cognome_medico VARCHAR(255) DEFAULT NULL, email_medico VARCHAR(255) DEFAULT NULL, telefono_medico VARCHAR(255) DEFAULT NULL, UNIQUE INDEX UNIQ_B7F148A268F4D369 (allegato_id), INDEX IDX_B7F148A24B3C3226 (sanitaria_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE medico_curante ADD CONSTRAINT FK_197A269268F4D369 FOREIGN KEY (allegato_id) REFERENCES allegato (id)');
        $this->addSql('ALTER TABLE medico_curante ADD CONSTRAINT FK_197A26924B3C3226 FOREIGN KEY (sanitaria_id) REFERENCES sanitaria (id)');
        $this->addSql('ALTER TABLE patologia_allergica ADD CONSTRAINT FK_607A1E868F4D369 FOREIGN KEY (allegato_id) REFERENCES allegato (id)');
        $this->addSql('ALTER TABLE patologia_allergica ADD CONSTRAINT FK_607A1E84B3C3226 FOREIGN KEY (sanitaria_id) REFERENCES sanitaria (id)');
        $this->addSql('ALTER TABLE preso_in_carico ADD CONSTRAINT FK_CE56C8E568F4D369 FOREIGN KEY (allegato_id) REFERENCES allegato (id)');
        $this->addSql('ALTER TABLE preso_in_carico ADD CONSTRAINT FK_CE56C8E54B3C3226 FOREIGN KEY (sanitaria_id) REFERENCES sanitaria (id)');
        $this->addSql('ALTER TABLE sanitaria ADD CONSTRAINT FK_9123C9C66E81060D FOREIGN KEY (cartella_sociale_id) REFERENCES cartella_sociale (id)');
        $this->addSql('ALTER TABLE specifica_disabilita ADD CONSTRAINT FK_C81FF8D268F4D369 FOREIGN KEY (allegato_id) REFERENCES allegato (id)');
        $this->addSql('ALTER TABLE specifica_disabilita ADD CONSTRAINT FK_C81FF8D24B3C3226 FOREIGN KEY (sanitaria_id) REFERENCES sanitaria (id)');
        $this->addSql('ALTER TABLE vaccino ADD CONSTRAINT FK_470879AF4B3C3226 FOREIGN KEY (sanitaria_id) REFERENCES sanitaria (id)');
        $this->addSql('ALTER TABLE visita ADD CONSTRAINT FK_B7F148A268F4D369 FOREIGN KEY (allegato_id) REFERENCES allegato (id)');
        $this->addSql('ALTER TABLE visita ADD CONSTRAINT FK_B7F148A24B3C3226 FOREIGN KEY (sanitaria_id) REFERENCES sanitaria (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE medico_curante DROP FOREIGN KEY FK_197A269268F4D369');
        $this->addSql('ALTER TABLE medico_curante DROP FOREIGN KEY FK_197A26924B3C3226');
        $this->addSql('ALTER TABLE patologia_allergica DROP FOREIGN KEY FK_607A1E868F4D369');
        $this->addSql('ALTER TABLE patologia_allergica DROP FOREIGN KEY FK_607A1E84B3C3226');
        $this->addSql('ALTER TABLE preso_in_carico DROP FOREIGN KEY FK_CE56C8E568F4D369');
        $this->addSql('ALTER TABLE preso_in_carico DROP FOREIGN KEY FK_CE56C8E54B3C3226');
        $this->addSql('ALTER TABLE sanitaria DROP FOREIGN KEY FK_9123C9C66E81060D');
        $this->addSql('ALTER TABLE specifica_disabilita DROP FOREIGN KEY FK_C81FF8D268F4D369');
        $this->addSql('ALTER TABLE specifica_disabilita DROP FOREIGN KEY FK_C81FF8D24B3C3226');
        $this->addSql('ALTER TABLE vaccino DROP FOREIGN KEY FK_470879AF4B3C3226');
        $this->addSql('ALTER TABLE visita DROP FOREIGN KEY FK_B7F148A268F4D369');
        $this->addSql('ALTER TABLE visita DROP FOREIGN KEY FK_B7F148A24B3C3226');
        $this->addSql('DROP TABLE medico_curante');
        $this->addSql('DROP TABLE patologia_allergica');
        $this->addSql('DROP TABLE preso_in_carico');
        $this->addSql('DROP TABLE sanitaria');
        $this->addSql('DROP TABLE specifica_disabilita');
        $this->addSql('DROP TABLE vaccino');
        $this->addSql('DROP TABLE visita');
    }
}
