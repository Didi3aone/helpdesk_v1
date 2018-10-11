
<!-- jQuery 3 -->
<script src="<?= base_url(); ?>assets/js/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="<?= base_url(); ?>assets/js/bootstrap.min.js"></script>
<script src="<?= base_url(); ?>assets/js/sweetalert.min.js"></script>
<!-- iCheck -->
<!-- <script src="../../plugins/iCheck/icheck.min.js"></script>
<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' /* optional */
    });
  });
</script> -->
<!-- sniipet for get view js -->
<?php 
	if( isset($script_js) ) {
		$this->load->view($script_js);
	}
?>
</body>
</html>
