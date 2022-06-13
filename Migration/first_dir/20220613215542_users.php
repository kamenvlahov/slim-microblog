<?php

declare(strict_types=1);

use Phoenix\Migration\AbstractMigration;

final class Users extends AbstractMigration
{
    protected function up(): void
    {
        $this->execute('CREATE TABLE `users` (
            `id` int(11) NOT NULL AUTO_INCREMENT,
            `username` varchar(100) COLLATE utf8_bin NOT NULL,
            `password` varchar(100) COLLATE utf8_bin NOT NULL,
            `rights` smallint(6) NOT NULL,
            `updated_at` datetime DEFAULT NULL,
            `created_at` datetime DEFAULT NULL,
            PRIMARY KEY (`id`)
          ) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_bin'

        );
    }

    protected function down(): void
    {
        $this->table('users')
            ->drop();
        
    }
}
