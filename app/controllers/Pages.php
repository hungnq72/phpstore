<?php
  class Pages extends Controller {
    public function __construct(){
      $this->pageModel = $this->model('Page');
      $this->productModel = $this->model('Product');
    }
    
    public function temp(){
        redirect('pages/index');
    }

    public function index(){
      $products = $this->productModel->getProducts();
      $data = [
        'products' => $products
      ];
      $this->view('pages/index', $data);
    }

    public function search(){
      if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $str = $_POST['search'];
        $products = $this->productModel->searchProducts($str);
        $data = [
          'search' => trim($_POST['search']),
          'products' => $products
        ];
        $this->view('pages/search', $data);
      }


 
    }

    public function contact(){
      if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        $data = [
          'email' => trim($_POST['email']),
          'msg' => trim($_POST['msg']),
          'email_err' => '',
          'msg_err' => ''
        ];

        if(empty($data['email'])){
          $data['email_err'] = 'Vui lòng nhập email';
        }
        if(empty($data['msg'])){
          $data['msg_err'] = 'Vui lòng nhập lời nhắn';
        }
        if(empty($data['email_err']) && empty($data['msg_err'])){
          if($this->pageModel->sendMsg($data)){
            flash('send_success','phản hồi thành công');
            redirect('pages/contact');
          }else{
            die("something went wrong");
          }
        }else{
          $this->view('pages/contact', $data);
        }
        
      }else{
        $data = [
          'email' => '',
          'msg' => ''
        ];
        $this->view('pages/contact', $data);

      }
    }

    public function show($id){
      $this->view("pages/show");
    }
    
  }