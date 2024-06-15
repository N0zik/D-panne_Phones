<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240604112937 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE reparations ADD models_id INT NOT NULL');
        $this->addSql('ALTER TABLE reparations ADD CONSTRAINT FK_953FFFD3D966BF49 FOREIGN KEY (models_id) REFERENCES models (id)');
        $this->addSql('CREATE INDEX IDX_953FFFD3D966BF49 ON reparations (models_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE reparations DROP FOREIGN KEY FK_953FFFD3D966BF49');
        $this->addSql('DROP INDEX IDX_953FFFD3D966BF49 ON reparations');
        $this->addSql('ALTER TABLE reparations DROP models_id');
    }
}
