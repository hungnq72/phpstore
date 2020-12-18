<?php 
    class User{
        private $db;
        public function __construct(){
            $this->db = new Database;
        }
        public function findUserByEmail($email){
            $this->db->query("SELECT * FROM users where email = :email");
            $this->db->bind(":email", $email);
            $this->db->single();
            if($this->db->rowCount() > 0){
                return true;
            }else{
                return false;
            }
        }
        
        public function findUserByUsername($username){
            $this->db->query("SELECT * FROM users where username = :username");
            $this->db->bind(":username", $username);
            $this->db->single();
            if($this->db->rowCount() > 0){
                return true;
            }else{
                return false;
            }
        }

        public function getUserByID($id){
            $this->db->query("SELECT * FROM users where id = :id");
            $this->db->bind(":id", $id);
            return $this->db->single();
        }

        public function register($data){
            $this->db->query("INSERT INTO users(name, email, username, password, address) VALUES(:name, :email, :username, :password, :address)");
            $this->db->bind(":name", $data["name"]);
            $this->db->bind(":email", $data["email"]);
            $this->db->bind(":username", $data["username"]);
            $this->db->bind(":password", $data["password"]);
            $this->db->bind(":address", $data["address"]);
            if($this->db->execute()){
                return true;
            }else{
                return false;
            }
        }

        public function login($data){
            $this->db->query("SELECT * FROM users WHERE username = :username");
            $this->db->bind(":username", $data['username']);
            $row = $this->db->single();
            $hash_password = $row->password;
            if(password_verify($data['password'], $hash_password)){
                return $row;
            }else{
                return false;
            }
        }
    }