<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230318183932 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE user_pays (user_id INT NOT NULL, pays_id INT NOT NULL, PRIMARY KEY(user_id, pays_id))');
        $this->addSql('CREATE INDEX IDX_4E1E7067A76ED395 ON user_pays (user_id)');
        $this->addSql('CREATE INDEX IDX_4E1E7067A6E44244 ON user_pays (pays_id)');
        $this->addSql('ALTER TABLE user_pays ADD CONSTRAINT FK_4E1E7067A76ED395 FOREIGN KEY (user_id) REFERENCES "users" (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE user_pays ADD CONSTRAINT FK_4E1E7067A6E44244 FOREIGN KEY (pays_id) REFERENCES "pays" (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE user_pays DROP CONSTRAINT FK_4E1E7067A76ED395');
        $this->addSql('ALTER TABLE user_pays DROP CONSTRAINT FK_4E1E7067A6E44244');
        $this->addSql('DROP TABLE user_pays');
    }
}
