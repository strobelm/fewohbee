<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

final class Version20260512120000 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Add reservations.direct_booking_requested and online_booking_config.direct_booking_request_enabled for the guest-requested direct-booking signal in INQUIRY mode.';
    }

    public function up(Schema $schema): void
    {
        $this->addSql('ALTER TABLE reservations
            ADD direct_booking_requested TINYINT(1) DEFAULT 0 NOT NULL');

        $this->addSql('ALTER TABLE online_booking_config
            ADD direct_booking_request_enabled TINYINT(1) DEFAULT 0 NOT NULL');
    }

    public function down(Schema $schema): void
    {
        $this->addSql('ALTER TABLE online_booking_config DROP direct_booking_request_enabled');
        $this->addSql('ALTER TABLE reservations DROP direct_booking_requested');
    }
}
