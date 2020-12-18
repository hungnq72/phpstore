<?php require APPROOT . '/views/inc/header.php'; ?>
<div class="container">
    <form id="checkOrder" action="" method="post">
        <div class="card">
            <div class="card-header">
                <h4>Toàn bộ đơn hàng</h4>
            </div>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th></th>
                        <th>Tên sản phẩm</th>
                        <th>Đơn giá</th>
                        <th>Kho</th>
                        <th>Số lượng</th>
                        <th>Tổng tiền</th>
                    </tr>
                </thead>
                <tbody>

                    <?php foreach ($data['orders'] as $order) : ?>
                        <tr>
                            <td><input type="checkbox" name="orders[]" value="<?php $order->order_id; ?>"></td>
                            <td><?php echo $order->pd_name; ?></td>
                            <td><?php echo $order->pd_price; ?></td>
                            <td><?php echo $order->pd_quantity; ?></td>
                            <td><?php echo $order->order_quantity; ?></td>
                            <td><?php echo $order->order_detail_total_cart; ?></td>
                        </tr>

                    <?php endforeach; ?>


                </tbody>
            </table>
        </div>
        <div class="row" style="margin-top: 10px;">
            <div class="col-md-2">
                <input type="button" onclick="submitForm('')" value="Chốt đơn" class="btn btn-primary btn-block">          
            </div>
            <div class="col-md-2">
                <input type="button" onclick="submitForm('<?php echo URLROOT; ?>/orders/cancel')" value="Hủy đơn" class="btn btn-primary btn-block">          
            </div>

        </div>

    </form>
</div>
<?php require APPROOT . '/views/inc/footer.php'; ?>

<script type="text/javascript">
  function submitForm(action) {
    var form = document.getElementById('checkOrder');
    form.action = action;
    form.submit();
  }
</script>