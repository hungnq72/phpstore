<?php require APPROOT . '/views/inc/header.php'; ?>
<div class="container">
  <div class="row">
    <div class="col-md-6 mx-auto">
      <div class="card card-body bg-light mt-5">
        <?php flash('register_success'); ?>
        <h2>Đăng ký tài khoản</h2>
        <p>Vui lòng điền thông tin để tạo tài khoản</p>
        <form action="<?php echo URLROOT; ?>/users/register" method="post">
          <div class="form-group">
            <label for="name">Tên: <sup>*</sup></label>
            <input type="text" name="name" class="form-control form-control-lg <?php echo (!empty($data['name_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['name']; ?>">
            <span class="invalid-feedback"><?php echo $data['name_err']; ?></span>
          </div>
          <div class="form-group">
            <label for="email">Email: <sup>*</sup></label>
            <input type="email" name="email" class="form-control form-control-lg <?php echo (!empty($data['email_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['email']; ?>">
            <span class="invalid-feedback"><?php echo $data['email_err']; ?></span>
          </div>
          <div class="form-group">
            <label for="username">Tên đăng nhập: <sup>*</sup></label>
            <input type="text" name="username" class="form-control form-control-lg <?php echo (!empty($data['username_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['username']; ?>">
            <span class="invalid-feedback"><?php echo $data['username_err']; ?></span>
          </div>
          <div class="form-group">
            <label for="password">Mật khẩu: <sup>*</sup></label>
            <input type="password" name="password" class="form-control form-control-lg <?php echo (!empty($data['password_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['password']; ?>">
            <span class="invalid-feedback"><?php echo $data['password_err']; ?></span>
          </div>
          <div class="form-group">
            <label for="confirm_password">Xác nhận mật khẩu: <sup>*</sup></label>
            <input type="password" name="confirm_password" class="form-control form-control-lg <?php echo (!empty($data['confirm_password_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['confirm_password']; ?>">
            <span class="invalid-feedback"><?php echo $data['confirm_password_err']; ?></span>
          </div>
          <div class="form-group">
            <label for="address">Địa chỉ: <sup>*</sup></label>
            <input type="address" name="address" class="form-control form-control-lg <?php echo (!empty($data['address_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['address']; ?>">
            <span class="invalid-feedback"><?php echo $data['address_err']; ?></span>
          </div>
          <div class="row">
            <div class="col">
              <input type="submit" value="Register" class="btn btn-success btn-block">
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<?php require APPROOT . '/views/inc/footer.php'; ?>