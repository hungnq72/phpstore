<?php
    class Admins extends Controller{
        public function __construct(){
            $this->productModel = $this->model('Product');
        }

        public function dashboard(){
            $products = $this->productModel->getProducts();
            $data = [
                'products' => $products
            ];
            $this->view('admins/dashboard', $data);
        }
    }