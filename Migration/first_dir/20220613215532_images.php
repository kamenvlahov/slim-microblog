<?php

declare(strict_types=1);

use Phoenix\Migration\AbstractMigration;

final class Images extends AbstractMigration
{
    protected function up(): void
    {
        $this->execute('CREATE TABLE `images` (
            `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
            `url` varchar(100) COLLATE utf8_bin NOT NULL,
            `article_id` int(11) NOT NULL,
            `updated_at` datetime DEFAULT NULL,
            `created_at` datetime DEFAULT NULL,
            PRIMARY KEY (`id`),
            KEY `images_fk` (`article_id`),
            CONSTRAINT `images_fk` FOREIGN KEY (`article_id`) REFERENCES `articles` (`id`)
          ) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_bin
        ');
    }

    protected function down(): void
    {
        $this->table('images')
            ->drop();
    }
}
