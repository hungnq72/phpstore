<?php require APPROOT . '/views/inc/header.php'; ?>
<div class="container">

        <div id="test" class="container" style="margin-bottom: 10px;">
            <div class="row">
                <div class="col-md-3">
                    <a href="<?php echo URLROOT; ?>/products/add" class="btn btn-primary btn-block" data-toggle="modal" data-target="#addPostModal">
                        <i class="fas fa-plus"></i> Add Post
                    </a>
                </div>
                <div class="col-md-3">
                    <a href="#" class="btn btn-success btn-block" data-toggle="modal" data-target="#addCategoryModal">
                        <i class="fas fa-plus"></i> Add Category
                    </a>
                </div>
                <div class="col-md-3">
                    <a href="#" class="btn btn-warning btn-block" data-toggle="modal" data-target="#addUserModal">
                        <i class="fas fa-plus"></i> Add User
                    </a>
                </div>
            </div>
        </div>


    <!-- POSTS -->
    <section id="posts">
        <div class="container">
            <div class="row">
                <div class="col-md-9">
                    <div class="card">
                        <div class="card-header">
                            <h4>Latest Posts</h4>
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
                                            <i class="fas fa-angle-double-right"></i> Details
                                        </a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>

                            </tbody>
                            
                        </table>
                    </div>
                </div>
                <div class="col-md-2,5">
                    <div class="card text-center bg-primary text-white mb-3">
                        <div class="card-body">
                            <h3>Posts</h3>
                            <h4 class="display-5">
                                <i class="fas fa-pencil-alt"></i> 6
                            </h4>
                            <a href="posts.html" class="btn btn-outline-light btn-sm">View</a>
                        </div>
                    </div>

                    <div class="card text-center bg-success text-white mb-3">
                        <div class="card-body">
                            <h3>Categories</h3>
                            <h4 class="display-4">
                                <i class="fas fa-folder"></i> 4
                            </h4>
                            <a href="categories.html" class="btn btn-outline-light btn-sm">View</a>
                        </div>
                    </div>

                    <div class="card text-center bg-warning text-white mb-3">
                        <div class="card-body">
                            <h3>Users</h3>
                            <h4 class="display-4">
                                <i class="fas fa-users"></i> 4
                            </h4>
                            <a href="users.html" class="btn btn-outline-light btn-sm">View</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

</div>
<?php require APPROOT . '/views/inc/footer.php'; ?>