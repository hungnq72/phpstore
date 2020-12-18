<?php
    class Page{
        private $db;
        public function __construct(){
            $this->db = new Database;
        }

        public function sendMsg($data){
            $this->db->query('INSERT INTO contact(email, msg) VALUES (:email, :msg)');
            $this->db->bind(':email', $data['email']);
            $this->db->bind(':msg', $data['msg']);
            if($this->db->execute()){
                return true;
            }else{
                return false;
            }

        }
    }