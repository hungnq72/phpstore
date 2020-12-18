<?php require APPROOT . '/views/inc/header.php'; ?>

<div class="container">
    <div class="row">
        <div class="col-md-3">
            <a href="<?php echo URLROOT; ?>/users/dashboard" class="btn btn-light btn-block">
                <i class="fas fa-arrow-left"></i> Trở về
            </a>
        </div>
        
        <form action="<?php echo URLROOT; ?>/products/delete/<?php echo $data['product']->pd_id; ?>" method="post">
            <input type="submit" class="btn btn-danger btn-block" value="Xóa sản phẩm">
        </form>
    </div>
    <div class="card card-body bg-light mt-5">
        <?php flash("add_success"); ?>
        <h2>Thêm hàng</h2>
        <form action="<?php echo URLROOT; ?>/products/edit/<?php echo $data['product']->pd_id; ?>" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="pd_name">Tên mặt hàng: </label>
                <input value="<?php echo $data['product']->pd_name; ?>" type="text" name="pd_name" class="form-control form-control-lg <?php echo (!empty($data['pd_name_err'])) ? 'is-invalid' : '' ?> ">
                <span class="invalid-feepdack"><?php echo $data['pd_name_err']; ?></span>
            </div>
            <div class="form-group">
                <label for="cat_id">Loại hàng: </label><br>
                <select name="cat_id" id="" class="custom-select custom-select-sm">
                    <?php foreach ($data['cat_id'] as $cat) : ?>
                        <option value="<?php echo $cat->cat_id; ?>"><?php echo $cat->cat_name; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="form-group">
                <label for="pd_price">Giá tiền: </label>
                <input value="<?php echo $data['product']->pd_price; ?>" type="number" name="pd_price" class="form-control form-control-lg <?php echo (!empty($data['pd_price_err'])) ? 'is-invalid' : '' ?> ">
                <span class="invalid-feepdack"><?php echo $data['pd_price_err']; ?></span>
            </div>
            <div class="form-group">
                <label for="pd_quantity">Số lượng: </label>
                <input value="<?php echo $data['product']->pd_quantity; ?>" type="number" name="pd_quantity" class="form-control form-control-lg <?php echo (!empty($data['pd_quantity_err'])) ? 'is-invalid' : '' ?> ">
                <span class="invalid-feepdack"><?php echo $data['pd_quantity_err']; ?></span>
            </div>
            <div class="form-group">
                <label for="file">Ảnh: </label>
                <input value="<?php echo $data['product']->pd_image; ?>" type="file" name="pd_image" class="form-control form-control-lg">
                <img width=200px src="<?php echo URLROOT; ?>/public/img/<?php echo $data['product']->pd_image; ?>" alt="">
            </div>
            <div class="form-group">
                <label for="pd_description">Mô tả: </label>
                <textarea name="pd_description" id="" cols="30" rows="2" class="form-control form-control-lg <?php echo (!empty($data['pd_description_err'])) ? 'is-invalid' : '' ?> "><?php echo $data['product']->pd_description; ?></textarea>
                <span class="invalid-feepdack"><?php echo $data['pd_description_err']; ?></span>
            </div>
            <input type="submit" class="btn btn-success" value="Cập nhật">
        </form>
    </div>
</div>



<?php require APPROOT . '/views/inc/footer.php'; ?>