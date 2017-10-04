<div class="container-fluid advert-inner">
    <div class="container">
        <div class="span10 offset2 ">
            <?php $this->view("ads/top_ad-728x90"); ?>
        </div>
    </div>
</div>
<div class="container">
	<div class="row">
		<div class="col-md-9 col-lg-9 col-sm-12 ">
    		<div class="video-container">  
    			<!--<iframe src="https://www.youtube.com/embed/live_stream?channel=UCKVsdeoHExltrWMuK0hOWmg&autoplay=1&vq=hd1080" frameborder="0" allowfullscreen class=""></iframe> -->
				<iframe src="https://livestream.com/accounts/11365479/events/3710862/player?width=960&height=540&autoPlay=true&mute=false"  frameborder="0" scrolling="no"> </iframe>
    		</div> 		
		</div>	
		<div class="col-md-3 col-lg-3 col-sm-12" >
			<div class="poll-section" style="margin:20px 0;">
					<?php $this->view('poll'); ?>
			</div>			
        </div>
    </div>
</div>
</div>
<div class="clearfix" style="margin-top:20px;"></div>
<?php $this->view('desktop/modules/schedule'); ?> 
<div class="clearboth"></div>

