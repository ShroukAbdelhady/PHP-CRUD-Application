<?php

// singleton design pattern to obtain a single object (single connection) of database class
class DB{

    static private $connection;
    

    private function __construct($database_type,$host,$dbname,$username,$password)
    {
         $db = "$database_type:host=$host;dbname=$dbname";
         DB::$connection = new PDO($db,$username,$password);
    }

    static function connect($database_type,$host,$dbname,$username,$password){
      // check if connection with database is not establisehed yet.
      if(!isset(DB::$connection)){
         new DB($database_type,$host,$dbname,$username,$password);
      }
      // connection is already established -> return connection 
      return DB::$connection;
    }

static function getAll($table){

   $perPage=10;
    // Calculate Total pages
    $stmt = "SELECT count(*) FROM $table";
    $sql = DB::$connection->prepare($stmt);
    $sql->execute();
    $total_results = $sql->fetchColumn();
    $total_pages = ceil($total_results / $perPage);

    // Current page
    $page = isset($_GET['page']) ? $_GET['page'] : 1;
    $starting_limit = ($page - 1) * $perPage;

    // Query to fetch products
   if( $total_pages>1){
   $query = "SELECT * FROM $table ORDER BY id LIMIT $starting_limit,$perPage";
   }else{
      $query = "SELECT * FROM $table";
   }
 
    // Fetch all products for current page
     $sql = DB::$connection->prepare($query);
     $sql->execute();
     $data = $sql->fetchAll(PDO::FETCH_ASSOC);
     return array ('data'=>$data,'total_pages'=>$total_pages) ;
}
     static function getOne($table , $id)
    {
       $query = "SELECT * FROM $table WHERE id=$id";
       $sql = DB::$connection->prepare($query);
        $sql->execute();
       return $sql->fetch(PDO::FETCH_ASSOC);
       
    }
     static function create($table ,$data)
    {
        $col =[];
        $values=[];
        foreach($data as $key => $value){
           array_push($col,"`$key`");
           array_push($values,"'$value'");
        }
        $col = implode(',',$col);
        $values = implode(',',$values);
       $query = "INSERT INTO $table ($col) VALUES ($values)";
       $sql = DB::$connection->prepare($query);
       return $sql->execute();
       
    }
     static function edit($table ,$data, $id)
    {
      $updated_data = array_shift($data);
       $query = "UPDATE $table SET ";
       foreach($data  as $key => $value){
            $query.="$key= '$value',";
       }
       $query = rtrim($query,',');
       $query.="WHERE id=$id ";
       $sql = DB::$connection->prepare($query);
       return  $sql->execute();
       
    }
     static function delete($table,$id)
    {
       $query="DELETE FROM $table WHERE id=$id";
       $sql =DB::$connection->prepare($query);
       return $sql->execute();
    }
}


?>