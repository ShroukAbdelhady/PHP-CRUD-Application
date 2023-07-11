<?php
class Product extends DB{

    static protected $table = 'products';

    static function get(){
        return Product::getAll(Product::$table);
    }
    static function find ($id){
        return Product::getOne(Product::$table,$id);
    }
    static function store ($data){
        return Product::create(Product::$table,$data);
    }
    static function show ($id){
        return Product::create(Product::$table,$id);
    }
    static function update ($data,$id){
        return Product::edit(Product::$table,$data,$id);
    }
    static function destroy ($id){
        return Product::delete(Product::$table,$id);
    }

}
?>