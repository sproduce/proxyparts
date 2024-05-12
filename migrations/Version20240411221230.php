<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240411221230 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE parts_offer DROP FOREIGN KEY FK_9263F8DFEC37C9B4');
        $this->addSql('ALTER TABLE parts_offer DROP FOREIGN KEY FK_9263F8DF9D86650F');
        $this->addSql('DROP INDEX UNIQ_9263F8DFEC37C9B4 ON parts_offer');
        $this->addSql('DROP INDEX UNIQ_9263F8DF9D86650F ON parts_offer');
        $this->addSql('ALTER TABLE parts_offer ADD part_id INT NOT NULL, ADD user_id INT NOT NULL, DROP part_id_id, DROP user_id_id');
        $this->addSql('ALTER TABLE parts_offer ADD CONSTRAINT FK_9263F8DF4CE34BEC FOREIGN KEY (part_id) REFERENCES part_number (id)');
        $this->addSql('ALTER TABLE parts_offer ADD CONSTRAINT FK_9263F8DFA76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_9263F8DF4CE34BEC ON parts_offer (part_id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_9263F8DFA76ED395 ON parts_offer (user_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE parts_offer DROP FOREIGN KEY FK_9263F8DF4CE34BEC');
        $this->addSql('ALTER TABLE parts_offer DROP FOREIGN KEY FK_9263F8DFA76ED395');
        $this->addSql('DROP INDEX UNIQ_9263F8DF4CE34BEC ON parts_offer');
        $this->addSql('DROP INDEX UNIQ_9263F8DFA76ED395 ON parts_offer');
        $this->addSql('ALTER TABLE parts_offer ADD part_id_id INT NOT NULL, ADD user_id_id INT NOT NULL, DROP part_id, DROP user_id');
        $this->addSql('ALTER TABLE parts_offer ADD CONSTRAINT FK_9263F8DFEC37C9B4 FOREIGN KEY (part_id_id) REFERENCES part_number (id)');
        $this->addSql('ALTER TABLE parts_offer ADD CONSTRAINT FK_9263F8DF9D86650F FOREIGN KEY (user_id_id) REFERENCES user (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_9263F8DFEC37C9B4 ON parts_offer (part_id_id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_9263F8DF9D86650F ON parts_offer (user_id_id)');
    }
}
