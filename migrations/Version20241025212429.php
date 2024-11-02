<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20241025212429 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE part_number DROP INDEX UNIQ_AF00DFC1D3A75577, ADD INDEX IDX_AF00DFC1D3A75577 (part_brand_id)');
        $this->addSql('ALTER TABLE part_number CHANGE part_brand_id part_brand_id INT NOT NULL');
        $this->addSql('ALTER TABLE parts_offer CHANGE part_id part_id SMALLINT NOT NULL, CHANGE user_id user_id SMALLINT NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE part_number DROP INDEX IDX_AF00DFC1D3A75577, ADD UNIQUE INDEX UNIQ_AF00DFC1D3A75577 (part_brand_id)');
        $this->addSql('ALTER TABLE part_number CHANGE part_brand_id part_brand_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE parts_offer CHANGE user_id user_id INT NOT NULL, CHANGE part_id part_id INT NOT NULL');
    }
}
