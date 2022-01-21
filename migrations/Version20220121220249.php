<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220121220249 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE detalle_orden_estado (detalle_orden_id INT NOT NULL, estado_id INT NOT NULL, INDEX IDX_786EA394F15702B (detalle_orden_id), INDEX IDX_786EA399F5A440B (estado_id), PRIMARY KEY(detalle_orden_id, estado_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE detalle_orden_estado ADD CONSTRAINT FK_786EA394F15702B FOREIGN KEY (detalle_orden_id) REFERENCES detalle_orden (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE detalle_orden_estado ADD CONSTRAINT FK_786EA399F5A440B FOREIGN KEY (estado_id) REFERENCES estado (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE detalle_orden_estado');
    }
}
