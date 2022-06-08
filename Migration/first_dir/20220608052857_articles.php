<?php

declare(strict_types=1);

use Phoenix\Migration\AbstractMigration;

final class Articles extends AbstractMigration
{
    protected function up(): void
    {
        $this->execute('CREATE TABLE blog.articles (
            id INT NOT NULL AUTO_INCREMENT,
            title varchar(255) NOT NULL,
            description varchar(255) NULL,
            body TEXT NULL,
            user_id INT NULL,
            date_created DATETIME NOT NULL,
            CONSTRAINT articles_pk PRIMARY KEY (id),
            CONSTRAINT articles_fk FOREIGN KEY (user_id) REFERENCES blog.users(id)
        )
        ENGINE=InnoDB
        DEFAULT CHARSET=utf8
        COLLATE=utf8_bin;
        '
        );
    }

    protected function down(): void
    {
        $this->table('articles')
            ->drop();
    }
}
