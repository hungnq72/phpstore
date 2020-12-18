<?php
    class Users extends Controller{
        public function __construct(){
            $this->userModel = $this->model('User');
            $this->productModel = $this->model('Product');

        }

        public function dashboard(){
            $products = $this->productModel->getProductsByUserID($_SESSION['user_id']);
            $data = [
                'products' => $products
            ];
            $this->view('users/dashboard', $data);
        }

        public function register(){
            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
                $data = [
                    'name' => trim($_POST['name']),
                    'email' => trim($_POST['email']),
                    'username' => trim($_POST['username']),
                    'password' => trim($_POST['password']),
                    'confirm_password' => trim($_POST['confirm_password']),
                    'address' => trim($_POST['address']),
                    'name_err' => '',
                    'email_err' => '',
                    'username_err' => '', 
                    'password_err' => '',
                    'confirm_password_err' => '', 
                    'address_err' => ''
                ];
                if(empty($data['name'])){
                    $data['name_err'] = 'Vui lòng nhập tên';
                }
                if(empty($data['email'])){
                    $data['email_err'] = 'Vui lòng nhập email';
                }else{
                    if($this->userModel->findUserByEmail($data['email'])){
                        $data['email_err'] = 'email đã được sử dụng';
                    }
                }
                if(empty($data['username'])){
                    $data['username_err'] = 'Vui lòng nhập tên đăng nhập';
                }else{
                    if($this->userModel->findUserByUsername($data['username'])){
                        return $data['username_err'] = 'username đã được sử dụng';
                    }
                }
                if(empty($data['password'])){
                    $data['password_err'] = 'Vui lòng nhập mật khẩu';
                }
                if(empty($data['confirm_password'])){
                    $data['confirm_password_err'] = 'Vui lòng xác nhận mật khẩu';
                }else{
                    if($data['password'] != $data['confirm_password']){
                        $data['confirm_password_err'] = 'Xác nhận mật khẩu không đúng';
                    }
                }
                if(empty($data['address'])){
                    $data['address_err'] = 'Vui lòng nhập địa chỉ';
                }
                
                if(empty($data['name_err']) && empty($data['email_err']) && empty($data['username_err']) && empty($data['password_err']) && empty($data['confirm_password_err']) && empty($data['address_err'])){
                    $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);
                    if($this->userModel->register($data)){
                        flash("register_success", "Đăng ký thành công, đăng nhập:");
                        redirect("users/login");
                    }else{
                        die("something went wrong");
                    }
                }else{
                    $this->view('users/register', $data);
                }

            }else{
                $data = [
                    'name' => '',
                    'email' => '',
                    'username' => '', 
                    'password' => '',
                    'confirm_password' => '', 
                    'address' => '', 
                    'name_err' => '',
                    'email_err' => '',
                    'username_err' => '', 
                    'password_err' => '',
                    'confirm_password_err' => '', 
                    'address_err' => '' 
                ];
                $this->view('users/register', $data);
            }
            
        }

        public function login(){
            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
                $data = [
                    'username' => trim($_POST['username']),
                    'password' => trim($_POST['password']),
                    'username_err' => '',
                    'password_err' => ''
                ];
                if(empty($data['username'])){
                    $data['username_err'] = 'Vui lòng nhập tên đăng nhập';
                }

                if($this->userModel->findUserByUsername($data['username'])){

                }else{
                    $data['username_err'] = 'Sai tên đăng nhập';
                }

                if(empty($data['password'])){
                    $data['password_err'] = 'Vui lòng nhập mật khẩu';
                }

                if(empty($data['username_err']) && empty($data['password_err'])){
                    $loggedInUser = $this->userModel->login($data);
                    if($loggedInUser){
                        $this->createUserSession($loggedInUser);
                    }else{
                        $data['password_err'] = 'Sai mật khẩu';
                        $this->view('users/login', $data);
                    }
                }else{
                    $this->view('users/login', $data);
                }
            }else{
                $data = [
                    'username' => '',
                    'password' => '',
                    'username_err' => '',
                    'password_err' => ''
                ];
                $this->view('users/login');
            }
        }

        public function createUserSession($user){
            $_SESSION['user_id'] = $user->id;
            $_SESSION['user_name'] = $user->name;
            $_SESSION['user_email'] = $user->email;
            $_SESSION['user_address'] = $user->address;
            redirect('pages');
        }

        public function logout(){
            unset($_SESSION['user_id']);
            unset($_SESSION['user_name']);
            unset($_SESSION['user_email']);
            unset($_SESSION['user_address']);
            session_destroy();
            redirect('users/login');
        }
    }