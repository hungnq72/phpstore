<?php 
    class Category{
        private $db;
        public function __construct(){
            $this->db = new Database;
        }

        public function getCategories(){
            $this->db->query('SELECT * FROM categories');
            $row = $this->db->resultSet();
            return $row;
        }

        public function getCategoriesByID($id){
            $this->db->query('SELECT * FROM categories WHERE cat_id = :cat_id');
            $this->db->bind(':cat_id', $id);
            $row = $this->db->resultSet();
            return $row;
        }
    }