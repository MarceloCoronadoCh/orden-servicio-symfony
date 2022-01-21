<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220121215605 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE detalle_orden (id INT AUTO_INCREMENT NOT NULL, equipo_detalle_orden_id INT NOT NULL, tipo_servicio_detalle_orden_id INT NOT NULL, orden_servicio_id INT NOT NULL, fecha_ingreso DATETIME NOT NULL, fecha_entrega DATETIME NOT NULL, observacion LONGTEXT DEFAULT NULL, INDEX IDX_3F5E858326B93C0B (equipo_detalle_orden_id), INDEX IDX_3F5E85834E389608 (tipo_servicio_detalle_orden_id), INDEX IDX_3F5E858344C5C340 (orden_servicio_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE detalle_orden ADD CONSTRAINT FK_3F5E858326B93C0B FOREIGN KEY (equipo_detalle_orden_id) REFERENCES equipo (id)');
        $this->addSql('ALTER TABLE detalle_orden ADD CONSTRAINT FK_3F5E85834E389608 FOREIGN KEY (tipo_servicio_detalle_orden_id) REFERENCES tipo_servicio (id)');
        $this->addSql('ALTER TABLE detalle_orden ADD CONSTRAINT FK_3F5E858344C5C340 FOREIGN KEY (orden_servicio_id) REFERENCES orden_servicio (id)');
        $this->addSql('ALTER TABLE tipo_servicio ADD tipo_servicio_detalle_orden_id INT NOT NULL');
        $this->addSql('ALTER TABLE tipo_servicio ADD CONSTRAINT FK_1D43A8E34E389608 FOREIGN KEY (tipo_servicio_detalle_orden_id) REFERENCES detalle_orden (id)');
        $this->addSql('CREATE INDEX IDX_1D43A8E34E389608 ON tipo_servicio (tipo_servicio_detalle_orden_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE tipo_servicio DROP FOREIGN KEY FK_1D43A8E34E389608');
        $this->addSql('DROP TABLE detalle_orden');
        $this->addSql('DROP INDEX IDX_1D43A8E34E389608 ON tipo_servicio');
        $this->addSql('ALTER TABLE tipo_servicio DROP tipo_servicio_detalle_orden_id');
    }
}
