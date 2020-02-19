<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200219105750 extends AbstractMigration
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
        $this->addSql('CREATE TABLE ressource (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, nom VARCHAR(255) NOT NULL COLLATE BINARY, description VARCHAR(255) NOT NULL COLLATE BINARY, lien VARCHAR(1000) NOT NULL COLLATE BINARY, image VARCHAR(500) NOT NULL, image_filename VARCHAR(500) DEFAULT NULL)');
        $this->addSql('INSERT INTO ressource (id, nom, description, image, lien, image_filename) SELECT id, nom, description, image, lien, image_filename FROM __temp__ressource');
        $this->addSql('DROP TABLE __temp__ressource');
        $this->addSql('CREATE TEMPORARY TABLE __temp__ccm AS SELECT id, titre, image, description FROM ccm');
        $this->addSql('DROP TABLE ccm');
        $this->addSql('CREATE TABLE ccm (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, titre VARCHAR(255) NOT NULL COLLATE BINARY, description VARCHAR(500) NOT NULL COLLATE BINARY, image VARCHAR(500) NOT NULL, image_filename VARCHAR(500) DEFAULT NULL)');
        $this->addSql('INSERT INTO ccm (id, titre, image, description) SELECT id, titre, image, description FROM __temp__ccm');
        $this->addSql('DROP TABLE __temp__ccm');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'sqlite', 'Migration can only be executed safely on \'sqlite\'.');

        $this->addSql('CREATE TEMPORARY TABLE __temp__ccm AS SELECT id, titre, description, image FROM ccm');
        $this->addSql('DROP TABLE ccm');
        $this->addSql('CREATE TABLE ccm (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, titre VARCHAR(255) NOT NULL, description VARCHAR(500) NOT NULL, image VARCHAR(1000) NOT NULL COLLATE BINARY)');
        $this->addSql('INSERT INTO ccm (id, titre, description, image) SELECT id, titre, description, image FROM __temp__ccm');
        $this->addSql('DROP TABLE __temp__ccm');
        $this->addSql('CREATE TEMPORARY TABLE __temp__ressource AS SELECT id, nom, description, image, lien, image_filename FROM ressource');
        $this->addSql('DROP TABLE ressource');
        $this->addSql('CREATE TABLE ressource (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, description VARCHAR(255) NOT NULL, lien VARCHAR(1000) NOT NULL, image VARCHAR(255) NOT NULL COLLATE BINARY, image_filename VARCHAR(255) DEFAULT NULL COLLATE BINARY)');
        $this->addSql('INSERT INTO ressource (id, nom, description, image, lien, image_filename) SELECT id, nom, description, image, lien, image_filename FROM __temp__ressource');
        $this->addSql('DROP TABLE __temp__ressource');
    }
}
