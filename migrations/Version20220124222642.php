<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220124222642 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE detalle_orden_estado');
        $this->addSql('ALTER TABLE detalle_orden DROP FOREIGN KEY FK_3F5E858326B93C0B');
        $this->addSql('DROP INDEX IDX_3F5E858326B93C0B ON detalle_orden');
        $this->addSql('ALTER TABLE detalle_orden ADD precio NUMERIC(10, 2) DEFAULT NULL, DROP equipo_detalle_orden_id, CHANGE observacion observacion VARCHAR(255) DEFAULT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE detalle_orden_estado (detalle_orden_id INT NOT NULL, estado_id INT NOT NULL, INDEX IDX_786EA394F15702B (detalle_orden_id), INDEX IDX_786EA399F5A440B (estado_id), PRIMARY KEY(detalle_orden_id, estado_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE detalle_orden_estado ADD CONSTRAINT FK_786EA394F15702B FOREIGN KEY (detalle_orden_id) REFERENCES detalle_orden (id) ON UPDATE NO ACTION ON DELETE CASCADE');
        $this->addSql('ALTER TABLE detalle_orden_estado ADD CONSTRAINT FK_786EA399F5A440B FOREIGN KEY (estado_id) REFERENCES estado (id) ON UPDATE NO ACTION ON DELETE CASCADE');
        $this->addSql('ALTER TABLE detalle_orden ADD equipo_detalle_orden_id INT NOT NULL, DROP precio, CHANGE observacion observacion LONGTEXT CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE detalle_orden ADD CONSTRAINT FK_3F5E858326B93C0B FOREIGN KEY (equipo_detalle_orden_id) REFERENCES equipo (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('CREATE INDEX IDX_3F5E858326B93C0B ON detalle_orden (equipo_detalle_orden_id)');
    }
}
