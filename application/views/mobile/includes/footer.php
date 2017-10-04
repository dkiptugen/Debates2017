<div class="footer">© Copyright 2017 - Debates Kenya</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<!--script src="https://ajax.googleapis.com/ajax/libs/jquerymobile/1.4.5/jquery.mobile.min.js"></script-->
<script type="text/javascript" src='<?=base_url('assets'); ?>/js/bootstrap.min.js'></script>
<script type="text/javascript">

	$.ajax({url: "<?=site_url('mobilerss/10'); ?>",
			 success: function(result)
			 		{
        				$("#feed").html(result);
    				},
    		 error: function(e)
    		 	{
    		 		console.log(e.Message);
    		 	}
    	});
</script>
</body>
</html>
