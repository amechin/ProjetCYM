<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200219104403 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'sqlite', 'Migration can only be executed safely on \'sqlite\'.');

        $this->addSql('CREATE TEMPORARY TABLE __temp__ressource AS SELECT id, nom, description, image, lien, image_filename FROM ressource');
        $this->addSql('DROP TABLE ressource');
        $this->addSql('CREATE TABLE ressource (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, nom VARCHAR(255) NOT NULL COLLATE BINARY, description VARCHAR(255) NOT NULL COLLATE BINARY, image VARCHAR(255) NOT NULL COLLATE BINARY, lien VARCHAR(1000) NOT NULL COLLATE BINARY, image_filename VARCHAR(255) DEFAULT NULL)');
        $this->addSql('INSERT INTO ressource (id, nom, description, image, lien, image_filename) SELECT id, nom, description, image, lien, image_filename FROM __temp__ressource');
        $this->addSql('DROP TABLE __temp__ressource');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'sqlite', 'Migration can only be executed safely on \'sqlite\'.');

        $this->addSql('CREATE TEMPORARY TABLE __temp__ressource AS SELECT id, nom, description, image, lien, image_filename FROM ressource');
        $this->addSql('DROP TABLE ressource');
        $this->addSql('CREATE TABLE ressource (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, description VARCHAR(255) NOT NULL, image VARCHAR(255) NOT NULL, lien VARCHAR(1000) NOT NULL, image_filename VARCHAR(1000) DEFAULT NULL COLLATE BINARY)');
        $this->addSql('INSERT INTO ressource (id, nom, description, image, lien, image_filename) SELECT id, nom, description, image, lien, image_filename FROM __temp__ressource');
        $this->addSql('DROP TABLE __temp__ressource');
    }
}
