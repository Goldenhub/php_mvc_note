<?php

namespace Core;

use PDOException;

class Database {
    public $stmt;

    public $connection; 

    public function __construct($config){
        
        $dsn = http_build_query($config, "", ";");
        $dsn = "mysql:{$dsn}";
        try{
            $this->connection = new \PDO($dsn, 'root', '', [
                \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC
            ]);
        }catch(PDOException $e){
            dump_die($e);
        }

    }

    public function query($query, $params){
        $this->stmt = $this->connection->prepare($query);
        $this->stmt->execute($params);

        return $this;
    }

    public function get() {
        return $this->stmt->fetchAll();
    }
    public function fetchOne() {
        return $this->stmt->fetch();
    }

    public function getOrFail() {
        $result = $this->stmt->fetchAll();

        if(! $result){
            abort('403');
        }

        return $result;
    }

    public function findOrFail() {
        $result = $this->stmt->fetch();

        if(! $result){
            abort('403');
        }

        return $result;
    }
}