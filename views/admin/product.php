<?php include("header.php"); ?>

<div class="card p-5">
    <div class="d-flex justify-content-between">
        <h1>Product Manage</h1>
        <h1>
            <a href="#" data-toggle="modal" data-target="#addProductModal" class="btn btn-primary btn-sm">
                <i class="fas fa-plus"></i> Add Product
            </a>
        </h1>
    </div>
    <hr>
    <div class="mb-4">
        <input type="text" id="search-box" class="form-control" placeholder="Search product..." onkeyup="searchProducts()">
    </div>
    <div class="bd-example mt-4">
        <div class="row" id="product-list">
            <?php
                foreach ($data as $value) {
            ?>
            <div class="col-4 mb-4 product-item">
                <div class="card">
                    <img src="<?= $value['image']?>" class="card-img-top" alt="<?=$value['name']?>">
                    <div class="card-body">
                        <h5 class="card-title"><?=$value['name']?></h5>
                        <p class="card-text"><?=substr($value['short_description'], 0, 40)?></p>
                        <p class="card-text"><small class="text-muted"><?=substr($value['description'], 0, 80)?></small></p>
                        <p class="card-text fw-bold">Rp.<?=number_format($value['price'])?></p>
                        <div class="text-right">
                            <a href="#" onclick="updateProduct('<?=$value['id']?>')" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#updateProductModal"><i class="fas fa-edit"></i></a>
                            <a href="<?= json_decode(file_get_contents('env.json'))->base_url?>/admin/product/delete?id=<?=$value['id']?>" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <?php
                }
                if (count($data) <= 0) {
            ?>
                    <div class="card text-center w-100 p-3">
                        <h1>Data Not Found</h1>
                    </div>
            <?php
                }
            ?>
        </div>
    </div>
</div>

<!-- Modal Add Product -->
<div class="modal fade" id="addProductModal" tabindex="-1" role="dialog" aria-labelledby="addProductModalTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addProductModalTitle">Add Product</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?=json_decode(file_get_contents('env.json'))->base_url ?>/admin/product/create" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    <span for="">Name :</span>
                    <input type="text" name="name" placeholder="Product name" id="" class="form-control rounded mb-3">
                    <span for="">Image :</span>
                    <input type="file" name="image" id="" class="form-control rounded mb-3">
                    <span for="">Price :</span>
                    <input type="text" name="price" placeholder="Price" id="" class="form-control rounded mb-3">
                    <span for="">Short Description :</span>
                    <input type="text" name="short_description" placeholder="Short description" id="" class="form-control rounded mb-3">
                    <span for="">Description :</span>
                    <textarea name="description" placeholder="Description" id="" class="form-control rounded mb-3"></textarea>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal Update Product -->
<div class="modal fade" id="updateProductModal" tabindex="-1" role="dialog" aria-labelledby="updateProductModalTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="updateProductModalTitle">Update Product</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?=json_decode(file_get_contents('env.json'))->base_url ?>/admin/product/update" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    <input type="hidden" name="id" id="product_id">
                    <span for="">Name :</span>
                    <input type="text" name="name" id="product_name" placeholder="Product name" class="form-control rounded mb-3">
                    <span for="">Image :</span>
                    <input type="file" name="image" id="product_image" class="form-control rounded mb-3">
                    <span for="">Price :</span>
                    <input type="number" name="price" placeholder="product_price" id="product_price" class="form-control rounded mb-3">
                    <span for="">Short Description :</span>
                    <input type="text" name="short_description" id="product_short_description" placeholder="Short description" class="form-control rounded mb-3">
                    <span for="">Description :</span>
                    <textarea name="description" id="product_description" placeholder="Description" class="form-control rounded mb-3"></textarea>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    function updateProduct(id){
        $.ajax({
            url: "<?=json_decode(file_get_contents('env.json'))->base_url ?>/admin/product/get?id=" + id,
            success: function(data){
                $("#product_id").val(data['id']);
                $("#product_name").val(data['name']);
                $("#product_price").val(data['price']);
                $("#product_short_description").val(data['short_description']);
                $("#product_description").val(data['description']);
            }
        });
    }

    function searchProducts() {
        let input = document.getElementById('search-box').value.toLowerCase();
        let productList = document.getElementById('product-list');
        let items = productList.getElementsByClassName('product-item');

        for (let i = 0; i < items.length; i++) {
            let name = items[i].getElementsByClassName('card-title')[0].innerText.toLowerCase();
            let shortDescription = items[i].getElementsByClassName('card-text')[0].innerText.toLowerCase();
            
            if (name.includes(input) || shortDescription.includes(input)) {
                items[i].style.display = "";
            } else {
                items[i].style.display = "none";
            }
        }
    }
</script>

<?php include("footer.php"); ?>
