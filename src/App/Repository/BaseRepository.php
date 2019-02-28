<?php

namespace App\Repository;

use App\Config\Connection;
use App\Model\News;
use App\Model\User;


/**
 * Class BaseRepository
 * @package App\Repository
 */
abstract class BaseRepository
{

    /** @var Connection $connection */
    protected $pdo;

    /**
     * BaseRepository constructor.
     */
    public function __construct()
    {
        $connection = new Connection();
        $this->pdo = $connection->getConnectionDb();
    }

    /**
     * @param $data
     * @param $tableName
     */
    public function save($data, $tableName)
    {
        $this->createTable($tableName);

        $sql = 'INSERT INTO ' . $tableName . '(';
        $cnt = count($data);
        $cols = 1;
        $values = 1;

        foreach ($data as $column => $value) {

            $sql .= '' . $column;

            if($cols < $cnt){
             $sql .=', ';
            }

            $cols++;
        }

        $sql .= ') VALUES (';

        foreach ($data as $column => $value) {

            $sql .= ':' . $column . '';

            if($values < $cnt){
                $sql .=', ';
            }
            $values++;
        }

        $sql .= ')';
        $stmt = $this->pdo->prepare($sql);

        foreach ($data as $column => $value) {

            $stmt->bindValue(':' . $column, $value);
        }

        $stmt->execute();

    }

    /**
     * @param $tableName
     * @return null
     */
    protected function createTable($tableName)
    {
        $table = $this->tableExists($tableName);

        if ($table) {
            return null;
        }

        switch ($tableName) {
            case 'users' :
                $sql = User::CREATE_TABLE_STMT;
                break;
            case 'news':
                $sql = News::CREATE_TABLE_STMT;
                break;
            default:
                return null;
        }

        try {
            $this->pdo->exec($sql);

        } catch (\PDOException $e) {
            var_dump($e);
        }

    }

    /**
     * @param $tableName
     * @return bool
     */
    protected function tableExists($tableName)
    {
        try {

            $result = $this->pdo->query("SELECT 1 FROM " . $tableName . " LIMIT 1");

        } catch (\Exception $e) {

            return false;
        }

        return $result !== false;
    }


}