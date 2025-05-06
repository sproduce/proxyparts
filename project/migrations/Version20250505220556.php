<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250505220556 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            CREATE TABLE offer_property (id INT AUTO_INCREMENT NOT NULL, property VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB
        SQL);
        $this->addSql(<<<'SQL'
            CREATE TABLE part_brand (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_8F21AEBB5E237E06 (name), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB
        SQL);
        $this->addSql(<<<'SQL'
            CREATE TABLE part_number (id INT AUTO_INCREMENT NOT NULL, part_brand_id INT DEFAULT NULL, number VARCHAR(255) NOT NULL, number_text VARCHAR(255) DEFAULT NULL, info VARCHAR(255) DEFAULT NULL, uuid CHAR(36) NOT NULL COMMENT '(DC2Type:guid)', created_at DATETIME NOT NULL COMMENT '(DC2Type:datetime_immutable)', INDEX IDX_AF00DFC1D3A75577 (part_brand_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB
        SQL);
        $this->addSql(<<<'SQL'
            CREATE TABLE parts_offer (id INT AUTO_INCREMENT NOT NULL, user_id INT NOT NULL, property_id INT NOT NULL, part_id INT NOT NULL, price SMALLINT DEFAULT NULL, price_sale SMALLINT DEFAULT NULL, amount SMALLINT DEFAULT NULL, info VARCHAR(255) DEFAULT NULL, comment VARCHAR(255) DEFAULT NULL, public SMALLINT DEFAULT NULL, uuid CHAR(36) NOT NULL COMMENT '(DC2Type:guid)', created_at DATETIME NOT NULL COMMENT '(DC2Type:datetime_immutable)', INDEX IDX_9263F8DF549213EC (property_id), INDEX IDX_9263F8DF4CE34BEC (part_id), INDEX IDX_9263F8DFA76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB
        SQL);
        $this->addSql(<<<'SQL'
            CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles JSON NOT NULL COMMENT '(DC2Type:json)', password VARCHAR(255) NOT NULL, nickname VARCHAR(255) DEFAULT NULL, tg_id BIGINT DEFAULT NULL, created_at DATETIME NOT NULL COMMENT '(DC2Type:datetime_immutable)', UNIQUE INDEX UNIQ_8D93D649E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE part_number ADD CONSTRAINT FK_AF00DFC1D3A75577 FOREIGN KEY (part_brand_id) REFERENCES part_brand (id)
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE parts_offer ADD CONSTRAINT FK_9263F8DF549213EC FOREIGN KEY (property_id) REFERENCES offer_property (id)
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE parts_offer ADD CONSTRAINT FK_9263F8DF4CE34BEC FOREIGN KEY (part_id) REFERENCES part_number (id)
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE parts_offer ADD CONSTRAINT FK_9263F8DFA76ED395 FOREIGN KEY (user_id) REFERENCES user (id)
        SQL);
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            ALTER TABLE part_number DROP FOREIGN KEY FK_AF00DFC1D3A75577
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE parts_offer DROP FOREIGN KEY FK_9263F8DF549213EC
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE parts_offer DROP FOREIGN KEY FK_9263F8DF4CE34BEC
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE parts_offer DROP FOREIGN KEY FK_9263F8DFA76ED395
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE offer_property
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE part_brand
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE part_number
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE parts_offer
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE user
        SQL);
    }
}
