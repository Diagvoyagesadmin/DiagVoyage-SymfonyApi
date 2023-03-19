<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230319100654 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE maladie_symptome (maladie_id INT NOT NULL, symptome_id INT NOT NULL, INDEX IDX_941A7D2DB4B1C397 (maladie_id), INDEX IDX_941A7D2D12B83D77 (symptome_id), PRIMARY KEY(maladie_id, symptome_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE maladie_centre (maladie_id INT NOT NULL, centre_id INT NOT NULL, INDEX IDX_97C302BDB4B1C397 (maladie_id), INDEX IDX_97C302BD463CD7C3 (centre_id), PRIMARY KEY(maladie_id, centre_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE pays_achat_conseille (pays_id INT NOT NULL, achat_conseille_id INT NOT NULL, INDEX IDX_4EAE09E9A6E44244 (pays_id), INDEX IDX_4EAE09E9899A11ED (achat_conseille_id), PRIMARY KEY(pays_id, achat_conseille_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE pays_maladie (pays_id INT NOT NULL, maladie_id INT NOT NULL, INDEX IDX_B119637EA6E44244 (pays_id), INDEX IDX_B119637EB4B1C397 (maladie_id), PRIMARY KEY(pays_id, maladie_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE pays_vaccin (pays_id INT NOT NULL, vaccin_id INT NOT NULL, INDEX IDX_4DCF7F6A6E44244 (pays_id), INDEX IDX_4DCF7F69B14AC76 (vaccin_id), PRIMARY KEY(pays_id, vaccin_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user_pays (user_id INT NOT NULL, pays_id INT NOT NULL, INDEX IDX_4E1E7067A76ED395 (user_id), INDEX IDX_4E1E7067A6E44244 (pays_id), PRIMARY KEY(user_id, pays_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE vaccin_centre (vaccin_id INT NOT NULL, centre_id INT NOT NULL, INDEX IDX_C22ADD089B14AC76 (vaccin_id), INDEX IDX_C22ADD08463CD7C3 (centre_id), PRIMARY KEY(vaccin_id, centre_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE maladie_symptome ADD CONSTRAINT FK_941A7D2DB4B1C397 FOREIGN KEY (maladie_id) REFERENCES `maladies` (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE maladie_symptome ADD CONSTRAINT FK_941A7D2D12B83D77 FOREIGN KEY (symptome_id) REFERENCES `symptomes` (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE maladie_centre ADD CONSTRAINT FK_97C302BDB4B1C397 FOREIGN KEY (maladie_id) REFERENCES `maladies` (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE maladie_centre ADD CONSTRAINT FK_97C302BD463CD7C3 FOREIGN KEY (centre_id) REFERENCES `centres` (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE pays_achat_conseille ADD CONSTRAINT FK_4EAE09E9A6E44244 FOREIGN KEY (pays_id) REFERENCES `pays` (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE pays_achat_conseille ADD CONSTRAINT FK_4EAE09E9899A11ED FOREIGN KEY (achat_conseille_id) REFERENCES `achatsConseille` (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE pays_maladie ADD CONSTRAINT FK_B119637EA6E44244 FOREIGN KEY (pays_id) REFERENCES `pays` (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE pays_maladie ADD CONSTRAINT FK_B119637EB4B1C397 FOREIGN KEY (maladie_id) REFERENCES `maladies` (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE pays_vaccin ADD CONSTRAINT FK_4DCF7F6A6E44244 FOREIGN KEY (pays_id) REFERENCES `pays` (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE pays_vaccin ADD CONSTRAINT FK_4DCF7F69B14AC76 FOREIGN KEY (vaccin_id) REFERENCES `vaccins` (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE user_pays ADD CONSTRAINT FK_4E1E7067A76ED395 FOREIGN KEY (user_id) REFERENCES `users` (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE user_pays ADD CONSTRAINT FK_4E1E7067A6E44244 FOREIGN KEY (pays_id) REFERENCES `pays` (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE vaccin_centre ADD CONSTRAINT FK_C22ADD089B14AC76 FOREIGN KEY (vaccin_id) REFERENCES `vaccins` (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE vaccin_centre ADD CONSTRAINT FK_C22ADD08463CD7C3 FOREIGN KEY (centre_id) REFERENCES `centres` (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE adressesutil ADD pays_id INT NOT NULL');
        $this->addSql('ALTER TABLE adressesutil ADD CONSTRAINT FK_8A63084EA6E44244 FOREIGN KEY (pays_id) REFERENCES `pays` (id)');
        $this->addSql('CREATE INDEX IDX_8A63084EA6E44244 ON adressesutil (pays_id)');
        $this->addSql('ALTER TABLE infospratique ADD pays_id INT NOT NULL, ADD state_of_voyage VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE infospratique ADD CONSTRAINT FK_8B74DF0AA6E44244 FOREIGN KEY (pays_id) REFERENCES `pays` (id)');
        $this->addSql('CREATE INDEX IDX_8B74DF0AA6E44244 ON infospratique (pays_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE maladie_symptome DROP FOREIGN KEY FK_941A7D2DB4B1C397');
        $this->addSql('ALTER TABLE maladie_symptome DROP FOREIGN KEY FK_941A7D2D12B83D77');
        $this->addSql('ALTER TABLE maladie_centre DROP FOREIGN KEY FK_97C302BDB4B1C397');
        $this->addSql('ALTER TABLE maladie_centre DROP FOREIGN KEY FK_97C302BD463CD7C3');
        $this->addSql('ALTER TABLE pays_achat_conseille DROP FOREIGN KEY FK_4EAE09E9A6E44244');
        $this->addSql('ALTER TABLE pays_achat_conseille DROP FOREIGN KEY FK_4EAE09E9899A11ED');
        $this->addSql('ALTER TABLE pays_maladie DROP FOREIGN KEY FK_B119637EA6E44244');
        $this->addSql('ALTER TABLE pays_maladie DROP FOREIGN KEY FK_B119637EB4B1C397');
        $this->addSql('ALTER TABLE pays_vaccin DROP FOREIGN KEY FK_4DCF7F6A6E44244');
        $this->addSql('ALTER TABLE pays_vaccin DROP FOREIGN KEY FK_4DCF7F69B14AC76');
        $this->addSql('ALTER TABLE user_pays DROP FOREIGN KEY FK_4E1E7067A76ED395');
        $this->addSql('ALTER TABLE user_pays DROP FOREIGN KEY FK_4E1E7067A6E44244');
        $this->addSql('ALTER TABLE vaccin_centre DROP FOREIGN KEY FK_C22ADD089B14AC76');
        $this->addSql('ALTER TABLE vaccin_centre DROP FOREIGN KEY FK_C22ADD08463CD7C3');
        $this->addSql('DROP TABLE maladie_symptome');
        $this->addSql('DROP TABLE maladie_centre');
        $this->addSql('DROP TABLE pays_achat_conseille');
        $this->addSql('DROP TABLE pays_maladie');
        $this->addSql('DROP TABLE pays_vaccin');
        $this->addSql('DROP TABLE user_pays');
        $this->addSql('DROP TABLE vaccin_centre');
        $this->addSql('ALTER TABLE `adressesUtil` DROP FOREIGN KEY FK_8A63084EA6E44244');
        $this->addSql('DROP INDEX IDX_8A63084EA6E44244 ON `adressesUtil`');
        $this->addSql('ALTER TABLE `adressesUtil` DROP pays_id');
        $this->addSql('ALTER TABLE `infosPratique` DROP FOREIGN KEY FK_8B74DF0AA6E44244');
        $this->addSql('DROP INDEX IDX_8B74DF0AA6E44244 ON `infosPratique`');
        $this->addSql('ALTER TABLE `infosPratique` DROP pays_id, DROP state_of_voyage');
    }
}
