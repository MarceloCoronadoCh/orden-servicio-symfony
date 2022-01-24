<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220124223004 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE orden_servicio_estado (orden_servicio_id INT NOT NULL, estado_id INT NOT NULL, INDEX IDX_3A53C6E544C5C340 (orden_servicio_id), INDEX IDX_3A53C6E59F5A440B (estado_id), PRIMARY KEY(orden_servicio_id, estado_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE orden_servicio_estado ADD CONSTRAINT FK_3A53C6E544C5C340 FOREIGN KEY (orden_servicio_id) REFERENCES orden_servicio (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE orden_servicio_estado ADD CONSTRAINT FK_3A53C6E59F5A440B FOREIGN KEY (estado_id) REFERENCES estado (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE orden_servicio DROP FOREIGN KEY FK_17EC71FD911A6DA9');
        $this->addSql('ALTER TABLE orden_servicio DROP FOREIGN KEY FK_17EC71FDDE734E51');
        $this->addSql('DROP INDEX IDX_17EC71FD911A6DA9 ON orden_servicio');
        $this->addSql('DROP INDEX IDX_17EC71FDDE734E51 ON orden_servicio');
        $this->addSql('ALTER TABLE orden_servicio ADD cliente_orden_id INT NOT NULL, ADD tecnico_orden_id INT NOT NULL, ADD equipo_id INT NOT NULL, ADD fecha_ingreso DATE NOT NULL, ADD fecha_salida DATE DEFAULT NULL, ADD precio NUMERIC(10, 2) DEFAULT NULL, DROP cliente_id, DROP tecnico_encargado_id, DROP fecha_orden, CHANGE numero_orden numero_orden VARCHAR(10) NOT NULL');
        $this->addSql('ALTER TABLE orden_servicio ADD CONSTRAINT FK_17EC71FD2D610281 FOREIGN KEY (cliente_orden_id) REFERENCES cliente (id)');
        $this->addSql('ALTER TABLE orden_servicio ADD CONSTRAINT FK_17EC71FD91441E33 FOREIGN KEY (tecnico_orden_id) REFERENCES tecnico_encargado (id)');
        $this->addSql('ALTER TABLE orden_servicio ADD CONSTRAINT FK_17EC71FD23BFBED FOREIGN KEY (equipo_id) REFERENCES equipo (id)');
        $this->addSql('CREATE INDEX IDX_17EC71FD2D610281 ON orden_servicio (cliente_orden_id)');
        $this->addSql('CREATE INDEX IDX_17EC71FD91441E33 ON orden_servicio (tecnico_orden_id)');
        $this->addSql('CREATE INDEX IDX_17EC71FD23BFBED ON orden_servicio (equipo_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE orden_servicio_estado');
        $this->addSql('ALTER TABLE orden_servicio DROP FOREIGN KEY FK_17EC71FD2D610281');
        $this->addSql('ALTER TABLE orden_servicio DROP FOREIGN KEY FK_17EC71FD91441E33');
        $this->addSql('ALTER TABLE orden_servicio DROP FOREIGN KEY FK_17EC71FD23BFBED');
        $this->addSql('DROP INDEX IDX_17EC71FD2D610281 ON orden_servicio');
        $this->addSql('DROP INDEX IDX_17EC71FD91441E33 ON orden_servicio');
        $this->addSql('DROP INDEX IDX_17EC71FD23BFBED ON orden_servicio');
        $this->addSql('ALTER TABLE orden_servicio ADD cliente_id INT NOT NULL, ADD tecnico_encargado_id INT NOT NULL, ADD fecha_orden DATETIME NOT NULL, DROP cliente_orden_id, DROP tecnico_orden_id, DROP equipo_id, DROP fecha_ingreso, DROP fecha_salida, DROP precio, CHANGE numero_orden numero_orden VARCHAR(50) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE orden_servicio ADD CONSTRAINT FK_17EC71FD911A6DA9 FOREIGN KEY (tecnico_encargado_id) REFERENCES tecnico_encargado (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('ALTER TABLE orden_servicio ADD CONSTRAINT FK_17EC71FDDE734E51 FOREIGN KEY (cliente_id) REFERENCES cliente (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('CREATE INDEX IDX_17EC71FD911A6DA9 ON orden_servicio (tecnico_encargado_id)');
        $this->addSql('CREATE INDEX IDX_17EC71FDDE734E51 ON orden_servicio (cliente_id)');
    }
}
