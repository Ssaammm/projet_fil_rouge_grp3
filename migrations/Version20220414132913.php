<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220414132913 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE chiffre_affaire CHANGE nb_moyen nb_moyen INT NOT NULL, CHANGE nb_grande nb_grande INT NOT NULL, CHANGE pourc_petite pourc_petite DOUBLE PRECISION NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE chiffre_affaire CHANGE nb_moyen nb_moyen NUMERIC(10, 0) NOT NULL, CHANGE nb_grande nb_grande NUMERIC(10, 2) NOT NULL, CHANGE pourc_petite pourc_petite NUMERIC(2, 2) NOT NULL');
    }
}
