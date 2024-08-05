<?php include("header.php");?>
<!-- Navbar Start -->
<div class="container-fluid mb-5">
    <div class="row px-xl-5">
        <div class="col-lg-12">
            <div id="header-carousel" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                    <?php foreach ($data as $index=>$value) { ?>
                    <div class="carousel-item <?=$index==0?'active':''?>" style="height: 410px;">
                        <img class="img-fluid" src="<?=$value['image']?>" alt="Image">
                        <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                        </div>
                    </div>
                    <?php } ?>
                </div>
                <a class="carousel-control-prev" href="#header-carousel" data-slide="prev">
                    <div class="btn btn-dark" style="width: 45px; height: 45px;">
                        <span class="carousel-control-prev-icon mb-n2"></span>
                    </div>
                </a>
                <a class="carousel-control-next" href="#header-carousel" data-slide="next">
                    <div class="btn btn-dark" style="width: 45px; height: 45px;">
                        <span class="carousel-control-next-icon mb-n2"></span>
                    </div>
                </a>
            </div>
        </div>
    </div>
</div>
<!-- Navbar End -->

<!-- Products Start -->
<div class="container-fluid pt-4">
    <div class="text-center mb-4">
        <h2 class="section-title px-5"><span class="px-2">Popular Products</span></h2>
    </div>
    <div class="row px-xl-5 pb-3">
        <?php foreach($popular as $data){ ?>
        <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
            <div class="card product-item border-0 mb-4">
                <div class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">
                    <img class="img-fluid w-100" src="<?=$data['image']?>" alt="">
                </div>
                <div class="card-body border-left border-right text-center p-0 pt-4 pb-3">
                    <h6 class="text-truncate mb-3"><?=$data['name']?></h6>
                    <div class="d-flex justify-content-center">
                        <h6>Rp. <?=number_format($data['price'])?></h6>
                    </div>
                </div>
                <div class="card-footer d-flex justify-content-between bg-light border">
                    <a href="<?=json_decode(file_get_contents('env.json'))->base_url?>/detail?id=<?=$data['id']?>"
                        class="btn btn-sm text-dark p-0"><i class="fas fa-eye text-primary mr-1"></i>View
                        Detail</a>
                    <a href="<?=json_decode(file_get_contents('env.json'))->base_url?>/signin"
                        class="btn btn-sm text-dark p-0"><i class="fas fa-shopping-cart text-primary mr-1"></i>Add To
                        Cart</a>
                </div>
            </div>
        </div>
        <?php } ?>
    </div>
</div>
<!-- Products End -->


<!-- Featured Start -->
<div class="container-fluid bg-main">
    <div class="row pb-5 pt-5 ">
        <div class="col-lg-12 text-center mb-4">
            <h1 class="text-white center">Our Featured</h1>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-12">
            <div class="d-flex align-items-center border" style="padding: 30px;">
                <h1 class="fa fa-check text-primary m-0 mr-3"></h1>
                <h5 class="font-weight-semi-bold m-0 text-white">Quality Product</h5>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-12">
            <div class="d-flex align-items-center border " style="padding: 30px;">
                <h1 class="fa fa-shipping-fast text-primary m-0 mr-2"></h1>
                <h5 class="font-weight-semi-bold m-0 text-white">Free Shipping</h5>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-12">
            <div class="d-flex align-items-center border " style="padding: 30px;">
                <h1 class="fas fa-exchange-alt text-primary m-0 mr-3"></h1>
                <h5 class="font-weight-semi-bold m-0 text-white">14-Day Return</h5>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-12">
            <div class="d-flex align-items-center border " style="padding: 30px;">
                <h1 class="fa fa-phone-volume text-primary m-0 mr-3"></h1>
                <h5 class="font-weight-semi-bold m-0 text-white">24/7 Support</h5>
            </div>
        </div>
    </div>
</div>
<!-- Featured End -->


<!-- Products Start -->
<div class="container-fluid pt-5">
    <div class="text-center mb-4">
        <h2 class="section-title px-5"><span class="px-2">Our Product</span></h2>
    </div>

    <form action="" class="px-xl-5 pb-3 mb-3">
    <div class="input-group">
        <input type="text" id="search-product" class="form-control" placeholder="Search for products">
        <div class="input-group-append">
            <span class="input-group-text bg-primary text-white">
                <i class="fa fa-search"></i>
            </span>
        </div>
    </div>
</form>
<div class="row px-xl-5 pb-3" id="product-list">
    <?php foreach($product as $data){ ?>
        <div class="col-lg-3 col-md-6 col-sm-12 pb-1 product-item">
            <div class="card product-item border-0 mb-4">
                <div class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">
                    <img class="img-fluid w-100" src="<?=$data['image']?>" alt="">
                </div>
                <div class="card-body border-left border-right text-center p-0 pt-4 pb-3">
                    <h6 class="text-truncate mb-3 product-name"><?=$data['name']?></h6>
                    <div class="d-flex justify-content-center">
                        <h6>Rp. <?=number_format($data['price'])?></h6>
                    </div>
                </div>
                <div class="card-footer d-flex justify-content-between bg-light border">
                    <a href="<?=json_decode(file_get_contents('env.json'))->base_url?>/detail?id=<?=$data['id']?>" class="btn btn-sm text-dark p-0"><i class="fas fa-eye text-primary mr-1"></i>View
                        Detail</a>
                    <a href="<?=json_decode(file_get_contents('env.json'))->base_url?>/signin" class="btn btn-sm text-dark p-0"><i
                            class="fas fa-shopping-cart text-primary mr-1"></i>Add To Cart</a>
                </div>
            </div>
        </div>
    <?php } ?>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $('#search-product').on('keyup', function() {
            var searchTerm = $(this).val().toLowerCase();
            var found = false;

            $('#product-list .product-item').each(function() {
                var productName = $(this).find('.product-name').text().toLowerCase();
                if (productName.includes(searchTerm)) {
                    $(this).show();
                    found = true;
                } else {
                    $(this).hide();
                }
            });

            if (searchTerm === '') {
                $('#product-list .product-item').show();
            }
        });
    });
</script>


<?php include("footer.php");?>