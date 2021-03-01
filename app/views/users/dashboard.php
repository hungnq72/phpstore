<?php require APPROOT . '/views/inc/header.php'; ?>
<div class="container">
    <!-- POSTS -->
    <section id="posts">
        <div class="container">
            <div class="row">
                <div class="col-md-3" style='margin-bottom: 10px;'>
                    <a href="<?php echo URLROOT; ?>/products/add" class="btn btn-primary btn-block">
                        <i class="fas fa-plus"></i> Thêm sản phẩm
                    </a>
                </div>
                <div class="col-md-3" style='margin-bottom: 10px;'>
                    <a href="<?php echo URLROOT; ?>/orders/index" class="btn btn-primary btn-block">Đơn hàng chờ</a>
                </div>
                <div class="col-md-3" style='margin-bottom: 10px;'>
                    <a href="<?php echo URLROOT; ?>/orders/confirmed" class="btn btn-primary btn-block">Đơn hàng đã xác nhận</a>
                </div>
            </div>

            <div class="row justify-content-end">
                <form action="<?php echo URLROOT; ?>/pages/search" id="search" class="form-inline" method="post">
                    <input onkeyup="searchProduct(this.value)" name="search_text" id="search_text" class="form-control form-control-sm ml-3 w-75" type="text" placeholder="Nhập tên sản phẩm ..." aria-label="Search">
                    <input value="Tìm" class="btn btn-outline-primary btn-rounded btn-sm my-0 waves-effect waves-light" type="submit" style="margin-left: 5px;">
                </form>
            </div>

            <div class="row justify-content-end" style="margin: 10px 48px 10px 0px">
                <div class="row">
                    <label for="cat_id">Loại hàng: </label><br>
                    <select name="cat_id" onchange="showProduct(this.value)" class="custom-select custom-select-sm">
                        <?php foreach ($data['cat_id'] as $cat) : ?>
                            <option value="<?php echo $cat->cat_id; ?>"><?php echo $cat->cat_name; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>


        </div>

        <?php flash("delete_success"); ?>
        <?php flash("update_success"); ?>
        <div class="container">
            <div id="products" class="card">
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
            </div>

        </div>
    </section>

</div>
<?php require APPROOT . '/views/inc/footer.php'; ?>

<!-- show products by category -->
<script>
    function showProduct(str) {
        if (str == "") {
            document.getElementById("products").innerHTML = "";
            return;
        } else {
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("products").innerHTML = this.responseText;
                }
            };
            xmlhttp.open("GET", "http://localhost/php/phpstore/products/showProductByCat/" + str, true);
            xmlhttp.send();
        }
    }
</script>

<!-- show product by search bar -->
<!-- <script>
    $(document).ready(function(){
        $('#search_text').keyup(function(){
            var txt = $(this).val();
            if(txt != ''){
                $.ajax({
                    url: "http://localhost/php/phpstore/products/showProductBySearchBar",
                    method: "post",
                    data:{search: txt},
                    dataType: "text",
                    success: function(data){
                        $('#products').html(data);
                    }
                })
            }
        })
    })
</script> -->

<script>
    function searchProduct(str) {
        if (str == "") {
            document.getElementById("products").innerHTML = "";
            return;
        } else {
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("products").innerHTML = this.responseText;
                }
            };
            xmlhttp.open("GET", "http://localhost/php/phpstore/products/showProductBySearchBar/" + str, true);
            xmlhttp.send();
        }
    }
</script>