<?php 
    class Cart{
        private $db;
        public function __construct(){
            $this->db = new Database;
        }

        public function add($data){
            $this->db->query("INSERT INTO carts(pd_id, s_id, user_id, cart_quantity) VALUE(:pd_id, :s_id, :user_id, :cart_quantity)");
            $this->db->bind(":pd_id", $data['pd_id']);
            $this->db->bind(":s_id", $_SESSION['user_id']);
            $this->db->bind(":user_id", $data['user_id']);
            $this->db->bind(":cart_quantity", $data['cart_quantity']);
            if($this->db->execute()){
                return true;
            }else{
                return false;
            }
        }
  
        public function show(){
            $this->db->query("SELECT *, pd_price*cart_quantity AS total_cart FROM carts
                              LEFT JOIN users 
                              ON carts.user_id = users.id
                              LEFT JOIN products
                              ON carts.pd_id = products.pd_id
                              WHERE s_id = :s_id
                              ");
            $this->db->bind(":s_id", $_SESSION['user_id']);
            $row = $this->db->resultSet();
            return $row;
        }
        
        public function showSingle(){
            $this->db->query("SELECT * FROM carts
                              LEFT JOIN users 
                              ON carts.user_id = users.id
                              LEFT JOIN products
                              ON carts.pd_id = products.pd_id
                              WHERE s_id = :s_id
                              ");
            $this->db->bind(":s_id", $_SESSION['user_id']);
            $row = $this->db->Single();
            return $row;
        }

        public function showTotal(){
            $this->db->query("SELECT SUM(pd_price*cart_quantity) AS total FROM carts
                              LEFT JOIN users 
                              ON carts.user_id = users.id
                              LEFT JOIN products
                              ON carts.pd_id = products.pd_id
                              WHERE carts.s_id = :s_id
                              ");
            $this->db->bind(":s_id", $_SESSION['user_id']);
            $row = $this->db->single();
            return $row;
        }

        public function showTotalCart(){
            $this->db->query("SELECT pd_price*cart_quantity AS total_cart FROM carts
                              LEFT JOIN users 
                              ON carts.user_id = users.id
                              LEFT JOIN products
                              ON carts.pd_id = products.pd_id
                              WHERE carts.s_id = :s_id
                              ");
            $this->db->bind(":s_id", $_SESSION['user_id']);
            $row = $this->db->resultSet();
            return $row;
        }

        

        public function update($data){
            $this->db->query("UPDATE carts SET cart_quantity = :cart_quantity WHERE cart_id = :cart_id");
            $this->db->bind(":cart_id", $data['cart_id']);
            $this->db->bind(":cart_quantity", $data['cart_quantity']);
            if($this->db->execute()){
                return true;
            }else{
                return false;
            }
        }

        public function delete($id){
            $this->db->query("DELETE FROM carts WHERE cart_id = :cart_id");
            $this->db->bind(":cart_id", $id);
            if($this->db->execute()){
                return true;
            }else{
                return false;
            }
        }

        public function deleteAll($id){
            $this->db->query("DELETE FROM carts WHERE s_id = :s_id");
            $this->db->bind(":s_id", $id);
            if($this->db->execute()){
                return true;
            }else{
                return false;
            }
        }
    }