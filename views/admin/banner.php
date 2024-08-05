<?php include("header.php"); ?>
<link href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.12/cropper.min.css" rel="stylesheet">
<script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.12/cropper.min.js"></script>

<style>
    .card {
        position: relative;
    }

    .card-img-top {
        transition: all 0.3s ease;
    }

    .overlay {
        position: absolute;
        top: 0;
        left: 0;
        height: 100%;
        width: 100%;
        display: none;
        align-items: center;
        justify-content: center;
        background: rgba(0, 0, 0, 0.5);
    }

    .card-hover:hover .overlay {
        display: flex;
    }

    .overlay .btn {
        margin: 5px;
    }
</style>

<div class="card p-5">
    <div class="d-flex justify-content-between">
        <h1>Banner Manage</h1>
        <h1>
            <a href="#" data-toggle="modal" data-target="#addBannerModal" class="btn btn-primary btn-sm">
                <i class="fas fa-plus"></i> Add Banner
            </a>
        </h1>
    </div>
    <hr>
    <div class="mb-4">
        <input type="text" id="search-box" class="form-control" placeholder="Search banner..."
            onkeyup="searchbanners()">
    </div>
    <div class="bd-example mt-4">
        <div class="row" id="banner-list">
            <?php foreach ($data as $value) { ?>
            <div class="col-12 mb-4">
                <div class="card card-hover">
                    <img src="<?= $value['image']?>" class="card-img-top" style="height: 200px; width: 100%; object-fit: cover;">
                    <div class="overlay">
                        <a href="#" onclick="loadBannerData('<?=$value['id']?>', '<?=$value['image']?>')" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#updateBannerModal"><i class="fas fa-edit"></i></a>
                        <a href="<?= json_decode(file_get_contents('env.json'))->base_url?>/admin/product/delete?id=<?=$value['id']?>" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></a>
                    </div>
                </div>
            </div>
            <?php } if (count($data) <= 0) { ?>
            <div class="card text-center w-100 p-3">
                <h1>Data Not Found</h1>
            </div>
            <?php } ?>
        </div>
    </div>
</div>

<!-- Modal Add Banner -->
<div class="modal fade" id="addBannerModal" tabindex="-1" role="dialog" aria-labelledby="addBannerModalTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addBannerModalTitle">Add Banner </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?=json_decode(file_get_contents('env.json'))->base_url ?>/admin/banner/create" method="post"
                enctype="multipart/form-data">
                <div class="modal-body">
                    <span for="">Image :</span>
                    <input type="file" name="image" id="add_banner_image" class="form-control rounded mb-3"
                        onchange="previewImage(event, 'add_image_preview')">
                    <img id="add_image_preview" src="" class="img-fluid mt-3" style="max-height: 300px;">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal Update Banner -->
<div class="modal fade" id="updateBannerModal" tabindex="-1" role="dialog" aria-labelledby="updateBannerModalTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="updateBannerModalTitle">Update Banner</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?=json_decode(file_get_contents('env.json'))->base_url ?>/admin/banner/update" method="post"
                enctype="multipart/form-data">
                <div class="modal-body">
                    <input type="hidden" name="id" id="banner_id">
                    <span for="">Image :</span>
                    <input type="file" name="image" id="update_banner_image" class="form-control rounded mb-3"
                        onchange="previewImage(event, 'update_image_preview')">
                    <img id="update_image_preview" src="" class="img-fluid mt-3" style="max-height: 300px;">
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
function previewImage(event, previewId) {
    var reader = new FileReader();
    reader.onload = function() {
        var output = document.getElementById(previewId);
        output.src = reader.result;
    };
    reader.readAsDataURL(event.target.files[0]);
}

function loadBannerData(id, image) {
    document.getElementById('banner_id').value = id;
    document.getElementById('update_image_preview').src = image;
}
</script>

<?php include("footer.php"); ?>
