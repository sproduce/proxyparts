<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20241105210053 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        //$this->addSql('ALTER TABLE parts_offer CHANGE property property_id SMALLINT NOT NULL');
        //$this->addSql('CREATE TABLE offer_property (id INT AUTO_INCREMENT NOT NULL, property VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        //!!$this->addSql('ALTER TABLE part_number CHANGE part_brand_id part_brand_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE parts_offer ADD CONSTRAINT FK_9263F8DF549213EC FOREIGN KEY (property_id) REFERENCES offer_property (id)');
        $this->addSql('CREATE INDEX IDX_9263F8DF549213EC ON parts_offer (property_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE parts_offer DROP FOREIGN KEY FK_9263F8DF549213EC');
        $this->addSql('DROP TABLE offer_property');
        $this->addSql('ALTER TABLE part_number CHANGE part_brand_id part_brand_id INT NOT NULL');
        $this->addSql('DROP INDEX IDX_9263F8DF549213EC ON parts_offer');
        $this->addSql('ALTER TABLE parts_offer CHANGE user_id user_id INT NOT NULL, CHANGE part_id part_id INT NOT NULL, CHANGE property_id property SMALLINT NOT NULL');
    }
}
