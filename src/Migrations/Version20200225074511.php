<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200225074511 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'sqlite', 'Migration can only be executed safely on \'sqlite\'.');

        $this->addSql('ALTER TABLE boutique ADD COLUMN lien VARCHAR(500) DEFAULT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'sqlite', 'Migration can only be executed safely on \'sqlite\'.');

        $this->addSql('CREATE TEMPORARY TABLE __temp__boutique AS SELECT id, titre, description, image, image_filename FROM boutique');
        $this->addSql('DROP TABLE boutique');
        $this->addSql('CREATE TABLE boutique (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, titre VARCHAR(255) DEFAULT NULL, description VARCHAR(500) DEFAULT NULL, image VARCHAR(500) NOT NULL, image_filename VARCHAR(500) NOT NULL)');
        $this->addSql('INSERT INTO boutique (id, titre, description, image, image_filename) SELECT id, titre, description, image, image_filename FROM __temp__boutique');
        $this->addSql('DROP TABLE __temp__boutique');
    }
}
