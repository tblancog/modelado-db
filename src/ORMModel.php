<?php

class ORMModel extends PDO{
    
    //public $conn;
    private $dsn = "mysql:host=localhost;dbname=Moodle";
    private $username = "root";
    private $password = "abcd1234";
    
    public function __construct(){
        
        // DB connect
        parent::__construct(
                             $this->dsn,
                             $this->username, 
                             $this->password);
    }
    
    
}

class User extends ORMModel
{
    
    public function all(){
        return $this->query("SELECT * FROM users")->fetchAll(PDO::FETCH_CLASS, User::class);
    }
    
    public function first(){
        return $this->query("SELECT * FROM users LIMIT 1")->fetchObject(User::class);
        
    }
    
    public function getWhere($key, $value){
        return $this->query("SELECT * FROM users WHERE $key='$value'")->fetchAll(PDO::FETCH_CLASS, User::class);
        
    }
    
    public function create($data){
        if($data != NULL){
            
            $params = [];
            foreach($data as $row){
                $params[] = "(
                '".$row['nombre']."',
                '".$row['apellido']."',
                '".$row['email']."',
                '".$row['descripcion']."',
                '".$row['timemodified']."')";
            }
            $sql = "INSERT INTO users (nombre, apellido, email, descripcion, timemodified)
VALUES ".implode(',', $params);
            $this->query($sql);
        }
    }
}