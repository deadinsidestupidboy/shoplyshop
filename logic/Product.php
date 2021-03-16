<?php
require_once ('../core/DB.php');
class Product{
    private function __construct(){}

    public static function get($where, $limit){
        return DB::get('products', '*', $where, $limit);
    }
    
    public static function add($values){
        DB::post('products', '', $values);
    }
}
