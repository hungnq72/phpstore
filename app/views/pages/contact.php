<?php require APPROOT . '/views/inc/header.php'; ?>
<div class="container">
  <div class="row">
    <div class="col-md-6 mx-auto">
      <div class="card card-body bg-light mt-5">
        <?php flash('send_success'); ?>
        <h2>Phản hồi</h2>
        <form action="<?php echo URLROOT; ?>/pages/contact" method="post">
          <div class="form-group">
            <label for="email">Email: <sup>*</sup></label>
            <input type="text" name="email" class="form-control form-control-lg <?php echo (!empty($data['email_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['email']; ?>">
            <span class="invalid-feedback"><?php echo $data['email_err']; ?></span>
          </div>
          <div class="form-group">
            <label for="msg">Nội dung: <sup>*</sup></label>
            <input type="text" name="msg" class="form-control form-control-lg <?php echo (!empty($data['msg_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['msg']; ?>">
            <span class="invalid-feedback"><?php echo $data['msg_err']; ?></span>
          </div>
          <input type="submit" value="Send" class="btn btn-success">
        </form>
      </div>
    </div>
  </div>
</div>
<?php require APPROOT . '/views/inc/footer.php'; ?>