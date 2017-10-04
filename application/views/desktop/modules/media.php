<div class="container-fluid advert-inner">
    <div class="container">
        <div class="span10 offset2 ">
            	<?php $this->view("ads/top_ad-728x90"); ?>
        </div>
    </div>
</div>
	
	<div class="clearboth"></div>
		<div class="container">
			
			<div class="span8 left-0">
				<ul class="debate-schedule" style="list-style: none; padding: 0;">
					<li  style="background: white !important; padding:0; border: solid 2px rgba(255,255,255,0.1);">
						<div class="span1 date" style="margin: 0;">
							<h1>9<sup style="text-transform:capitalize;">th</sup></h1>
							<h2>May</h2>
						</div>
						<div class="span4 debate-info">
							<h3>Initial Launch</h3>
							<h4>Raddison Blu, upperhill 7.30A.m ,Ktn, Citizen, NTV</h4>
						</div>
						<div class="clearboth"></div>

					</li>
					<!--li class="white">
						<div class="span1 date">
							<h1>30</h1>
							<h2>July</h2>
						</div>
						<div class="span4 debate-info">
							<h3>Kakamega Gubenatorial Debate</h3>
							<h4>Kakamega Town</br>9pm on Ktn, Citizen, NTV</h4>
						</div>
						<div class="clearboth"></div>

					</li>
					<li class="white">
						<div class="span1 date">
							<h1>30</h1>
							<h2>July</h2>
						</div>
						<div class="span4 debate-info">
							<h3>Kakamega Gubenatorial Debate</h3>
							<h4>Kakamega Town</br>9pm on Ktn, Citizen, NTV</h4>
						</div>
						<div class="clearboth"></div>

					</li>
					<li class="white">
						<div class="span1 date">
							<h1>30</h1>
							<h2>July</h2>
						</div>
						<div class="span4 debate-info">
							<h3>Kakamega Gubenatorial Debate</h3>
							<h4>Kakamega Town</br>9pm on Ktn, Citizen, NTV</h4>
						</div>
						<div class="clearboth"></div>

					</li-->
				</ul>
			</div>
			<div class="span4 left-0 ">
				
				<?php $this->view('desktop/modules/popular'); ?>
			</div>
            <div class="clearfix"></div>

                <div class="container zero-padding title">
                    <h1>PRESS RELEASE</h1>
                </div>
                <div class="container white-wrapper">
				    <?php
					    $x=0;
						foreach($others as $val)
						{
							if($x%4!=0) goto label1;
							echo'
							<div class="span5">
								<ul class="news-list">';
								label1:
								echo'
									<li> 
									    <a href="'.site_url('article/'.$val->id.'/'.$this->assist->slugify($val->title)).'" style="text-decoration:none;">
											<h4>'.date('dS M Y h:i:s A',strtotime($val->publishdate)).'</h4>							
											<h3 style="font-weight:900;">'.$val->title.'</h3>
											<p style="font-weight:400 !important; color:rgb(0,0,0);">'.$val->summary.'</p>
										</a>
									</li>';
									$x++;
								if($x%4!=0) goto label2;
								
								echo'	
								</ul>
							</div>';
							label2:
						}
					?>
					
                </div>
		    
			
	</div>

<?php $this->view("desktop/modules/schedule"); ?>