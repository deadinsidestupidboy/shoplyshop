<?php
class DB{
    private function __construct(){}
    
    public static function get($table, $collumns, $where, $limit)
    {
        $link = mysqli_connect('localhost', 'root', '', 'shoplyshop');
        $query = "SELECT $collumns FROM $table $where $limit";
        $result = mysqli_query($link, $query);
        mysqli_close($link);
        return $result;
    }
    public static function post($table, $collumns, $values)
    {
        $link = mysqli_connect('localhost', 'root', '', 'shoplyshop');
        $query = "INSERT INTO $table ($collumns) VALUES ($values)";
        $result = mysqli_query($link, $query);
        mysqli_close($link);
    }
}