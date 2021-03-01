<?php require APPROOT . '/views/inc/header.php'; ?>
<div class="container">
    <!-- POSTS -->
    <section id="posts">
        <div class="row">
            <div class="col-8">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Sản phẩm</th>
                            <th>Giá</th>
                            <th>Số lượng</th>
                            <th>Xóa</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($data['carts'] as $cart) : ?>
                            <tr>
                                <td>
                                    <img width="100px" src="<?php echo URLROOT; ?>/public/img/<?php echo $cart->pd_image; ?>" alt="">
                                    <?php echo $cart->pd_name; ?>
                                </td>
                                <td><?php echo $cart->pd_price; ?>đ</td>
                                <form action="<?php echo URLROOT; ?>/carts/updateQuantity/<?php echo $cart->cart_id; ?>" method="post">
                                    <td>
                                        <input value="<?php echo $cart->cart_quantity; ?>" class="form-control" min="1" type="number" name="cart_quantity">
                                        <input type="submit" style="display: none;">
                                    </td>
                                </form>
                                <td><a href="<?php echo URLROOT; ?>/carts/delete/<?php echo $cart->cart_id; ?>">Xóa</a></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
            <div class="col-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Đặt hàng</h5>
                        <p class="card-text">Tổng sản phẩm: <?php echo $data['total']->total; ?>đ</p>
                        <p class="card-text">Phí giao hàng: 30000đ </p>
                        <p class="card-text">Tổng tiền: <?php echo $data['total']->total + 30000; ?>đ</p>
                        <a class="btn btn-success btn-block" href="#" data-toggle="modal" data-target="#order">Đặt hàng</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="modal" id="order">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Xác nhận đặt hàng</h5>
                    <button class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <form action="<?php echo URLROOT; ?>/orders/add" method="post">
                        <div class="form-group">
                            <label for="order_detail_address"><h6>Địa chỉ giao hàng:</h6> </label>
                            <input name="order_detail_address" value="<?php echo $cart->address; ?>" type="text" class="form-control">
                        </div>
                        <h6 style="margin-bottom: 20px;">Chi tiết đơn hàng:</h6>
                        <?php foreach ($data['carts'] as $cart) : ?>
                            <p><?php echo $cart->pd_name; ?> x<?php echo $cart->cart_quantity; ?>: <?php foreach ($data['total_cart'] as $total){echo $total->total_cart;break;} ?>đ</p>
                        <?php endforeach; ?>
                        <p>Phí giao hàng: 30000đ</p>
                        <h6>Tổng tiền: <?php echo $data['total']->total + 30000; ?>đ</h6>  
                        <span>
                            <input type="submit" class="btn btn-primary" value='Xác nhận đặt hàng'>
                            <a href="<?php echo URLROOT; ?>/carts/pay" class="btn btn-primary">Thanh toán</a>
                        </span>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php require APPROOT . '/views/inc/footer.php'; ?>