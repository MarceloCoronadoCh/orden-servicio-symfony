<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220121213733 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE orden_servicio (id INT AUTO_INCREMENT NOT NULL, cliente_id INT NOT NULL, tecnico_encargado_id INT NOT NULL, fecha_orden DATETIME NOT NULL, numero_orden VARCHAR(50) NOT NULL, INDEX IDX_17EC71FDDE734E51 (cliente_id), INDEX IDX_17EC71FD911A6DA9 (tecnico_encargado_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE orden_servicio ADD CONSTRAINT FK_17EC71FDDE734E51 FOREIGN KEY (cliente_id) REFERENCES cliente (id)');
        $this->addSql('ALTER TABLE orden_servicio ADD CONSTRAINT FK_17EC71FD911A6DA9 FOREIGN KEY (tecnico_encargado_id) REFERENCES tecnico_encargado (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE orden_servicio');
    }
}
