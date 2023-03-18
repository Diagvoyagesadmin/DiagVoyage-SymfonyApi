<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230318184410 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE maladie_symptome (maladie_id INT NOT NULL, symptome_id INT NOT NULL, PRIMARY KEY(maladie_id, symptome_id))');
        $this->addSql('CREATE INDEX IDX_941A7D2DB4B1C397 ON maladie_symptome (maladie_id)');
        $this->addSql('CREATE INDEX IDX_941A7D2D12B83D77 ON maladie_symptome (symptome_id)');
        $this->addSql('CREATE TABLE maladie_centre (maladie_id INT NOT NULL, centre_id INT NOT NULL, PRIMARY KEY(maladie_id, centre_id))');
        $this->addSql('CREATE INDEX IDX_97C302BDB4B1C397 ON maladie_centre (maladie_id)');
        $this->addSql('CREATE INDEX IDX_97C302BD463CD7C3 ON maladie_centre (centre_id)');
        $this->addSql('CREATE TABLE pays_achat_conseille (pays_id INT NOT NULL, achat_conseille_id INT NOT NULL, PRIMARY KEY(pays_id, achat_conseille_id))');
        $this->addSql('CREATE INDEX IDX_4EAE09E9A6E44244 ON pays_achat_conseille (pays_id)');
        $this->addSql('CREATE INDEX IDX_4EAE09E9899A11ED ON pays_achat_conseille (achat_conseille_id)');
        $this->addSql('CREATE TABLE pays_maladie (pays_id INT NOT NULL, maladie_id INT NOT NULL, PRIMARY KEY(pays_id, maladie_id))');
        $this->addSql('CREATE INDEX IDX_B119637EA6E44244 ON pays_maladie (pays_id)');
        $this->addSql('CREATE INDEX IDX_B119637EB4B1C397 ON pays_maladie (maladie_id)');
        $this->addSql('CREATE TABLE pays_vaccin (pays_id INT NOT NULL, vaccin_id INT NOT NULL, PRIMARY KEY(pays_id, vaccin_id))');
        $this->addSql('CREATE INDEX IDX_4DCF7F6A6E44244 ON pays_vaccin (pays_id)');
        $this->addSql('CREATE INDEX IDX_4DCF7F69B14AC76 ON pays_vaccin (vaccin_id)');
        $this->addSql('CREATE TABLE vaccin_centre (vaccin_id INT NOT NULL, centre_id INT NOT NULL, PRIMARY KEY(vaccin_id, centre_id))');
        $this->addSql('CREATE INDEX IDX_C22ADD089B14AC76 ON vaccin_centre (vaccin_id)');
        $this->addSql('CREATE INDEX IDX_C22ADD08463CD7C3 ON vaccin_centre (centre_id)');
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
        $this->addSql('ALTER TABLE vaccin_centre ADD CONSTRAINT FK_C22ADD089B14AC76 FOREIGN KEY (vaccin_id) REFERENCES "vaccins" (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE vaccin_centre ADD CONSTRAINT FK_C22ADD08463CD7C3 FOREIGN KEY (centre_id) REFERENCES "centres" (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
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
        $this->addSql('ALTER TABLE vaccin_centre DROP CONSTRAINT FK_C22ADD089B14AC76');
        $this->addSql('ALTER TABLE vaccin_centre DROP CONSTRAINT FK_C22ADD08463CD7C3');
        $this->addSql('DROP TABLE maladie_symptome');
        $this->addSql('DROP TABLE maladie_centre');
        $this->addSql('DROP TABLE pays_achat_conseille');
        $this->addSql('DROP TABLE pays_maladie');
        $this->addSql('DROP TABLE pays_vaccin');
        $this->addSql('DROP TABLE vaccin_centre');
    }
}
