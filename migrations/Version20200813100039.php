<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200813100039 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE compte (id INT AUTO_INCREMENT NOT NULL, client_id INT DEFAULT NULL, entreprise_id INT DEFAULT NULL, typecompte_id INT DEFAULT NULL, numero VARCHAR(255) NOT NULL, date_ouverture DATE NOT NULL, rib VARCHAR(255) NOT NULL, solde DOUBLE PRECISION NOT NULL, agios DOUBLE PRECISION DEFAULT NULL, remuneration DOUBLE PRECISION DEFAULT NULL, frais_ouverture DOUBLE PRECISION DEFAULT NULL, date_debut DATE DEFAULT NULL, date_fin DATE DEFAULT NULL, INDEX IDX_CFF6526019EB6921 (client_id), INDEX IDX_CFF65260A4AEAFEA (entreprise_id), INDEX IDX_CFF6526011FA04BC (typecompte_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE typecompte (id INT AUTO_INCREMENT NOT NULL, libelle VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE compte ADD CONSTRAINT FK_CFF6526019EB6921 FOREIGN KEY (client_id) REFERENCES client (id)');
        $this->addSql('ALTER TABLE compte ADD CONSTRAINT FK_CFF65260A4AEAFEA FOREIGN KEY (entreprise_id) REFERENCES entreprise (id)');
        $this->addSql('ALTER TABLE compte ADD CONSTRAINT FK_CFF6526011FA04BC FOREIGN KEY (typecompte_id) REFERENCES typecompte (id)');
        $this->addSql('ALTER TABLE client ADD matricule VARCHAR(255) NOT NULL, ADD cni VARCHAR(255) NOT NULL, ADD sexe VARCHAR(255) NOT NULL, ADD date_naiss DATE NOT NULL, ADD telephone VARCHAR(255) NOT NULL, ADD adresse VARCHAR(255) DEFAULT NULL, ADD email VARCHAR(255) NOT NULL, ADD login VARCHAR(255) DEFAULT NULL, ADD password VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE entreprise ADD adresse VARCHAR(255) NOT NULL, ADD telephone VARCHAR(255) NOT NULL, ADD email VARCHAR(255) NOT NULL, ADD budget DOUBLE PRECISION NOT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE compte DROP FOREIGN KEY FK_CFF6526011FA04BC');
        $this->addSql('DROP TABLE compte');
        $this->addSql('DROP TABLE typecompte');
        $this->addSql('ALTER TABLE client DROP matricule, DROP cni, DROP sexe, DROP date_naiss, DROP telephone, DROP adresse, DROP email, DROP login, DROP password');
        $this->addSql('ALTER TABLE entreprise DROP adresse, DROP telephone, DROP email, DROP budget');
    }
}
