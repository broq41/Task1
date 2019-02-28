<?php

namespace App\Model;


class User
{

    public const CREATE_TABLE_STMT = '
                CREATE TABLE users (
                id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                first_name VARCHAR(30) NOT NULL,
                last_name VARCHAR(30) NOT NULL,
                email VARCHAR(50) UNIQUE,
                password VARCHAR(50),
                gender VARCHAR(20),
                is_active boolean NOT NULL DEFAULT 1,
                created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
                updated_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP
               )  
                           ';

}