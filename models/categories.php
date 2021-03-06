<?php
class Categories 
{
    private $db;
    
    public function __construct(){
        $this->db = new PDO("mysql:host=localhost;dbname=traveljournal;charset=utf8mb4","root","");
    }

    public function getHotelCategory(){        
        $query = $this->db->prepare("
        SELECT category_id, name, permalink
        FROM categories;       
        ");
        $query ->execute();
        // 3- caso seja SELECT, é necessário obter os dados para dentro de uma variavel
        return $query->fetchAll( PDO::FETCH_ASSOC);        
    }


    public function createCategory($permalink, $name){  
        
        $query = $this->db->prepare("
        INSERT INTO categories (permalink, name)
        VALUES (?,?);       
        ");
       return $query ->execute([$permalink, $name]);       
    }   
}


?>


