</div>
</div>
</div>
</div>

</div>
</div>
</div>
</body>
<script src="../assets/admin/js/core/jquery.3.2.1.min.js"></script>
<script src="../assets/admin/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js"></script>
<script src="../assets/admin/js/plugin/jquery-ui-touch-punch/jquery.ui.touch-punch.min.js"></script>
<script src="../assets/admin/js/core/popper.min.js"></script>
<script src="../assets/admin/js/core/bootstrap.min.js"></script>
<script src="../assets/admin/js/plugin/chart.js/chart.min.js"></script>
<script src="../assets/admin/js/plugin/bootstrap-notify/bootstrap-notify.min.js"></script>
<script src="../assets/admin/js/plugin/bootstrap-toggle/bootstrap-toggle.min.js"></script>
<script type="text/javascript" src="../assets/admin/js/plugin/jqvmap/jquery.vmap.min.js"></script>
<script type="text/javascript" src="../assets/admin/js/plugin/jqvmap/maps/jquery.vmap.world.js" charset="utf-8"></script>
<script src="../assets/admin/js/plugin/sweetalert/sweetalert.min.js"></script>
<script src="../assets/admin/js/plugin/chart-circle/circles.min.js"></script>
<script src="../assets/admin/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js"></script>
<script src="../assets/admin/js/atlantis.min.js"></script>
<script src="../assets/prism.js"></script>
<script src="../assets/admin/js/plugin/datatables/datatables.min.js"></script>
<script src="../assets/prism-normalize-whitespace.min.js"></script>
<script type="text/javascript">
// Optional

$(document).on('click', 'a[href^="#"]', function(e) {
    $('body, html').animate({
        scrollTop: pos
    });
});
$(document).ready(function() {
    $('#basic-datatables').DataTable({});
});
</script>
<?php
    if (isset($_SESSION['success'])) {
    ?>
<script>
swal('<?=$_SESSION['success']?>', {
    icon : "success",
	buttons: {
		confirm: {
			className : 'btn btn-success'
		}
	},
});
</script>
<?php
    unset($_SESSION['success']);
    }
    ?>

</html>