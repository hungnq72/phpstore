<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/public/css/styles.css">
    <title><?php echo SITENAME; ?></title>
</head>

<body>
    <form id="checkOrder" action="" method="post">
        <div class="card" style="width: 2000px;">
            <div class="card-header" style="width: 2000px;">
                <h4>Đơn hàng đã xác nhận</h4>
            </div>
            <table class="table table-hover" style="width: 2000px;">
                <thead>
                    <tr>
                        <th></th>
                        <th>Tên sản phẩm</th>
                        <th>Đơn giá</th>
                        <th>Kho</th>
                        <th>Số lượng</th>
                        <th>Tổng tiền</th>
                        <th>Người mua</th>
                        <th>Địa chỉ giao hàng</th>
                        <th>Trạng thái</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($data['orders'] as $order) : ?>
                        <tr>
                            <td><input type="checkbox" name="orders[]" value="<?php echo $order->order_detail_id; ?>"></td>
                            <td><?php echo $order->pd_name; ?></td>
                            <td><?php echo $order->pd_price; ?></td>
                            <td><?php echo $order->pd_quantity; ?></td>
                            <td><?php echo $order->order_quantity; ?></td>
                            <td><?php echo $order->order_detail_total_cart; ?></td>
                            <td><?php echo $order->name; ?></td>
                            <td><?php echo $order->order_detail_address; ?></td>
                            <td><?php echo ($order->stt == 1) ? 'đã nhận hàng' : 'chưa nhận hàng' ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        <div class="row" style="margin-top: 10px;">
            <div class="col-md-2">
                <input type="button" onclick="submitForm('<?php echo URLROOT; ?>/orders/cancel')" value="Hủy đơn" class="btn btn-primary btn-block">
            </div>
        </div>
    </form>

    
    <?php require APPROOT . '/views/inc/footer.php'; ?>

    <script type="text/javascript">
        function submitForm(action) {
            var form = document.getElementById('checkOrder');
            form.action = action;
            form.submit();
        }
    </script>