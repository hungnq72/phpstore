<?php
    // using session to add product to cart
    class Carts extends Controller{
        public function __construct(){
            $this->productModel = $this->model('Product');
        }

        public function add($id){
            $product = $this->productModel->getProductByID($id);
            if(isset($_SESSION['cart'])){
                $count = count($_SESSION['cart']);
                $_SESSION['cart'][$count] = array('item_id' => $id, 'item_name' => $product->pd_name, 'item_price' => $product->pd_price);
            }else{
                $_SESSION['cart'][0] = array('item_id' => $id, 'item_name' => $product->pd_name, 'item_price' => $product->pd_price);
            }
            $data = [
                'cart' => $_SESSION['cart']
            ];
            $this->view('carts/add',$data);
        }
    }
?>

<?php require APPROOT . '/views/inc/header.php'; ?>
<div class="container">
    <div class="row">
        <?php foreach ($data['products'] as $product) : ?>
            <div class="col-md-3">
                <div class="card" style="margin-bottom: 10px;">
                    <div style="height: 180px;">
                        <a href="<?php echo URLROOT; ?>/pages/show/<?php echo $product->pd_id; ?>"><img class="card-img-top" src="<?php echo URLROOT; ?> /public/img/<?php echo $product->pd_image; ?>" alt=""></a>
                    </div>
                    <div class="card-body">
                        <h4 class="card-title"><?php echo $product->pd_name; ?></h4>
                        <p class="card-text"><?php echo $product->pd_price; ?><sub>vnđ</sub></p>
                        <a class="btn btn-success btn-block" href="<?php echo URLROOT; ?>/carts/add/<?php echo $product->pd_id; ?>">Thêm</a>
                        <a class="btn btn-success btn-block" href="#">Mua ngay</a>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>
<?php require APPROOT . '/views/inc/footer.php'; ?>