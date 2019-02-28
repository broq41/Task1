<?php

namespace App\Model;

class News {


    public const CREATE_TABLE_STMT = '
                CREATE TABLE news (
                id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                name VARCHAR(30) NOT NULL,
                description text,
                is_active boolean NOT NULL DEFAULT 1,
                created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
                updated_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
                author_id INT(6) NOT NULL)   
                           ';


}