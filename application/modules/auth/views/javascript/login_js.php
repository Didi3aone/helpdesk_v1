<script>
	$(".btn-submits").click(function(e) {
        e.preventDefault();
         
        var form = $("form").serialize();
        var url  = '<?= site_url("auth/process_login"); ?>'; 

        $.ajax({
            url : url,
            method:'POST',
            data: form,
            dataType:'json',
            success: function ( response )
            {
            	if( response['alert_error'] == true )
            	{
            		swal("Oops!!", response['alert_msg'], 'error');
            	} else {
            		swal("Success", "Login success","success");
                    setTimeout(function() { 
                        location.href = response['redirect']; 
                    }, 2000);
            	}
            },error: function (xhr) {
            	alert('Internal server error' + xhr);
            	return false;
            }
        });
	});
</script>