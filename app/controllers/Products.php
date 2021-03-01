<?php
    class Products extends Controller{
        public function __construct(){
            $this->productModel = $this->model('Product');
            $this->categoryModel = $this->model('Category');
        }

        public function add(){
            if($_SERVER['REQUEST_METHOD'] == 'POST'){

                $image = $_FILES['pd_image']['name'];   // $image không được trùng với tên trong $_FILES[]
                $image_temp = $_FILES['pd_image']['tmp_name'];
                move_uploaded_file($image_temp, 'D:\Study\xampp\htdocs\php\phpstore\public\img\\' . $image);

                $cat_id = $this->categoryModel->getCategories();
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
                $data = [
                    'user_id' => $_SESSION['user_id'],
                    'pd_name' => trim($_POST['pd_name']),
                    'cat_id' => $cat_id,    // cat id gửi đến view
                    'catID' => trim($_POST['cat_id']),  // cat id nhận từ view
                    'pd_price' => trim($_POST['pd_price']),
                    'pd_quantity' => trim($_POST['pd_quantity']),
                    'pd_image' => $image,
    
                    'pd_description' => trim($_POST['pd_description']),
                 
                    'pd_name_err' => '',
                    'cat_id_err' => '',
                    'pd_price_err' => '',
                    'pd_quantity_err' => '',
                    'pd_image_err' => '',
                    'pd_description_err' => '',           
                ];

                if(empty($data['pd_name'])){
                    $data['pd_name_err'] = 'Vui lòng nhập tên mặt hàng';
                }
                if(empty($data['pd_price'])){
                    $data['pd_price_err'] = 'Vui lòng nhập giá tiền';
                }
                if(empty($data['pd_quantity'])){
                    $data['pd_quantity_err'] = 'Vui lòng nhập số lượng';
                }
                if(empty($data['pd_image'])){
                    $data['pd_image_err'] = 'Vui lòng chọn ảnh';
                }
                if(empty($data['pd_description'])){
                    $data['pd_description_err'] = 'Vui lòng nhập miêu tả';
                }

                if(empty($data['pd_name_err']) && empty($data['pd_price_err']) && empty($data['pd_quantity_err']) && empty($data['pd_image_err']) && empty($data['pd_description_err'])){
                    if($this->productModel->addProduct($data)){
                  
                        flash("add_success","Thêm hàng thành công");
                        redirect("products/add");
                    }else{
                        die("something went wrong");
                    }
                }else{
                    $this->view("products/add", $data);
                }
                
            }else{
                $cat_id = $this->categoryModel->getCategories();
                $data = [
                    'pd_name' => '',
                    'cat_id' => $cat_id,
                    'pd_price' => '',
                    'pd_quantity' => '',
                    'pd_image' => '',
                    'pd_description' => '', 

                    'pd_name_err' => '',
                    'cat_id_err' => '',
                    'pd_price_err' => '',
                    'pd_quantity_err' => '',
                    'pd_image_err' => '',
                    'pd_description_err' => ''
                ];

                $this->view('products/add', $data);
            }
        }

        public function edit($id){
            if($_SERVER['REQUEST_METHOD'] == 'POST'){

                $image = $_FILES['pd_image']['name'];   // $image không được trùng với tên trong $_FILES[]
                $image_temp = $_FILES['pd_image']['tmp_name'];
                move_uploaded_file($image_temp, 'D:\Study\xampp\htdocs\php\phpstore\public\img\\' . $image);

                $cat_id = $this->categoryModel->getCategories();
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
                $data = [
                    'pd_id' => $id,
                    'user_id' => $_SESSION['user_id'],
                    'pd_name' => trim($_POST['pd_name']),
                    'cat_id' => $cat_id,    // cat id gửi đến view
                    'catID' => trim($_POST['cat_id']),  // cat id nhận từ view
                    'pd_price' => trim($_POST['pd_price']),
                    'pd_quantity' => trim($_POST['pd_quantity']),
                    'pd_image' => $image,
                    'pd_description' => trim($_POST['pd_description']),
                 
                    'pd_name_err' => '',
                    'cat_id_err' => '',
                    'pd_price_err' => '',
                    'pd_quantity_err' => '',
                    'pd_image_err' => '',
                    'pd_description_err' => ''           
                ];

                if(empty($image)){
                    $product = $this->productModel->getProductByID($id);
                    $data['pd_image'] = $product->pd_image;
                }

                if(empty($data['pd_name'])){
                    $data['pd_name_err'] = 'Vui lòng nhập tên mặt hàng';
                }
                if(empty($data['pd_price'])){
                    $data['pd_price_err'] = 'Vui lòng nhập giá tiền';
                }
                if(empty($data['pd_quantity'])){
                    $data['pd_quantity_err'] = 'Vui lòng nhập số lượng';
                }
                
                if(empty($data['pd_description'])){
                    $data['pd_description_err'] = 'Vui lòng nhập miêu tả';
                }

                if(empty($data['pd_name_err']) && empty($data['pd_price_err']) && empty($data['pd_quantity_err']) && empty($data['pd_description_err'])){
                    if($this->productModel->updateProduct($data)){                  
                        flash("update_success","Sửa thành công");
                        redirect("users/dashboard");
                    }else{
                        die("something went wrong");
                    }
                }else{
                    $this->view("products/detail", $data);
                }
                
            }else{
                $cat_id = $this->categoryModel->getCategories();
                $product = $this->productModel->getProductByID($id);

                $data = [
                    'pd_name' => $product->pd_name,
                    'cat_id' => $cat_id,
                    'pd_price' => $product->pd_price,
                    'pd_quantity' => $product->pd_quantity,
                    'pd_image' => $product->pd_image,
                    'pd_description' => $product->pd_description, 

                    'pd_name_err' => '',
                    'cat_id_err' => '',
                    'pd_price_err' => '',
                    'pd_quantity_err' => '',
                    'pd_image_err' => '',
                    'pd_description_err' => ''
                ];
                $this->view('products/detail', $data);
            }
        }

        public function delete($id){

            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                $post = $this->productModel->getProductByID($id);
                if($post->user_id != $_SESSION['user_id']){
                    redirect("users/dashboard");
                }
                if($this->productModel->deleteProduct($id)){
                    flash("delete_success", "Xóa mặt hàng thành công");
                    redirect("users/dashboard");
                }else{
                    die("something went wrong");
                }
            }else{
                redirect("users/dashboard");
            }
        }

        public function detail($id){
            $product = $this->productModel->getProductByID($id);
            $cat_id = $this->categoryModel->getCategories();
            $data = [
                'product' => $product,
                'cat_id' => $cat_id,
                'pd_name_err' => '',
                'cat_id_err' => '',
                'pd_price_err' => '',
                'pd_quantity_err' => '',
                'pd_image_err' => '',
                'pd_description_err' => ''
            ];
           
            $this->view('products/detail', $data);
        }

        public function showProductByCat($id){
            $data = [
                'cat_id' => $id
            ];
            $products = $this->productModel->getProductByCategoryID($data);
            $data = [
                'products' => $products
            ];
            $this->view('categories/showProduct', $data);
        }

        public function showProductBySearchBar($string){
            $data = [
                'pd_name' => $string
            ];
            $products = $this->productModel->getProductBySearchBar($data);
            $data = [
                'products' => $products
            ];
            $this->view('categories/showProduct', $data);
        }
    }