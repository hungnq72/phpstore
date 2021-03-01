<?php
    class Orders extends Controller{
        public function __construct(){
            $this->productModel = $this->model('Product');
            $this->cartModel = $this->model('Cart');
            $this->orderModel = $this->model('Order');
        }

        public function add(){
            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                // add infor into order
                if($this->orderModel->add()){  
                    
                }else{
                    echo "something went wrong";
                }

                // add infor into order_detail
                $carts = $this->cartModel->show();
                $orderID = $this->orderModel->getOrderID(); 
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
                $total = $this->cartModel->showTotal();
                //$totalCart = $this->cartModel->showTotalCart();
                foreach($carts as $cart){
                    // (int): convert to int cuz the data fetch from cart is string
                    // $total->total: fetch object in total
                    $data = [
                        'order_id' => $orderID->order_id,
                        's_id' => (int)$cart->s_id,
                        'pd_id' => (int)$cart->pd_id,
                        'order_quantity' => (int)$cart->cart_quantity,
                        'order_detail_address' => trim($_POST['order_detail_address']),
                        'order_detail_total' => $total->total,
                        'order_detail_total_cart' => (int)$cart->total_cart,
                        'seller_id' => (int)$cart->user_id
                    ];
                    
                    if($this->orderModel->addOrderDetail($data)){   
                        flash("addOrder_success", "Đặt hàng thành công, vui lòng chờ thông báo xác nhận đơn hàng");
                        redirect("pages/index/1");
                    }else{
                        echo "something went wrong";
                    }
                }

                // remove cart
                $sid = $this->orderModel->getSID();
                if($this->cartModel->deleteAll($sid->s_id)){}
            }
        }

        public function show(){
            $orders = $this->orderModel->getOrder();
            $data = [
                "orders" => $orders
            ];
            $this->view('orders/show', $data);
        }

        public function index(){
            $orders = $this->orderModel->getOrder();
            $data = [
                "orders" => $orders
            ];
            $this->view('orders/index', $data);
        }

        public function cancel(){
            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                $ids = $_POST['orders'];
                foreach($ids as $id){
                    if($this->orderModel->cancelOrder($id)){
                        echo "success";
                    }
                    
                }
            }
        }

        public function confirm(){
            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                $ids = $_POST['orders'];
                foreach($ids as $id){
                    if($this->orderModel->confirmOrder($id)){
                        echo "success";
                    }     
                }
            }
        }

        public function Confirmed(){
            $orders = $this->orderModel->getOrderConfirmed();
            $data = [
                "orders" => $orders
            ];
            $this->view('orders/confirmed', $data);
        }

        public function showConfirmed(){
            $orders = $this->orderModel->getOrderConfirmed();
            $data = [
                "orders" => $orders
            ];
            $this->view('orders/showConfirmed', $data);
        }
    }