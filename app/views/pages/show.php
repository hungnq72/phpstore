<?php require APPROOT . '/views/inc/header.php'; ?>
<div class="container">
    <div class="row">
        <?php foreach ($data['products'] as $product) : ?>
            <div class="col-md-3">
                <div class="card" style="margin-bottom: 10px;">
                    <div style="height: 180px;">
                        <a href="pages/show/<?php echo $product->pd_id; ?>"><img style="" class="card-img-top" src="<?php echo URLROOT; ?> /public/img/<?php echo $product->pd_image; ?>" alt=""></a>
                    </div>
                    <div class="card-body">
                        <h4 class="card-title"><?php echo $product->pd_name; ?></h4>
                        <p class="card-text"><?php echo $product->pd_price; ?><sub>vnđ</sub></p>
                        <a class="btn btn-success btn-block" href="#">Thêm</a>
                        <a class="btn btn-success btn-block" href="#">Mua ngay</a>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>
<?php require APPROOT . '/views/inc/footer.php'; ?>