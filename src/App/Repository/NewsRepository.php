<?php

namespace App\Repository;


class NewsRepository extends BaseRepository {


    public function find($id){

        $this->createTable('news');

        $sql = '
        SELECT * FROM news 
        WHERE id = :id';

        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':id', $id);
        $stmt->execute();

        return $stmt->fetch();
    }

    public function findAll(){

        $this->createTable('news');

        $sql = '
        SELECT * FROM news 
        ';

        $stmt = $this->pdo->query($sql);

        return $stmt->fetchAll();
    }


    public function update($data, $tableName, $id)
    {
        $this->createTable($tableName);

        $sql = 'UPDATE ' . $tableName . ' SET ';


        foreach ($data as $column => $value) {

            $sql .= $column . ' = :' . $column . ', ';


        }
        $sql .= 'updated_at = NOW()';

        $sql .= ' WHERE id = :id';

        $stmt = $this->pdo->prepare($sql);

        foreach ($data as $column => $value) {

            $stmt->bindValue(':' . $column, $value);
        }

        $stmt->bindValue(':id', $id);


        $stmt->execute();
    }


    public function remove($id, $tableName)
    {
        $this->createTable($tableName);

        $sql = 'DELETE FROM ' . $tableName . ' WHERE id = :id';

        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':id', $id);

        $stmt->execute();
    }

}