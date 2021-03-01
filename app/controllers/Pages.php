<?php
  class Pages extends Controller {
    public function __construct(){
      $this->pageModel = $this->model('Page');
      $this->productModel = $this->model('Product');
      $this->catModel = $this->model('Category');
    }
    
    public function temp(){
        redirect('pages/index/1');
    }

    public function pagination(){
      
    }

    public function index($id){
      // pagination
      if($id == 1){
        $pg = 0;
      }else{
        $pg = ($id * 40) - 40;
      }

      $count = $this->productModel->countProduct();
      $page = ceil($count->counting/40);

      // show products
      $products = $this->productModel->getProductsWithLimited($pg, 40);

      // show categories
      $categories = $this->catModel->getCategories();
      $data = [
        'products' => $products,
        'categories' => $categories,
        'page' => $page,
        'currentPage' => $id
      ];
      $this->view('pages/index', $data);
    }

    public function product($id){
      $product = $this->productModel->getProductByID($id);
      $data = [
        'product'=>$product
      ];
      $this->view('pages/product', $data);
    }

    public function search(){
      if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $str = trim($_POST['search']);
        if($products = $this->productModel->searchProducts($str)){

        }
        $data = [
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

    public function categories($id){
      $data = [
        'cat_id' => $id
      ];
      $products = $this->productModel->getAllProductByCategoryID($data);
      $data = [
        'products' => $products
      ];
      $this->view('pages/categories', $data);
    }
    
  }