<?php
    class Students{ 
        public $name;
        public $age; 
        public $sex; 
        public $address; 
        public $class; 
        public function createItem($name, $age, $sex, $address, $class){
            $this->name = $name;
            $this->age = $age;
            $this->sex = $sex;
            $this->address = $address;
            $this->class = $class;
            $query = "insert into students(name, age, sex, address, class) values('".$this->name."', ".$this->age.", ".$this->sex.", '".$this->address."', '".$this->class."')";
            execute($query);
            http_response_code(200);
        }
        public function updateItem($id,$name, $age, $sex, $address, $class){
            $this->name = $name;
            $this->age = $age;
            $this->sex = $sex;
            $this->address = $address;
            $this->class = $class;
            $query = "update students set name = '".$this->name."', age = ".$this->age.", sex = ".$this->sex.", address = '".$this->address."', class = '".$this->class."' where id = ".$id;
            execute($query);
            http_response_code(201);
        }
        public static function deleteItem($id){
            $query = "delete from students where id = ".$id;
            execute($query);
            http_response_code(201);
        }
        public static function readItem($id){
            $idQuery = $id;
            $queryStudent = "select * from students where id = ".$idQuery." limit 1";
            $queryResultUser = executeResult($queryStudent,true);
            if(!empty($queryResultUser)){
                echo json_encode($queryResultUser);
                http_response_code(200);
            }else{
                http_response_code(203);
            }
        }
        public static function readAll(){
            $queryStudents = "select * from students";
            $queryResultUser = executeResult($queryStudents);
            if(!empty($queryResultUser)){
                echo json_encode($queryResultUser);
                http_response_code(200);
            }else{
                http_response_code(203);
            }
        }
    }
?>