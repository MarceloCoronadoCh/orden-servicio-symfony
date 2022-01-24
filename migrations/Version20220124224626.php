<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220124224626 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE equipo_marca CHANGE detalle detalle_marca LONGTEXT DEFAULT NULL');
        $this->addSql('ALTER TABLE tecnico_encargado ADD nombre_tecnico VARCHAR(50) NOT NULL, ADD apellidos_tecnico VARCHAR(100) NOT NULL, DROP nombre, DROP apellido, CHANGE direccion direccion VARCHAR(100) DEFAULT NULL');
        $this->addSql('ALTER TABLE tipo_servicio DROP FOREIGN KEY FK_1D43A8E34E389608');
        $this->addSql('DROP INDEX IDX_1D43A8E34E389608 ON tipo_servicio');
        $this->addSql('ALTER TABLE tipo_servicio DROP tipo_servicio_detalle_orden_id, CHANGE nombre_servicio nombre_servicio VARCHAR(100) NOT NULL, CHANGE detalle_servicio detalle_servicio VARCHAR(255) DEFAULT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE equipo_marca CHANGE detalle_marca detalle LONGTEXT CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE tecnico_encargado ADD apellido VARCHAR(50) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, DROP apellidos_tecnico, CHANGE direccion direccion VARCHAR(50) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE nombre_tecnico nombre VARCHAR(50) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE tipo_servicio ADD tipo_servicio_detalle_orden_id INT NOT NULL, CHANGE nombre_servicio nombre_servicio VARCHAR(50) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE detalle_servicio detalle_servicio LONGTEXT CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE tipo_servicio ADD CONSTRAINT FK_1D43A8E34E389608 FOREIGN KEY (tipo_servicio_detalle_orden_id) REFERENCES detalle_orden (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('CREATE INDEX IDX_1D43A8E34E389608 ON tipo_servicio (tipo_servicio_detalle_orden_id)');
    }
}
