<?php require APPROOT . '/views/inc/header.php'; ?>

<div class="container bg-light">
    <div class="row" style="padding-top: 14px;">
        <div class="col-md-5">
            <img src="<?php echo URLROOT; ?> /public/img/<?php echo $data['product']->pd_image; ?>" alt="" width="500px">
        </div>
        <div class="col" style="margin-left: 50px;">
            <h3><?php echo $data['product']->pd_name; ?></h3>
            <h1 style="color: #ee4d2d;"><?php echo $data['product']->pd_price; ?>đ</h1>
            <?php if($_SESSION['user_id'] != $data['product']->user_id): ?>
                <div class="row">
                    <div class="col">
                        <a class="btn btn-success btn-block" href="<?php if(!empty($_SESSION['user_id'])) : echo URLROOT; ?>/carts/add/<?php echo $data['product']->pd_id; else: echo URLROOT . '/users/login'; endif;?>">Thêm</a>
                    </div>
                    <div class="col">
                        <a class="btn btn-success btn-block" href="<?php if(!empty($_SESSION['user_id'])) : echo URLROOT; ?>/carts/buy/<?php echo $data['product']->pd_id; else: echo URLROOT . '/users/login'; endif;?>">Mua ngay</a>
                    </div>
                </div>
            <?php endif; ?>

            <?php if($_SESSION['user_id'] == $data['product']->user_id): ?>
                <a class="btn btn-success btn-block" href="<?php if(!empty($_SESSION['user_id'])) : echo URLROOT; ?>/products/detail/<?php echo $data['product']->pd_id; else: echo URLROOT . '/users/login'; endif;?>">Cập nhật sản phẩm</a>
            <?php endif; ?>
        </div>
    </div>
    <br>
    <div style="background-color: white; padding:20px">
        <h4>CHI TIẾT SẢN PHẨM</h4>
        <p>Danh mục: <?php echo $data['product']->cat_name; ?></p>
        <p>Kho hàng: <?php echo $data['product']->pd_quantity; ?></p>
        <p>Người bán: <?php echo $data['product']->name; ?></p>
    </div>
    <br>
    <div style="background-color: white; padding:20px">
        <h4>MÔ TẢ SẢN PHẨM</h4>
        <?php echo $data['product']->pd_description; ?>
    </div>

    
</div>

<?php require APPROOT . '/views/inc/footer.php'; ?>
