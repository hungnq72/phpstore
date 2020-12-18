<?php require APPROOT . '/views/inc/header.php'; ?>
<div class="container">
    <div class="row">
        <?php foreach ($data['products'] as $product) : ?>
            <div class="col-md-3">
                <div class="card" style="margin-bottom: 10px;">
                    <img class="card-img-top" src="<?php echo URLROOT; ?> /public/img/<?php echo $product->pd_image; ?>" alt="">
                    <div class="card-body">
                        <h4 class="card-title"><?php echo $product->pd_name; ?></h4>
                        <p class="card-text"><?php echo $product->pd_price; ?><sub>vnđ</sub></p>
                        <p class="card-text"><?php echo substr($product->pd_description, 0, 100); ?></p>
                        <a class="btn btn-success btn-block" href="#">Thêm</a>
                        <a class="btn btn-success btn-block" href="#">Mua ngay</a>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
      <?php echo $data['search']; ?>
        <?php 
            foreach($data["products"] as $product){
                echo $product->pd_name;
            }
        ?>
    </div>
</div>
<?php require APPROOT . '/views/inc/footer.php'; ?>