<?php
require_once "Database.php";

class User extends Database{
    public function store($date){
        $first_name = $date['first_name'];
        $last_name = $date['last_name'];
        $username = $date['username'];
        $password =$date['password'];

        $password = password_hash($password,PASSWORD_DEFAULT);
        $sql = "INSERT INTO users (first_name,last_name,username,password)
        VALUES ('$first_name','$last_name',
        '$username','$password')";
        $result = $this->conn->query($sql);
        //check if query is successful
        if($result){
            header("Location: ../views");
            exit();
        }else{
            echo "Error".$sql. "<br>". $this->conn->error;
        }
         
    }   
        
    public function login($request){
      $username = $request['username'];
      $password = $request['password'];


      $sql = "SELECT * FROM users WHERE username='$username'";
      $result =$this->conn->query($sql);
      //result is in the form of associative array
      if($result->num_rows ==1){
        $user = $result->fetch_assoc();
        if(password_verify($password,$user['password'])){
           session_start();
           $_SESSION['id'] = $user['id'];
           $_SESSION['username']= $user['username'];
           $_SESSION['full_name'] = $user['first_name']. " " . $user["last_name"];
           
          // print_r($_SESSION['id']);
           header("Location: ../views/dashboard.php");
           exit();
        }else{
            echo "Wrong Password";
        }
      }else{
        echo "User not Found" ;
      }
    }
    public function logout(){
        session_start();
        session_unset();
        session_destroy();

        header('Location: ../views');
        exit();
        }
    

    
        public function getAllUsers(){
       $sql = "SELECT id, first_name, last_name, username, photo FROM users";
        if($result = $this->conn->query($sql)){
            return $result;
    
        }else{
            die('Error:' . $this->conn->error);
        }
    }
    //this a method to get
    public function getUser(){
        $id = $_SESSION["id"];
        $sql = "SELECT * FROM users WHERE id = '$id' ";
        if ($result = $this->conn->query($sql)){
            return $result->fetch_assoc();
        }else{
            die("Error: " . $this->conn->error);
        }
    }
    
    public function update($request,$files){
        session_start();
        $id = $_SESSION['id'];
        $first_name = $request['first_name'];
        $last_name = $request['last_name'];
        $username = $request['username'];
        $photo = $files['photo']['name'];
        $tmp_photo = $files['photo']['tmp_name'];
        
        $sql ="UPDATE users SET first_name = '$first_name', last_name='$last_name', username='$username', photo='$photo' WHERE id ='$id' ";
        
        if($this->conn->query($sql)){
            $_SESSION['username'] = $username;
            $_SESSION['full_name'] = "$first_name $last_name";
    
            if($photo){
                $sql = "UPDATE users SET photo ='$photo' WHERE id = '$id' ";
                $destination = "../assets/images/" . $photo;
    
                if($this->conn->query($sql)){
                    if(move_uploaded_file($tmp_photo, $destination)){
                        header("location: ../views/dashboard.php");
                        exit();
                    }
                } else {
                    die("Error: " . $this->conn->error);
                }
            } 
            header("Location: ../views/dashboard.php");
            exit(); ;
            //this is the exit
            
        } else {
            die("Error: " . $this->conn->error);
        }
    }

    public function delete() {
        session_start();
        $id = $_SESSION['id'];
        $sql = "DELETE FROM users WHERE id = '$id' ";

        if ($this->conn->query($sql)) {
            header("Location: ../views/dashboard.php");
            exit();
        } else {
            die("Error: " . $this->conn->error);
        }
    }
}
?>