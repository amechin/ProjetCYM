<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200224085752 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'sqlite', 'Migration can only be executed safely on \'sqlite\'.');

        $this->addSql('CREATE TEMPORARY TABLE __temp__ressource AS SELECT id, titre, groupe, cc, eng, syn, anc, dec, design_id, duree FROM ressource');
        $this->addSql('DROP TABLE ressource');
        $this->addSql('CREATE TABLE ressource (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, titre VARCHAR(255) NOT NULL COLLATE BINARY, groupe VARCHAR(255) NOT NULL COLLATE BINARY, cc VARCHAR(255) NOT NULL COLLATE BINARY, eng VARCHAR(255) NOT NULL COLLATE BINARY, syn VARCHAR(255) NOT NULL COLLATE BINARY, anc VARCHAR(255) NOT NULL COLLATE BINARY, dec VARCHAR(255) NOT NULL COLLATE BINARY, design_id INTEGER NOT NULL, duree VARCHAR(255) NOT NULL)');
        $this->addSql('INSERT INTO ressource (id, titre, groupe, cc, eng, syn, anc, dec, design_id, duree) SELECT id, titre, groupe, cc, eng, syn, anc, dec, design_id, duree FROM __temp__ressource');
        $this->addSql('DROP TABLE __temp__ressource');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'sqlite', 'Migration can only be executed safely on \'sqlite\'.');

        $this->addSql('CREATE TEMPORARY TABLE __temp__ressource AS SELECT id, titre, groupe, duree, cc, eng, syn, anc, dec, design_id FROM ressource');
        $this->addSql('DROP TABLE ressource');
        $this->addSql('CREATE TABLE ressource (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, titre VARCHAR(255) NOT NULL, groupe VARCHAR(255) NOT NULL, cc VARCHAR(255) NOT NULL, eng VARCHAR(255) NOT NULL, syn VARCHAR(255) NOT NULL, anc VARCHAR(255) NOT NULL, dec VARCHAR(255) NOT NULL, design_id INTEGER NOT NULL, duree VARCHAR(255) DEFAULT NULL COLLATE BINARY)');
        $this->addSql('INSERT INTO ressource (id, titre, groupe, duree, cc, eng, syn, anc, dec, design_id) SELECT id, titre, groupe, duree, cc, eng, syn, anc, dec, design_id FROM __temp__ressource');
        $this->addSql('DROP TABLE __temp__ressource');
    }
}
