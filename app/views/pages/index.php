<?php require APPROOT . '/views/inc/header.php'; ?>
<div class="container">
    <?php flash('addToCart_success'); ?>
    <?php flash('addOrder_success'); ?>

    <div class="row">
        <div class="col-md-3">
            <div class="list-group">
                <h5 class="list-group-item list-group-item-action active">Danh mục</h5>
                <?php foreach($data['categories'] as $category) : ?>
                    <a href="<?php echo URLROOT; ?>/pages/categories/<?php echo $category->cat_id; ?>" class="list-group-item list-group-item-action"><?php echo $category->cat_name; ?></a>
                <?php endforeach; ?>
            </div>
        </div>
        <div class="col-md-9">
            <div id="slider4" class="carousel slide mb-5" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li class="active" data-target="#slider4" data-slide-to="0"></li>
                    <li data-target="#slider4" data-slide-to="1"></li>
                    <li data-target="#slider4" data-slide-to="2"></li>
                </ol>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img class="d-block img-fluid" src="<?php echo URLROOT; ?> /public/img/loai-qua-hiem-da-ran.jpg" alt="First Slide" width="100%" style="max-height:400px">
                        <div class="carousel-caption d-none d-md-block">
                            <h3>Quả da rắn</h3>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img class="d-block img-fluid" src="<?php echo URLROOT; ?> /public/img/loai-qua-hiem-mang-cau-xiem.jpg" alt="Second Slide" width="100%" style="max-height:400px">
                        <div class="carousel-caption d-none d-md-block">
                            <h3>Mãng cầu xiêm</h3>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img class="d-block img-fluid" src="<?php echo URLROOT; ?> /public/img/loai-qua-hiem-mang-cut.jpg" alt="Third Slide" width="100%" style="max-height:400px">
                        <div class="carousel-caption d-none d-md-block">
                            <h3>quả măng cụt</h3>
                        </div>
                    </div>
                </div>

                <!-- CONTROLS -->
                <a href="#slider4" class="carousel-control-prev" data-slide="prev">
                    <span class="carousel-control-prev-icon"></span>
                </a>

                <a href="#slider4" class="carousel-control-next" data-slide="next">
                    <span class="carousel-control-next-icon"></span>
                </a>
            </div>
        </div>
    </div>
    <div class="row">
        <?php foreach ($data['products'] as $product) : ?>
            <div class="col-md-3">
                <div class="card" style="margin-bottom: 10px;">
                    <div style="height: 180px;">
                        <a href="<?php echo URLROOT; ?>/pages/product/<?php echo $product->pd_id; ?>"><img class="card-img-top" src="<?php echo URLROOT; ?> /public/img/<?php echo $product->pd_image; ?>" alt=""></a>
                    </div>
                    <div class="card-body">
                        <h4 class="card-title"><?php echo $product->pd_name; ?></h4>
                        <p class="card-text"><?php echo $product->pd_price; ?><sub>vnđ</sub></p>
                        <a class="btn btn-success btn-block" href="<?php if(!empty($_SESSION['user_id'])) : echo URLROOT; ?>/carts/add/<?php echo $product->pd_id; else: echo URLROOT . '/users/login'; endif;?>">Thêm</a>
                        <a class="btn btn-success btn-block" href="<?php if(!empty($_SESSION['user_id'])) : echo URLROOT; ?>/carts/buy/<?php echo $product->pd_id; else: echo URLROOT . '/users/login'; endif;?>">Mua ngay</a>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
    <nav aria-label="Page navigation example">
        <ul class="pagination">
            <li class="page-item"><a class="page-link" href="<?php echo URLROOT; ?>/pages/index/<?php echo $data['currentPage'] - 1; ?>">Previous</a></li>
            <?php for ($i = 1; $i <= $data['page']; $i++) : ?>
                <li class="page-item"><a class="page-link" href="<?php echo URLROOT; ?>/pages/index/<?php echo $i; ?>"><?php echo $i; ?></a></li>
            <?php endfor; ?>
            <li class="page-item"><a class="page-link" href="<?php echo URLROOT; ?>/pages/index/<?php echo $data['currentPage'] + 1; ?>">Next</a></li>
        </ul>
    </nav>
</div>
<?php require APPROOT . '/views/inc/footer.php'; ?>