<footer class="main-footer">
	<strong>Desa Girijaya 2021 </strong> Maju Bersama Membangun Desa
</footer>
<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
	<!-- Create the tabs -->
	<ul class="nav nav-tabs nav-justified control-sidebar-tabs">
		<li><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>
		<li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
	</ul>
	<!-- Tab panes -->
</aside>
<!-- /.control-sidebar -->
<!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
<div class="control-sidebar-bg"></div>
<!-- ./wrapper -->

<!-- jQuery 2.2.3 -->
<script src="<?php echo base_url() ?>assets/plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
	$.widget.bridge('uibutton', $.ui.button);
</script>

<script>
	$(document).ready(function() {
		$("#pembayaran").click(function() {
			id = $('.nomor').val();
			$.ajax({
				type: 'GET',
				url: '<?= site_url('Pembayaran/ajax/') ?>' + id,
				success: function(data) {
					hasil = JSON.parse(data)
					$('.lokasi').val(hasil[0].lokasi);
					$('.nama_penyewa').val(hasil[0].nama);
				},
				error: function(data) {
					alert(data);
				}
			});
		});
		$('.kirim').click(function() {
			id = $('.nomor').val();
			$('.bayar').prop('action', '<?= base_url('Pembayaran/bayar/') ?>' + id);
		});
		$('.pembayaran').change(function() {
			id = $(this).val();
			$.ajax({
				type: 'GET',
				url: '<?= site_url('Pembayaran/ajax/') ?>' + id,
				success: function(data) {
					hasil = JSON.parse(data)
					console.log(hasil)
					$('.lokasi').val(hasil[0].lokasi);
					$('.nama_penyewa').val(hasil[0].nama);
				},
				error: function(data) {
					alert(data);
				}
			});
		});
		$('.lama_sewa').change(function() {
			id = $(this).val();
			lokasi = $('.lokasi').val();
			$.ajax({
				type: 'GET',
				url: '<?= site_url('Pembayaran/hitung/') ?>' + id + '/' + lokasi,
				success: function(data) {
					$('.uang').val(data);
					$('.sewa').prop('action', action = "<?php echo base_url('Pembayaran/tambah_aksi') ?>" + '/' + data);
				},
				error: function(data) {
					alert(data);
				}
			});
		});
	});
</script>

<!-- Bootstrap 3.3.6 -->
<script src="<?php echo base_url() ?>assets/bootstrap/js/bootstrap.min.js"></script>
<!-- Morris.js charts -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
<script src="<?php echo base_url() ?>assets/plugins/morris/morris.min.js"></script>
<!-- Sparkline -->
<script src="<?php echo base_url() ?>assets/plugins/sparkline/jquery.sparkline.min.js"></script>
<!-- jvectormap -->
<script src="<?php echo base_url() ?>assets/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="<?php echo base_url() ?>assets/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- jQuery Knob Chart -->
<script src="<?php echo base_url() ?>assets/plugins/knob/jquery.knob.js"></script>
<!-- daterangepicker -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.2/moment.min.js"></script>
<script src="<?php echo base_url() ?>assets/plugins/daterangepicker/daterangepicker.js"></script>
<!-- datepicker -->
<script src="<?php echo base_url() ?>assets/plugins/datepicker/bootstrap-datepicker.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="<?php echo base_url() ?>assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<!-- Slimscroll -->
<script src="<?php echo base_url() ?>assets/plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="<?php echo base_url() ?>assets/plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url() ?>assets/dist/js/app.min.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="<?php echo base_url() ?>assets/dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url() ?>assets/dist/js/demo.js"></script>
</body>

</html>
