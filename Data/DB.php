<?php
class DB
{
    private $con;
    public function __construct()
    {
        $this->con = new PDO("mysql:host=localhost;dbname=pms;", "root", "");
    }
      public function GetColumn($select,$table,$condition)
      {
        $sql = $this->con->query("SELECT $select FROM $table where $condition ;");
        return $sql->fetchColumn(PDO::FETCH_DEFAULT);
      }
    public function GetAll($table,$condition)
    {
        $sql = $this->con->query("SELECT * FROM $table where $condition ;");
        return $sql->fetchAll(PDO::FETCH_ASSOC);
    }
    public function GetBy($table, $condition)
    {
        $sql = $this->con->query("SELECT * FROM $table where $condition;");
        return $sql->fetch(PDO::FETCH_ASSOC);
    }
    public function create(string $table, array $data)
    {
        $col_names = implode(',', array_keys($data));
        $col_values = array_map(function ($col_values) {
            return "'$col_values'";
        }, $data);
        $col_values = implode(',', $col_values);
        $sql = $this->con->prepare("INSERT INTO $table ($col_names) values ($col_values);");
        $sql->execute();
    }
    public function Update($table, $value, $data, $condition)
    {
        $sql = $this->con->prepare("UPDATE $table SET $value = $data WHERE $condition");
        $sql->execute();
    }
    
    public function Delete($table, $condition)
    {
        $sql = $this->con->prepare("DELETE FROM $table where $condition ");
        $sql->execute();
    }
    public function GetRowsNum(string $table)
    {
        $sql= $this->con->query("SELECT * from $table;");
       return count($sql->fetchAll(PDO::FETCH_ASSOC));

    }
    public function GetSpecificRows($table,$offset,$productsPerPage)
    {
       $sql= $this->con->query("select * from $table limit $productsPerPage offset $offset ;");
       return $sql->fetchAll(PDO::FETCH_ASSOC);
    }
}
