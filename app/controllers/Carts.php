<?php
    class Carts extends Controller{
        public function __construct(){
            $this->productModel = $this->model('Product');
            $this->cartModel = $this->model('Cart');           
        }

        public function add($id){
            $data = [
                'pd_id' => $id,
                'cart_quantity' => 1 
            ];
            if($this->cartModel->add($data)){
                flash('addToCart_success', 'Thêm vào giỏ hàng thành công');
                redirect('pages/index');
            }else{
                die("something went wrong");
            }
          
        }

        public function buy($id){
            $data = [
                'pd_id' => $id,
                'cart_quantity' => 1 
            ];
            if($this->cartModel->add($data)){
                redirect('carts/show');
            }else{
                die("something went wrong");
            }
        }

        public function show(){
            $carts = $this->cartModel->show();

            // show total money
            $total = $this->cartModel->showTotal();

            // show total money for each product
            $total_cart = $this->cartModel->showTotalCart();
            $data = [
                // 's_id' => $_SESSION['user_id'],
                'carts' => $carts,
                'total' => $total,
                'total_cart' => $total_cart
            ];
            $this->view('carts/show', $data);
        }

        public function updateQuantity($id){
            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                $data = [
                    'cart_quantity' => $_POST['cart_quantity'],
                    'cart_id' => $id
                ];
                if($this->cartModel->update($data)){
                    redirect("carts/show");
                }
            }
        }

        public function delete($id){
            if($this->cartModel->delete($id)){
                redirect("carts/show");
            }else{
                die("something went wrong");
            }
        }
    }