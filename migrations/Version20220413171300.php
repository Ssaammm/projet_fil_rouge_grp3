<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220413171300 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE chiffre_affaire (id INT AUTO_INCREMENT NOT NULL, nb_petite INT NOT NULL, nb_moyen INT NOT NULL, nb_grande INT NOT NULL, pourc_petite INT NOT NULL, pourc_moyen INT NOT NULL, pourc_grande INT NOT NULL, total_petite INT NOT NULL, total_moyen INT NOT NULL, total_grande INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE chiffre_affaire');
    }
}
