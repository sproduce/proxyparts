<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240414223913 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE parts_offer DROP INDEX UNIQ_9263F8DFA76ED395, ADD INDEX IDX_9263F8DFA76ED395 (user_id)');
        $this->addSql('ALTER TABLE parts_offer DROP INDEX UNIQ_9263F8DF4CE34BEC, ADD INDEX IDX_9263F8DF4CE34BEC (part_id)');
        //$this->addSql('ALTER TABLE parts_offer CHANGE part_id part_id SMALLINT NOT NULL, CHANGE user_id user_id SMALLINT NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE parts_offer DROP INDEX IDX_9263F8DF4CE34BEC, ADD UNIQUE INDEX UNIQ_9263F8DF4CE34BEC (part_id)');
        $this->addSql('ALTER TABLE parts_offer DROP INDEX IDX_9263F8DFA76ED395, ADD UNIQUE INDEX UNIQ_9263F8DFA76ED395 (user_id)');
        //$this->addSql('ALTER TABLE parts_offer CHANGE user_id user_id INT NOT NULL, CHANGE part_id part_id INT NOT NULL');
    }
}
