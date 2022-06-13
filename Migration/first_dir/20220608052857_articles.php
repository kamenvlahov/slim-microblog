<?php

declare(strict_types=1);

use Phoenix\Migration\AbstractMigration;

final class Articles extends AbstractMigration
{
    protected function up(): void
    {
        $this->execute('CREATE TABLE `articles` (
            `id` int(11) NOT NULL AUTO_INCREMENT,
            `title` varchar(255) COLLATE utf8_bin NOT NULL,
            `description` varchar(255) COLLATE utf8_bin DEFAULT NULL,
            `body` text COLLATE utf8_bin DEFAULT NULL,
            `user_id` int(11) DEFAULT NULL,
            `date_created` datetime NOT NULL,
            `updated_at` datetime DEFAULT NULL,
            `created_at` datetime DEFAULT NULL,
            PRIMARY KEY (`id`),
            KEY `articles_fk` (`user_id`),
            CONSTRAINT `articles_fk` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
          ) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_bin
        '
        );
    }

    protected function down(): void
    {
        $this->table('articles')
            ->drop();
    }
}
