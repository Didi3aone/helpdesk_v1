<script>
	$("#button-save").click(function(e) {
		e.preventDefault();

		var form = $("#menu-form");
		var url  = "<?= site_url('menu/process_form'); ?>";

		$.ajax({
			url:url,
			type:"POST",
			data:form.serialize(),
			dataType:'json',
			success: function( response ) {
				console.log(response);
                if( response['alert_error'] == true ) {
                	swal('Oops!!', response['alert_msg'], 'error');
                } else {
                    $.notify(response['alert_msg'], "success");

                    setTimeout( function(){
		                 window.location = response['redirect'];
		            }, 3000 );
                }
			},error:function( xhr ) {
				var xhr = JSON.stringify(xhr);
				console.log(xhr);
				swal('Oops!!','Something when wrong','error');
			}
		});
	});
</script>