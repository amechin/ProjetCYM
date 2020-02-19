<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200219105431 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'sqlite', 'Migration can only be executed safely on \'sqlite\'.');

        $this->addSql('CREATE TEMPORARY TABLE __temp__ccm AS SELECT id, titre, description, image FROM ccm');
        $this->addSql('DROP TABLE ccm');
        $this->addSql('CREATE TABLE ccm (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, titre VARCHAR(255) NOT NULL COLLATE BINARY, image VARCHAR(1000) NOT NULL COLLATE BINARY, description VARCHAR(500) NOT NULL)');
        $this->addSql('INSERT INTO ccm (id, titre, description, image) SELECT id, titre, description, image FROM __temp__ccm');
        $this->addSql('DROP TABLE __temp__ccm');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'sqlite', 'Migration can only be executed safely on \'sqlite\'.');

        $this->addSql('CREATE TEMPORARY TABLE __temp__ccm AS SELECT id, titre, description, image FROM ccm');
        $this->addSql('DROP TABLE ccm');
        $this->addSql('CREATE TABLE ccm (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, titre VARCHAR(255) NOT NULL, image VARCHAR(1000) NOT NULL, description CLOB NOT NULL COLLATE BINARY)');
        $this->addSql('INSERT INTO ccm (id, titre, description, image) SELECT id, titre, description, image FROM __temp__ccm');
        $this->addSql('DROP TABLE __temp__ccm');
    }
}
