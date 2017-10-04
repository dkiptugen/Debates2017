<div class="clearboth"></div>
<div class="container-fluid footer">
	<div class="container">
		© Copyright 2017 - Debates Media Limited
	</div>

</div>
<?php $this->view("analytics"); ?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="//netdna.bootstrapcdn.com/bootstrap/3.0.2/js/bootstrap.min.js" type="text/javascript"></script>
<script type="text/javascript">
    $(document).ready(function()
        {
            $('img').on("error", function(){
                $(this).attr('src', '<?=IMAGENOTFOUND; ?>').attr('alt','image not found');
            });
        });
</script>	
</body>
</html>