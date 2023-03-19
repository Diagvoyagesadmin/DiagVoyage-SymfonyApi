<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230319100717 extends AbstractMigration
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
        $this->addSql('CREATE TABLE "adressesUtil" (id INT NOT NULL, pays_id INT NOT NULL, nom VARCHAR(255) NOT NULL, description TEXT DEFAULT NULL, type VARCHAR(255) NOT NULL, adresse VARCHAR(255) NOT NULL, ville VARCHAR(255) NOT NULL, tel VARCHAR(255) NOT NULL, lat DOUBLE PRECISION NOT NULL, lon DOUBLE PRECISION NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_8A63084EA6E44244 ON "adressesUtil" (pays_id)');
        $this->addSql('CREATE TABLE "centres" (id INT NOT NULL, nom VARCHAR(255) NOT NULL, adresse VARCHAR(255) NOT NULL, ville VARCHAR(255) NOT NULL, code_postal VARCHAR(255) NOT NULL, lat DOUBLE PRECISION NOT NULL, lon DOUBLE PRECISION NOT NULL, type VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE "infosPratique" (id INT NOT NULL, pays_id INT NOT NULL, nom VARCHAR(255) NOT NULL, description TEXT DEFAULT NULL, release_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, state_of_voyage VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_8B74DF0AA6E44244 ON "infosPratique" (pays_id)');
        $this->addSql('COMMENT ON COLUMN "infosPratique".release_at IS \'(DC2Type:datetime_immutable)\'');
        $this->addSql('CREATE TABLE "maladies" (id INT NOT NULL, nom VARCHAR(255) NOT NULL, description TEXT DEFAULT NULL, mode_contamination VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_FAAD93116C6E55B5 ON "maladies" (nom)');
        $this->addSql('CREATE TABLE maladie_symptome (maladie_id INT NOT NULL, symptome_id INT NOT NULL, PRIMARY KEY(maladie_id, symptome_id))');
        $this->addSql('CREATE INDEX IDX_941A7D2DB4B1C397 ON maladie_symptome (maladie_id)');
        $this->addSql('CREATE INDEX IDX_941A7D2D12B83D77 ON maladie_symptome (symptome_id)');
        $this->addSql('CREATE TABLE maladie_centre (maladie_id INT NOT NULL, centre_id INT NOT NULL, PRIMARY KEY(maladie_id, centre_id))');
        $this->addSql('CREATE INDEX IDX_97C302BDB4B1C397 ON maladie_centre (maladie_id)');
        $this->addSql('CREATE INDEX IDX_97C302BD463CD7C3 ON maladie_centre (centre_id)');
        $this->addSql('CREATE TABLE "pays" (id INT NOT NULL, nom VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE pays_achat_conseille (pays_id INT NOT NULL, achat_conseille_id INT NOT NULL, PRIMARY KEY(pays_id, achat_conseille_id))');
        $this->addSql('CREATE INDEX IDX_4EAE09E9A6E44244 ON pays_achat_conseille (pays_id)');
        $this->addSql('CREATE INDEX IDX_4EAE09E9899A11ED ON pays_achat_conseille (achat_conseille_id)');
        $this->addSql('CREATE TABLE pays_maladie (pays_id INT NOT NULL, maladie_id INT NOT NULL, PRIMARY KEY(pays_id, maladie_id))');
        $this->addSql('CREATE INDEX IDX_B119637EA6E44244 ON pays_maladie (pays_id)');
        $this->addSql('CREATE INDEX IDX_B119637EB4B1C397 ON pays_maladie (maladie_id)');
        $this->addSql('CREATE TABLE pays_vaccin (pays_id INT NOT NULL, vaccin_id INT NOT NULL, PRIMARY KEY(pays_id, vaccin_id))');
        $this->addSql('CREATE INDEX IDX_4DCF7F6A6E44244 ON pays_vaccin (pays_id)');
        $this->addSql('CREATE INDEX IDX_4DCF7F69B14AC76 ON pays_vaccin (vaccin_id)');
        $this->addSql('CREATE TABLE "symptomes" (id INT NOT NULL, nom VARCHAR(255) NOT NULL, description TEXT DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE "users" (id INT NOT NULL, email VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, date_de_naissance TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_1483A5E9E7927C74 ON "users" (email)');
        $this->addSql('COMMENT ON COLUMN "users".date_de_naissance IS \'(DC2Type:datetime_immutable)\'');
        $this->addSql('CREATE TABLE user_pays (user_id INT NOT NULL, pays_id INT NOT NULL, PRIMARY KEY(user_id, pays_id))');
        $this->addSql('CREATE INDEX IDX_4E1E7067A76ED395 ON user_pays (user_id)');
        $this->addSql('CREATE INDEX IDX_4E1E7067A6E44244 ON user_pays (pays_id)');
        $this->addSql('CREATE TABLE "vaccins" (id INT NOT NULL, nom VARCHAR(255) NOT NULL, description TEXT DEFAULT NULL, prix NUMERIC(6, 2) NOT NULL, release_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, PRIMARY KEY(id))');
        $this->addSql('COMMENT ON COLUMN "vaccins".release_at IS \'(DC2Type:datetime_immutable)\'');
        $this->addSql('CREATE TABLE vaccin_centre (vaccin_id INT NOT NULL, centre_id INT NOT NULL, PRIMARY KEY(vaccin_id, centre_id))');
        $this->addSql('CREATE INDEX IDX_C22ADD089B14AC76 ON vaccin_centre (vaccin_id)');
        $this->addSql('CREATE INDEX IDX_C22ADD08463CD7C3 ON vaccin_centre (centre_id)');
        $this->addSql('ALTER TABLE "adressesUtil" ADD CONSTRAINT FK_8A63084EA6E44244 FOREIGN KEY (pays_id) REFERENCES "pays" (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE "infosPratique" ADD CONSTRAINT FK_8B74DF0AA6E44244 FOREIGN KEY (pays_id) REFERENCES "pays" (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE maladie_symptome ADD CONSTRAINT FK_941A7D2DB4B1C397 FOREIGN KEY (maladie_id) REFERENCES "maladies" (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE maladie_symptome ADD CONSTRAINT FK_941A7D2D12B83D77 FOREIGN KEY (symptome_id) REFERENCES "symptomes" (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE maladie_centre ADD CONSTRAINT FK_97C302BDB4B1C397 FOREIGN KEY (maladie_id) REFERENCES "maladies" (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE maladie_centre ADD CONSTRAINT FK_97C302BD463CD7C3 FOREIGN KEY (centre_id) REFERENCES "centres" (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE pays_achat_conseille ADD CONSTRAINT FK_4EAE09E9A6E44244 FOREIGN KEY (pays_id) REFERENCES "pays" (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE pays_achat_conseille ADD CONSTRAINT FK_4EAE09E9899A11ED FOREIGN KEY (achat_conseille_id) REFERENCES "achatsConseille" (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE pays_maladie ADD CONSTRAINT FK_B119637EA6E44244 FOREIGN KEY (pays_id) REFERENCES "pays" (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE pays_maladie ADD CONSTRAINT FK_B119637EB4B1C397 FOREIGN KEY (maladie_id) REFERENCES "maladies" (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE pays_vaccin ADD CONSTRAINT FK_4DCF7F6A6E44244 FOREIGN KEY (pays_id) REFERENCES "pays" (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE pays_vaccin ADD CONSTRAINT FK_4DCF7F69B14AC76 FOREIGN KEY (vaccin_id) REFERENCES "vaccins" (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE user_pays ADD CONSTRAINT FK_4E1E7067A76ED395 FOREIGN KEY (user_id) REFERENCES "users" (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE user_pays ADD CONSTRAINT FK_4E1E7067A6E44244 FOREIGN KEY (pays_id) REFERENCES "pays" (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE vaccin_centre ADD CONSTRAINT FK_C22ADD089B14AC76 FOREIGN KEY (vaccin_id) REFERENCES "vaccins" (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE vaccin_centre ADD CONSTRAINT FK_C22ADD08463CD7C3 FOREIGN KEY (centre_id) REFERENCES "centres" (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
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
        $this->addSql('ALTER TABLE "adressesUtil" DROP CONSTRAINT FK_8A63084EA6E44244');
        $this->addSql('ALTER TABLE "infosPratique" DROP CONSTRAINT FK_8B74DF0AA6E44244');
        $this->addSql('ALTER TABLE maladie_symptome DROP CONSTRAINT FK_941A7D2DB4B1C397');
        $this->addSql('ALTER TABLE maladie_symptome DROP CONSTRAINT FK_941A7D2D12B83D77');
        $this->addSql('ALTER TABLE maladie_centre DROP CONSTRAINT FK_97C302BDB4B1C397');
        $this->addSql('ALTER TABLE maladie_centre DROP CONSTRAINT FK_97C302BD463CD7C3');
        $this->addSql('ALTER TABLE pays_achat_conseille DROP CONSTRAINT FK_4EAE09E9A6E44244');
        $this->addSql('ALTER TABLE pays_achat_conseille DROP CONSTRAINT FK_4EAE09E9899A11ED');
        $this->addSql('ALTER TABLE pays_maladie DROP CONSTRAINT FK_B119637EA6E44244');
        $this->addSql('ALTER TABLE pays_maladie DROP CONSTRAINT FK_B119637EB4B1C397');
        $this->addSql('ALTER TABLE pays_vaccin DROP CONSTRAINT FK_4DCF7F6A6E44244');
        $this->addSql('ALTER TABLE pays_vaccin DROP CONSTRAINT FK_4DCF7F69B14AC76');
        $this->addSql('ALTER TABLE user_pays DROP CONSTRAINT FK_4E1E7067A76ED395');
        $this->addSql('ALTER TABLE user_pays DROP CONSTRAINT FK_4E1E7067A6E44244');
        $this->addSql('ALTER TABLE vaccin_centre DROP CONSTRAINT FK_C22ADD089B14AC76');
        $this->addSql('ALTER TABLE vaccin_centre DROP CONSTRAINT FK_C22ADD08463CD7C3');
        $this->addSql('DROP TABLE "achatsConseille"');
        $this->addSql('DROP TABLE "adressesUtil"');
        $this->addSql('DROP TABLE "centres"');
        $this->addSql('DROP TABLE "infosPratique"');
        $this->addSql('DROP TABLE "maladies"');
        $this->addSql('DROP TABLE maladie_symptome');
        $this->addSql('DROP TABLE maladie_centre');
        $this->addSql('DROP TABLE "pays"');
        $this->addSql('DROP TABLE pays_achat_conseille');
        $this->addSql('DROP TABLE pays_maladie');
        $this->addSql('DROP TABLE pays_vaccin');
        $this->addSql('DROP TABLE "symptomes"');
        $this->addSql('DROP TABLE "users"');
        $this->addSql('DROP TABLE user_pays');
        $this->addSql('DROP TABLE "vaccins"');
        $this->addSql('DROP TABLE vaccin_centre');
    }
}
