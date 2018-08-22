<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20180815145312 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE booking ADD paid TINYINT(1) DEFAULT NULL, DROP stripe_transaction, CHANGE total_price total_price INT NOT NULL, CHANGE number_order number_order VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE information CHANGE price_ticket price_ticket INT NOT NULL');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE booking ADD stripe_transaction VARCHAR(255) DEFAULT NULL COLLATE utf8_unicode_ci, DROP paid, CHANGE total_price total_price INT DEFAULT NULL, CHANGE number_order number_order VARCHAR(255) DEFAULT NULL COLLATE utf8_unicode_ci');
        $this->addSql('ALTER TABLE information CHANGE price_ticket price_ticket INT DEFAULT NULL');
    }
}
