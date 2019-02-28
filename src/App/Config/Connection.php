<?php
namespace App\Config;

class Connection{

    function getConnectionDb()
    {
        require 'dbConfig.php';

        try {

            $db = new \PDO('mysql:host=' . $host . ';dbname=' . $database, $user, $password);
            $db->setAttribute( \PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION );
            return $db;

        } catch (PDOException $e) {

            print "Błąd połączenia z bazą!: " . $e->getMessage() . "<br/>";

            die();
        }

    }
}

