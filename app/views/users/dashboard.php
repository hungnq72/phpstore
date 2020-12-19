<?php require APPROOT . '/views/inc/header.php'; ?>
<div class="container">
    <!-- POSTS -->
    <section id="posts">
        <div class="container">
            <div class="row">
                <div class="col-md-3" style='margin-bottom: 10px;'>
                    <a href="<?php echo URLROOT; ?>/products/add" class="btn btn-primary btn-block">
                        <i class="fas fa-plus"></i> Thêm sản phẩm
                    </a>
                </div>
                <div class="col-md-3" style='margin-bottom: 10px;'>
                    <a href="<?php echo URLROOT; ?>/orders/index" class="btn btn-primary btn-block">Đơn hàng chờ</a>
                </div>
                <div class="col-md-3" style='margin-bottom: 10px;'>
                    <a href="<?php echo URLROOT; ?>/orders/confirmed" class="btn btn-primary btn-block">Đơn hàng đã xác nhận</a>
                </div>
            </div>
        </div>
        
            
        <?php flash("delete_success"); ?>
        <?php flash("update_success"); ?>
        <div class="container">
            <div class="card">
                <div class="card-header">
                    <h4>Toàn bộ sản phẩm</h4>
                </div>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Tên sản phẩm</th>
                            <th>Người bán</th>
                            <th>Loại sản phẩm</th>
                            <th>Giá</th>
                            <th>Số lượng</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($data['products'] as $product) : ?>
                            <tr>
                                <td><?php echo $product->pd_name; ?></td>
                                <td><?php echo $product->name; ?></td>
                                <td><?php echo $product->cat_name; ?></td>
                                <td><?php echo $product->pd_price; ?></td>
                                <td><?php echo $product->pd_quantity; ?></td>
                                <td>
                                    <a href="<?php echo URLROOT; ?>/products/detail/<?php echo $product->pd_id; ?>" class="btn btn-secondary">
                                        <i class="fas fa-angle-double-right"></i> Chi tiết
                                    </a>
                                </td>
                            </tr>
                        <?php endforeach; ?>

                    </tbody>
                </table>
            </div>

        </div>
    </section>

</div>
<?php require APPROOT . '/views/inc/footer.php'; ?>