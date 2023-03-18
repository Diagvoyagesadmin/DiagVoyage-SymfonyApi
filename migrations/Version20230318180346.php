<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230318180346 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SEQUENCE "achatsConseille_id_seq" INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE "adressesUtil_id_seq" INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE "centres_id_seq" INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE "infosPratique_id_seq" INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE "maladies_id_seq" INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE "pays_id_seq" INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE "symptomes_id_seq" INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE "users_id_seq" INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE "vaccins_id_seq" INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE "achatsConseille" (id INT NOT NULL, prix_moyen NUMERIC(5, 2) NOT NULL, url TEXT NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE "adressesUtil" (id INT NOT NULL, nom VARCHAR(255) NOT NULL, description TEXT DEFAULT NULL, type VARCHAR(255) NOT NULL, adresse VARCHAR(255) NOT NULL, ville VARCHAR(255) NOT NULL, tel VARCHAR(255) NOT NULL, lat DOUBLE PRECISION NOT NULL, lon DOUBLE PRECISION NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE "centres" (id INT NOT NULL, nom VARCHAR(255) NOT NULL, adresse VARCHAR(255) NOT NULL, ville VARCHAR(255) NOT NULL, code_postal VARCHAR(255) NOT NULL, lat DOUBLE PRECISION NOT NULL, lon DOUBLE PRECISION NOT NULL, type VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE "infosPratique" (id INT NOT NULL, nom VARCHAR(255) NOT NULL, description TEXT DEFAULT NULL, release_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, PRIMARY KEY(id))');
        $this->addSql('COMMENT ON COLUMN "infosPratique".release_at IS \'(DC2Type:datetime_immutable)\'');
        $this->addSql('CREATE TABLE "maladies" (id INT NOT NULL, nom VARCHAR(255) NOT NULL, description TEXT DEFAULT NULL, mode_contamination VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_FAAD93116C6E55B5 ON "maladies" (nom)');
        $this->addSql('CREATE TABLE "pays" (id INT NOT NULL, nom VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE "symptomes" (id INT NOT NULL, nom VARCHAR(255) NOT NULL, description TEXT DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE "users" (id INT NOT NULL, email VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, date_de_naissance TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_1483A5E9E7927C74 ON "users" (email)');
        $this->addSql('COMMENT ON COLUMN "users".date_de_naissance IS \'(DC2Type:datetime_immutable)\'');
        $this->addSql('CREATE TABLE "vaccins" (id INT NOT NULL, nom VARCHAR(255) NOT NULL, description TEXT DEFAULT NULL, prix NUMERIC(6, 2) NOT NULL, release_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, PRIMARY KEY(id))');
        $this->addSql('COMMENT ON COLUMN "vaccins".release_at IS \'(DC2Type:datetime_immutable)\'');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('DROP SEQUENCE "achatsConseille_id_seq" CASCADE');
        $this->addSql('DROP SEQUENCE "adressesUtil_id_seq" CASCADE');
        $this->addSql('DROP SEQUENCE "centres_id_seq" CASCADE');
        $this->addSql('DROP SEQUENCE "infosPratique_id_seq" CASCADE');
        $this->addSql('DROP SEQUENCE "maladies_id_seq" CASCADE');
        $this->addSql('DROP SEQUENCE "pays_id_seq" CASCADE');
        $this->addSql('DROP SEQUENCE "symptomes_id_seq" CASCADE');
        $this->addSql('DROP SEQUENCE "users_id_seq" CASCADE');
        $this->addSql('DROP SEQUENCE "vaccins_id_seq" CASCADE');
        $this->addSql('DROP TABLE "achatsConseille"');
        $this->addSql('DROP TABLE "adressesUtil"');
        $this->addSql('DROP TABLE "centres"');
        $this->addSql('DROP TABLE "infosPratique"');
        $this->addSql('DROP TABLE "maladies"');
        $this->addSql('DROP TABLE "pays"');
        $this->addSql('DROP TABLE "symptomes"');
        $this->addSql('DROP TABLE "users"');
        $this->addSql('DROP TABLE "vaccins"');
    }
}
