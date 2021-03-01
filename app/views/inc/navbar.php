<nav id="navbar" class="navbar navbar-expand-lg navbar-light bg-light mb-3 fixed-top" role="navigation">
    <a class="navbar-brand" href="<?php echo URLROOT; ?>/pages/index/1">SHOP</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarsExampleDefault">
        <form action="<?php echo URLROOT; ?>/pages/search" id="search" class="form-inline" method="post">
            <input name="search" class="form-control form-control-sm ml-3 w-75" type="text" placeholder="Nhập tên sản phẩm ..." aria-label="Search">
            <input value="Tìm" class="btn btn-outline-primary btn-rounded btn-sm my-0 waves-effect waves-light" type="submit" style="margin-left: 5px;">
        </form>
        <ul class="navbar-nav ml-auto">
            <?php if (!empty($_SESSION['user_id'])) : ?>        
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo URLROOT; ?>/carts/show">Giỏ hàng</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo URLROOT; ?>/users/dashboard">Trang người bán</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo URLROOT; ?>/pages/contact">Liên hệ</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo URLROOT; ?>/users/logout">Đăng xuất</a>
                </li>
            <?php else : ?>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo URLROOT; ?>/users/register">Đăng ký</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo URLROOT; ?>/users/login">Đăng nhập</a>
                </li>
            <?php endif; ?>
        </ul>
    </div>
</nav>