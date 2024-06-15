<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240604114131 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE model ADD marque_id INT NOT NULL, ADD name VARCHAR(255) NOT NULL, DROP libelle, DROP image');
        $this->addSql('ALTER TABLE model ADD CONSTRAINT FK_D79572D94827B9B2 FOREIGN KEY (marque_id) REFERENCES marque (id)');
        $this->addSql('CREATE INDEX IDX_D79572D94827B9B2 ON model (marque_id)');
        $this->addSql('ALTER TABLE reparation DROP FOREIGN KEY FK_8FDF219DD966BF49');
        $this->addSql('DROP INDEX IDX_8FDF219DD966BF49 ON reparation');
        $this->addSql('ALTER TABLE reparation ADD model_id INT NOT NULL, ADD name VARCHAR(255) NOT NULL, ADD price NUMERIC(10, 2) NOT NULL, DROP models_id, DROP libelle, DROP prix, DROP description, DROP icon');
        $this->addSql('ALTER TABLE reparation ADD CONSTRAINT FK_8FDF219D7975B7E7 FOREIGN KEY (model_id) REFERENCES model (id)');
        $this->addSql('CREATE INDEX IDX_8FDF219D7975B7E7 ON reparation (model_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE model DROP FOREIGN KEY FK_D79572D94827B9B2');
        $this->addSql('DROP INDEX IDX_D79572D94827B9B2 ON model');
        $this->addSql('ALTER TABLE model ADD image VARCHAR(255) NOT NULL, DROP marque_id, CHANGE name libelle VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE reparation DROP FOREIGN KEY FK_8FDF219D7975B7E7');
        $this->addSql('DROP INDEX IDX_8FDF219D7975B7E7 ON reparation');
        $this->addSql('ALTER TABLE reparation ADD prix INT NOT NULL, ADD description VARCHAR(255) NOT NULL, ADD icon VARCHAR(255) NOT NULL, DROP price, CHANGE model_id models_id INT NOT NULL, CHANGE name libelle VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE reparation ADD CONSTRAINT FK_8FDF219DD966BF49 FOREIGN KEY (models_id) REFERENCES model (id)');
        $this->addSql('CREATE INDEX IDX_8FDF219DD966BF49 ON reparation (models_id)');
    }
}
