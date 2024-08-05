<?php include("header.php");?>

<div class="card p-5">
    <div class="d-flex justify-content-between">
        <h1>Order Manage</h1>
    </div>
    <hr>
    <div class="bd-example mt-4">
        <div class="table-responsive">
            <table id="basic-datatables" class="display table table-striped table-hover" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Buyyer</th>
                        <th>Product Name</th>
                        <th>Price</th>
                        <th>Qty</th>
                        <th>Total</th>
                        <th class="text-right">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $i = 1;
                        // var_dump($data);die;
                        while ($value = mysqli_fetch_assoc($data)) {
                    ?>
                    <tr>
                        <td><?=$i++?></td>
                        <td><?=$value['fullname']?></td>
                        <td><?=$value['product_name']?></td>
                        <td>Rp. <?=number_format($value['price'])?></td>
                        <td><?=$value['qty']?></td>
                        <td>Rp. <?=number_format($value['qty']*$value['price'])?></td>
                        <td class="text-right">
                            <?php if($value['status'] == 'confirmed'){ ?>
                                <i class="fas fa-circle-check text-success"></i>
                            <?php }else{ ?>
                            <a href="<?= json_decode(file_get_contents('env.json'))->base_url?>/admin/order/confirm?id=<?=$value['id']?>"
                                class="btn btn-primary btn-sm"><i class="fas fa-circle-check"></i></a>
                            <?php } ?>
                        </td>
                    </tr>
                    <?php
                        }
                    ?>
                </tbody>
            </table>
        </div>
    </div>

</div>
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Add User</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?=json_decode(file_get_contents('env.json'))->base_url ?>/admin/user/create" method="post">
                <div class="modal-body">
                    <span for="">Username :</span>
                    <input type="text" name="username" placeholder="your username" id=""
                        class="form-control rounded mb-3">
                    <span for="">Fullname :</span>
                    <input type="text" name="fullname" placeholder="your fullname" id=""
                        class="form-control rounded mb-3">
                    <span for="">Email :</span>
                    <input type="text" name="email" placeholder="your email" id="" class="form-control rounded mb-3">
                    <span for="">Password :</span>
                    <input type="password" name="password" placeholder="your password" id=""
                        class="form-control rounded mb-3">
                    <span for="">Role :</span>
                    <select name="role" id="" class="form-control rounded mb-3">
                        <option selected disabled>Select Role</option>
                        <option value="user">user</option>
                        <option value="admin">admin</option>
                    </select>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="updateModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Update User</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?=json_decode(file_get_contents('env.json'))->base_url ?>/admin/user/update" method="post">
                <div class="modal-body">
                    <input type="hidden" name="id" id="id">
                    <span for="">Username :</span>
                    <input type="text" name="username" id="username" placeholder="your username"
                        class="form-control rounded mb-3">
                    <span for="">Fullname :</span>
                    <input type="text" name="fullname" id="fullname" placeholder="your fullname"
                        class="form-control rounded mb-3">
                    <span for="">Email :</span>
                    <input type="text" name="email" id="email" placeholder="your email"
                        class="form-control rounded mb-3">
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
function updateSet(id) {
    $.ajax({
        url: "<?=json_decode(file_get_contents('env.json'))->base_url ?>/admin/user/get?id=" + id,
        success: function(data) {
            $("#id").val(data['id']);
            $("#username").val(data['username']);
            $("#fullname").val(data['fullname']);
            $("#email").val(data['email']);
        }
    });
}
</script>

<?php include("footer.php");?>