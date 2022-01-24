<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220124075258 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE detalle_orden DROP fecha_ingreso, DROP fecha_entrega');
        $this->addSql('ALTER TABLE orden_servicio DROP fecha_orden');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE detalle_orden ADD fecha_ingreso DATETIME NOT NULL, ADD fecha_entrega DATETIME NOT NULL');
        $this->addSql('ALTER TABLE orden_servicio ADD fecha_orden DATETIME NOT NULL');
    }
}
