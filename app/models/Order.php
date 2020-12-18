<?php 
    class Order{
        private $db;
        public function __construct(){
            $this->db = new Database;
        }

        public function add($data){
            $this->db->query("INSERT INTO orders(s_id, customer_id, seller_id, is_confirmed) VALUE(:s_id, :customer_id, :seller_id, 0)");
            $this->db->bind(":s_id", $_SESSION['user_id']);
            $this->db->bind(":customer_id", $_SESSION['user_id']);
            $this->db->bind(":seller_id", $data['user_id']);
            if($this->db->execute()){
                return true;
            }else{
                return false;
            }
        }
        
        public function addOrderDetail($data){
            $this->db->query("INSERT INTO orders_detail(order_id, s_id, pd_id, order_quantity, order_detail_address, order_detail_total, order_detail_total_cart) 
                              VALUES (:order_id, :s_id, :pd_id, :order_quantity, :order_detail_address, :order_detail_total, :order_detail_total_cart) ");
            $this->db->bind(":order_id", $data['order_id']);
            $this->db->bind(":s_id", $data['s_id']);
            $this->db->bind(":pd_id", $data['pd_id']);
            $this->db->bind(":order_quantity", $data['order_quantity']);
            $this->db->bind(":order_detail_address", $data['order_detail_address']);
            $this->db->bind(":order_detail_total", $data['order_detail_total']);
            $this->db->bind(":order_detail_total_cart", $data['order_detail_total_cart']);
            if($this->db->execute()){
                return true;
            }else{
                return false;
            }
        }

        public function cancelOrder($id){
            
        }

        public function getOrderID(){
            $this->db->query("SELECT order_id from orders ORDER BY order_id DESC LIMIT 1");
            $row = $this->db->Single();
            return $row;
        }

        public function getSID(){
            $this->db->query("SELECT s_id from orders ORDER BY order_id DESC LIMIT 1");
            $row = $this->db->Single();
            return $row;
        }

        public function getOrder(){
            $this->db->query("SELECT * FROM orders
                              LEFT JOIN orders_detail 
                              ON orders.order_id = orders_detail.order_id
                              LEFT JOIN products
                              ON products.pd_id = orders_detail.pd_id
                              LEFT JOIN users
                              ON users.id = orders.customer_id
                              WHERE seller_id = :seller_id
                              ");
            $this->db->bind(":seller_id", $_SESSION['user_id']);
            $row = $this->db->resultSet();
            return $row;
        }


    }