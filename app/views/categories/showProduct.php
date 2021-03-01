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