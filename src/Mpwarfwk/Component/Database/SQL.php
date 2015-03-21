<?php

namespace Mpwarfwk\Component\Database;


class SQL extends \PDO
{
    private $host,$port,$dbname,$user,$pass,$charset;


    public function __construct($host, $dbname, $user, $pass) {

       // $db = new \PDO('mysql:host=localhost;dbname=mpwar_test',"root", "strongpassword");

        $options = array(
            \PDO::ATTR_PERSISTENT => true,
            \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION
        );
        try {
            parent::__construct('mysql:host='.$host.';dbname='.$dbname, $user, $pass, $options);
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }

    public function selectAll($table, $fetchMode = \PDO::FETCH_ASSOC) {
        $sql = "SELECT * FROM $table;";
        $sth = $this->prepare($sql);
        $sth->execute();
        return $sth->fetchAll($fetchMode);
    }
    public function select($sql, $array = array(), $fetchMode = \PDO::FETCH_ASSOC) {
        $sth = $this->prepare($sql);
        foreach ($array as $key => $value) {
            $sth->bindValue("$key", $value);
        }
        $sth->execute();
        return $sth->fetchAll($fetchMode);
    }
    public function insert($table, $data) {
        ksort($data);
        $fieldNames = implode('`, `', array_keys($data));
        $fieldValues = ':' . implode(', :', array_keys($data));

        $sth = $this->prepare("INSERT INTO $table (`$fieldNames`) VALUES ($fieldValues)");
        print_r($fieldValues);
        foreach($data as $key => $value) {
            $sth->bindValue(":$key", $value);
        }
        $sth->execute();
    }
    public function update($table, $data, $where) {
        ksort($data);
        $fieldDetails = NULL;
        foreach ($data as $key => $value) {
            $fieldDetails .= "`$key`=:$key,";
        }
        $fieldDetails = rtrim($fieldDetails, ',');
        $sth = $this->prepare("UPDATE $table SET $fieldDetails WHERE $where");
        foreach ($data as $key => $value) {
            $sth->bindValue(":$key", $value);
        }
        $sth->execute();
    }
    public function delete($table, $where, $limit = 1) {
        return $this->exec("DELETE FROM $table WHERE $where LIMIT $limit");
    }
}