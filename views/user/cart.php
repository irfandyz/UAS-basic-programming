<?php include("header.php"); ?>

<!-- Cart Start -->
<div class="container-fluid pt-5">
    <div class="row px-xl-5">
        <div class="col-lg-8 table-responsive mb-5">
            <table class="table table-bordered text-center mb-0">
                <thead class="bg-secondary text-dark">
                    <tr>
                        <th>Products</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Total</th>
                        <th>Remove</th>
                    </tr>
                </thead>
                <tbody class="align-middle">
                    <?php
                    $subtotal = 0;
                    while ($row = mysqli_fetch_assoc($data)) {
                        $total = $row['product_price'] * $row['qty'];
                        $subtotal += $total;
                    ?>
                        <tr>
                            <td class="align-middle">
                                <?= htmlspecialchars($row['product_name']) ?>
                            </td>
                            <td class="align-middle">Rp. <?= number_format($row['product_price']) ?></td>
                            <td class="align-middle">
                                <div class="input-group quantity mx-auto" style="width: 100px;">
                                    <div class="input-group-btn">
                                        <button class="btn btn-sm btn-primary btn-minus" data-id="<?= $row['id'] ?>">
                                            <i class="fa fa-minus"></i>
                                        </button>
                                    </div>
                                    <input type="text" class="form-control form-control-sm bg-secondary text-center" value="<?= $row['qty'] ?>" readonly>
                                    <div class="input-group-btn">
                                        <button class="btn btn-sm btn-primary btn-plus" data-id="<?= $row['id'] ?>">
                                            <i class="fa fa-plus"></i>
                                        </button>
                                    </div>
                                </div>
                            </td>
                            <td class="align-middle">Rp. <span class="item-total"><?= number_format($total) ?></span></td>
                            <td class="align-middle">
                                <button class="btn btn-sm btn-primary btn-delete" data-id="<?= $row['id'] ?>">
                                    <i class="fa fa-times"></i>
                                </button>
                            </td>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>
        <div class="col-lg-4">
            <div class="card border-secondary mb-5">
                <div class="card-header bg-secondary border-0">
                    <h4 class="font-weight-semi-bold m-0">Cart Summary</h4>
                </div>
                <div class="card-body">
                    <div class="d-flex justify-content-between mb-3 pt-1">
                        <h6 class="font-weight-medium">Subtotal</h6>
                        <h6 class="font-weight-medium" id="subtotal">Rp. <?= number_format($subtotal) ?></h6>
                    </div>
                </div>
                <div class="card-footer border-secondary bg-transparent">
                    <div class="d-flex justify-content-between mt-2">
                        <h5 class="font-weight-bold">Total</h5>
                        <h5 class="font-weight-bold" id="total">Rp. <?= number_format($subtotal) ?></h5>
                    </div>
                    <button id="checkout" class="btn btn-block btn-primary my-3 py-3">Proceed To Checkout</button>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Cart End -->

<?php include("footer.php"); ?>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
$(document).ready(function() {
    // Function to update subtotal and total
    function updateTotals() {
        let subtotal = 0;
        $('.item-total').each(function() {
            let itemTotal = parseInt($(this).text().replace(/[^0-9]/g, '')); // Remove non-numeric characters
            if (!isNaN(itemTotal)) {
                subtotal += itemTotal;
            }
        });
        $('#subtotal').text('Rp. ' + new Intl.NumberFormat().format(subtotal));
        $('#total').text('Rp. ' + new Intl.NumberFormat().format(subtotal));
    }

    // Handle plus button
    $('.btn-plus').click(function() {
        let id = $(this).data('id');
        let input = $(this).closest('.quantity').find('input');
        let qty = parseInt(input.val()) + 1;
        let row = $(this).closest('tr');
        
        $.ajax({
            url: '<?= json_decode(file_get_contents('env.json'))->base_url ?>/plusCart',
            method: 'POST',
            data: {id: id, qty: qty},
            success: function(response) {
                location.reload();
            },
            error: function(xhr, status, error) {
                console.error('AJAX Error:', status, error);
            }
        });
    });

    // Handle minus button
    $('.btn-minus').click(function() {
        let id = $(this).data('id');
        let input = $(this).closest('.quantity').find('input');
        let qty = Math.max(1, parseInt(input.val()) - 1);
        let row = $(this).closest('tr');
        
        $.ajax({
            url: '<?= json_decode(file_get_contents('env.json'))->base_url ?>/minCart',
            method: 'POST',
            data: {id: id, qty: qty},
            success: function(response) {
                location.reload();
            },
            error: function(xhr, status, error) {
                console.error('AJAX Error:', status, error);
            }
        });
    });

    // Handle delete button
    $('.btn-delete').click(function() {
        let id = $(this).data('id');
        let row = $(this).closest('tr');

        $.ajax({
            url: '<?= json_decode(file_get_contents('env.json'))->base_url ?>/cart/delete?id=' + id,
            method: 'GET',
            success: function(response) {
                console.log(response);
                row.remove();
                updateTotals();
            },
            error: function(xhr, status, error) {
                console.error('AJAX Error:', status, error);
            }
        });
    });
});
$(document).ready(function() {
    // Function to update subtotal and total
    function updateTotals() {
        let subtotal = 0;
        $('.item-total').each(function() {
            let itemTotal = parseInt($(this).text().replace(/[^0-9]/g, '')); // Remove non-numeric characters
            if (!isNaN(itemTotal)) {
                subtotal += itemTotal;
            }
        });
        $('#subtotal').text('Rp. ' + new Intl.NumberFormat().format(subtotal));
        $('#total').text('Rp. ' + new Intl.NumberFormat().format(subtotal));
    }

    // Handle plus button
    $('.btn-plus').click(function() {
        let id = $(this).data('id');
        let input = $(this).closest('.quantity').find('input');
        let qty = parseInt(input.val()) + 1;
        
        $.ajax({
            url: '<?= json_decode(file_get_contents('env.json'))->base_url ?>/plusCart',
            method: 'POST',
            data: {id: id, qty: qty},
            success: function(response) {
                location.reload();
            },
            error: function(xhr, status, error) {
                console.error('AJAX Error:', status, error);
            }
        });
    });

    // Handle minus button
    $('.btn-minus').click(function() {
        let id = $(this).data('id');
        let input = $(this).closest('.quantity').find('input');
        let qty = Math.max(1, parseInt(input.val()) - 1);
        
        $.ajax({
            url: '<?= json_decode(file_get_contents('env.json'))->base_url ?>/minCart',
            method: 'POST',
            data: {id: id, qty: qty},
            success: function(response) {
                location.reload();
            },
            error: function(xhr, status, error) {
                console.error('AJAX Error:', status, error);
            }
        });
    });

    // Handle delete button
    $('.btn-delete').click(function() {
        let id = $(this).data('id');
        let row = $(this).closest('tr');

        $.ajax({
            url: '<?= json_decode(file_get_contents('env.json'))->base_url ?>/cart/delete?id=' + id,
            method: 'GET',
            success: function(response) {
                row.remove();
                updateTotals();
            },
            error: function(xhr, status, error) {
                console.error('AJAX Error:', status, error);
            }
        });
    });

    // Handle checkout button
    $('#checkout').click(function() {
        $.ajax({
            url: '<?= json_decode(file_get_contents('env.json'))->base_url ?>/checkout',
            method: 'GET',
            success: function(response) {
                console.log(response);
                if (response == true) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Checkout Successful',
                        text: 'Your order has been placed successfully!',
                        confirmButtonText: 'OK'
                    }).then(function() {
                        location.reload(); // Refresh page after alert is closed
                    });
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Checkout Failed',
                        text: 'An error occurred while processing your order. Please try again.',
                    });
                }
            },
            error: function(xhr, status, error) {
                console.error('AJAX Error:', status, error);
                Swal.fire({
                    icon: 'error',
                    title: 'Checkout Failed',
                    text: 'An error occurred while processing your order. Please try again.',
                });
            }
        });
    });
});

</script>

