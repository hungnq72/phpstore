<?php
    class Product{
        private $db;
        public function __construct(){
            $this->db = new Database;
        }

        public function addProduct($data){
            $this->db->query("INSERT INTO products(user_id, cat_id, pd_name, pd_price, pd_quantity, pd_image, pd_description) VALUES (:user_id, :cat_id, :pd_name, :pd_price, :pd_quantity, :pd_image, :pd_description)");
            $this->db->bind(":user_id", $data['user_id']);
            $this->db->bind(":cat_id", $data['catID']);
            $this->db->bind(":pd_name", $data['pd_name']);
            $this->db->bind(":pd_price", $data['pd_price']);
            $this->db->bind(":pd_quantity", $data['pd_quantity']);
            $this->db->bind(":pd_image", $data['pd_image']);
            $this->db->bind(":pd_description", $data['pd_description']);
            if($this->db->execute()){
                return true;
            }else{
                return false;
            }
        }

        public function deleteProduct($id){
            $this->db->query("DELETE FROM products WHERE pd_id = :pd_id");
            $this->db->bind(":pd_id", $id);
            if($this->db->execute()){
                return true;
            }else{
                return false;
            }
        }

        public function updateProduct($data){
            $this->db->query("UPDATE products SET pd_name = :pd_name, cat_id = :cat_id, pd_price = :pd_price, pd_quantity = :pd_quantity, pd_image = :pd_image, pd_description = :pd_description WHERE pd_id = :pd_id");
            $this->db->bind(":pd_id", $data['pd_id']);
            $this->db->bind(":pd_name", $data['pd_name']);
            $this->db->bind(":cat_id", $data['catID']);
            $this->db->bind(":pd_price", $data['pd_price']);
            $this->db->bind(":pd_quantity", $data['pd_quantity']);
            $this->db->bind(":pd_image", $data['pd_image']);
            $this->db->bind(":pd_description", $data['pd_description']);
            if($this->db->execute()){
                return true;
            }else{
                return false;
            }

        }

        public function getProducts(){
            $this->db->query("SELECT * FROM products
                              LEFT JOIN users 
                              ON products.user_id = users.id
                              LEFT JOIN categories
                              ON products.cat_id = categories.cat_id
                              ");
            $row = $this->db->resultSet();
            return $row;
        }

        public function getProductsWithLimited($num1, $num2){
            $this->db->query("SELECT * FROM products
                              LEFT JOIN users 
                              ON products.user_id = users.id
                              LEFT JOIN categories
                              ON products.cat_id = categories.cat_id
                              LIMIT :num1, :num2 
                              ");
            $this->db->bind(":num1", $num1);
            $this->db->bind(":num2", $num2);
            $row = $this->db->resultSet();
            return $row;
        }

        public function getProductsByUserID($id){
            $this->db->query("SELECT * FROM products
                              LEFT JOIN users 
                              ON products.user_id = users.id
                              LEFT JOIN categories
                              ON products.cat_id = categories.cat_id
                              WHERE user_id = :id
                              ");
            $this->db->bind(":id", $id);
            $row = $this->db->resultSet();
            return $row;
        }
        
        public function getProductByID($pd_id){
            $this->db->query("SELECT * FROM products
                              LEFT JOIN users 
                              ON products.user_id = users.id
                              LEFT JOIN categories
                              ON products.cat_id = categories.cat_id
                              WHERE pd_id = :pd_id
                              ");
            $this->db->bind(":pd_id", $pd_id);
            $row = $this->db->single();
            return $row;
        }

        public function getProductByCategoryID($data){
            $this->db->query("SELECT * FROM products
                              LEFT JOIN users 
                              ON products.user_id = users.id
                              LEFT JOIN categories
                              ON products.cat_id = categories.cat_id
                              WHERE products.cat_id = :cat_id
                              AND products.user_id = :user_id
                              ");
            $this->db->bind(":cat_id", $data['cat_id']);
            $this->db->bind(":user_id", $_SESSION['user_id']);
            $row = $this->db->resultSet();
            return $row;
        }

        public function getAllProductByCategoryID($data){
            $this->db->query("SELECT * FROM products
                              LEFT JOIN users 
                              ON products.user_id = users.id
                              LEFT JOIN categories
                              ON products.cat_id = categories.cat_id
                              WHERE products.cat_id = :cat_id
                              ");
            $this->db->bind(":cat_id", $data['cat_id']);
            $row = $this->db->resultSet();
            return $row;
        }

        public function getProductBySearchBar($data){
            $this->db->query("SELECT * FROM products
                              LEFT JOIN users 
                              ON products.user_id = users.id
                              LEFT JOIN categories
                              ON products.cat_id = categories.cat_id
                              WHERE products.pd_name like :pd_name
                              AND products.user_id = :user_id
                              ");
            $this->db->bind(":pd_name", '%' . $data['pd_name'] . '%');
            $this->db->bind(":user_id", $_SESSION['user_id']);
            $row = $this->db->resultSet();
            return $row;
        }

        public function searchProducts($string){
            $this->db->query("SELECT * FROM products where pd_name like :string");
            $this->db->bind(":string", '%' . $string . '%');
            return $this->db->resultSet();
        }

        public function countProduct(){
            $this->db->query("SELECT COUNT(*) as counting FROM products");
            return $this->db->single();
        }
    }