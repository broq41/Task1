<?php

namespace App\Repository;


class UserRepository extends BaseRepository
{

    public function findByEmail($email){

        $this->createTable('users');

        $sql = '
        SELECT * FROM users 
        WHERE email = \'' . $email . '\'
        ';

        $stmt = $this->pdo->query($sql);

       return $stmt->fetch();

    }


}