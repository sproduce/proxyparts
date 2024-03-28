<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240323204209 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE parts_offer (id INT AUTO_INCREMENT NOT NULL, part_id_id INT NOT NULL, user_id_id INT NOT NULL, price SMALLINT DEFAULT NULL, price_sale SMALLINT DEFAULT NULL, amount SMALLINT DEFAULT NULL, property SMALLINT NOT NULL, info VARCHAR(255) DEFAULT NULL, comment VARCHAR(255) DEFAULT NULL, public SMALLINT DEFAULT NULL, uuid CHAR(36) NOT NULL COMMENT \'(DC2Type:guid)\', UNIQUE INDEX UNIQ_9263F8DFEC37C9B4 (part_id_id), UNIQUE INDEX UNIQ_9263F8DF9D86650F (user_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE parts_offer ADD CONSTRAINT FK_9263F8DFEC37C9B4 FOREIGN KEY (part_id_id) REFERENCES part_number (id)');
        $this->addSql('ALTER TABLE parts_offer ADD CONSTRAINT FK_9263F8DF9D86650F FOREIGN KEY (user_id_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE part_number DROP INDEX IDX_AF00DFC1D3A75577, ADD UNIQUE INDEX UNIQ_AF00DFC1D3A75577 (part_brand_id)');
        $this->addSql('ALTER TABLE part_number CHANGE part_brand_id part_brand_id INT DEFAULT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE parts_offer DROP FOREIGN KEY FK_9263F8DFEC37C9B4');
        $this->addSql('ALTER TABLE parts_offer DROP FOREIGN KEY FK_9263F8DF9D86650F');
        $this->addSql('DROP TABLE parts_offer');
        $this->addSql('ALTER TABLE part_number DROP INDEX UNIQ_AF00DFC1D3A75577, ADD INDEX IDX_AF00DFC1D3A75577 (part_brand_id)');
        $this->addSql('ALTER TABLE part_number CHANGE part_brand_id part_brand_id INT NOT NULL');
    }
}
