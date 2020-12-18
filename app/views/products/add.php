<?php require APPROOT . '/views/inc/header.php'; ?>
<div class="container">
    <div class="card card-body bg-light mt-5">
        <?php flash("add_success"); ?>
        <h2>Thêm hàng</h2>
        <form action="<?php echo URLROOT; ?>/products/add" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="pd_name">Tên mặt hàng: </label>
                <input type="text" name="pd_name" class="form-control form-control-lg <?php echo (!empty($data['pd_name_err'])) ? 'is-invalid' : '' ?> ">
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
                <input min="10000" type="number" name="pd_price" class="form-control form-control-lg <?php echo (!empty($data['pd_price_err'])) ? 'is-invalid' : '' ?> ">
                <span class="invalid-feepdack"><?php echo $data['pd_price_err']; ?></span>
            </div>
            <div class="form-group">
                <label for="pd_quantity">Số lượng: </label>
                <input min="1" type="number" name="pd_quantity" class="form-control form-control-lg <?php echo (!empty($data['pd_quantity_err'])) ? 'is-invalid' : '' ?> ">
                <span class="invalid-feepdack"><?php echo $data['pd_quantity_err']; ?></span>
            </div>
            <div class="form-group">
                <label for="file">Ảnh: </label>
                <input type="file" name="pd_image" class="form-control form-control-lg <?php echo (!empty($data['pd_image_err'])) ? 'is-invalid' : '' ?> ">
                <span class="invalid-feepdack"><?php echo $data['pd_image_err']; ?></span>
            </div>
            <div class="form-group">
                <label for="pd_description">Mô tả: </label>
                <textarea name="pd_description" id="" cols="30" rows="2" class="form-control form-control-lg <?php echo (!empty($data['pd_description_err'])) ? 'is-invalid' : '' ?> "></textarea>
                <span class="invalid-feepdack"><?php echo $data['pd_description_err']; ?></span>
            </div>
            <input type="submit" class="btn btn-success" value="Submit">
        </form>
    </div>
</div>
<?php require APPROOT . '/views/inc/footer.php'; ?>