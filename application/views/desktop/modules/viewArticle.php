
   

</style>
<div class="container-fluid advert-inner">
	<div class="container">
	<div class="span10 offset2 ">
      <?php $this->view("ads/top_ad-728x90"); ?>
	</div>
    </div>
 </div>
<div class="container zero-padding">

  <div class="span11 inner">
    <h3><?=date('l F d, Y',strtotime($mainArticle->publishdate)); ?></h3>
	 <h3 >By : <?=$mainArticle->author; ?></h3>
    <h2><?=$mainArticle->title; ?></h2>
	</div>
</div>

<div class="container">
 <div class="span1 social round">
	 	<h2>SHARE</h2>	
	  	<ul class="shares xs-shares">
		  <li><a href="https://www.facebook.com/sharer/sharer.php?u=<?=urlencode(current_url()); ?>" target="_blank"><img src="<?=base_url('assets/'); ?>img/facebook-inner.png" width="40" height="40" alt=""/></a></li>
          <li> <a href="https://www.twitter.com/intent/tweet?url=<?=urlencode(current_url()); ?>&via=debates_ke&text=<?=$mainArticle->title; ?>" target="_blank" ><img src="<?=base_url('assets/'); ?>img/twitter-share.png" width="40" height="40" alt=""/></a></li>
          <li> <a href="" ><img src="<?=base_url('assets/'); ?>img/youtube-inner.png" width="40" height="40" alt=""/></a></li>
        </ul>
  </div>
<div class="span10 padding-round white">
    <?php if(isset($video)): ?>
      <div class="inner-banner">
            <iframe style="width:100%; min-height:400px; max-height: 600px; height: auto;" src="https://www.youtube.com/embed/<?=$video->videoURL; ?>?version=3&vq=hd1080" frameborder="0" allowfullscreen></iframe>
            <h4><?=@$video->description; ?></h4>
        </div>

    <?php else: ?>
		<img src="<?=IMG_SRC.$mainArticle->thumbURL; ?>" class="img-fluid" style="width:100%;" alt="<?=$mainArticle->title; ?>"/>
		<h3>
		    <strong>
				<i>
					<?=@$mainArticle->thumbcaption; ?>
				</i>
			</strong>
		</h3>				
	<?php endif; ?>
   
   
    <?php 
    $story=explode("<p>",$this->assist->removeimg($mainArticle->story));
    $j=0;
     foreach ($story as  $value) {
         echo '<div class="word-wrap: break-word;">'.$value.'</div>';
         $j++;
         if($j==3)
            {
                echo'<div class="pull-md-left" style="margin-right: 1rem; margin-bottom: 1rem; float:left; ">';
                          $this->view("ads/center_ad-300x250");
                        echo'</div>';
            }
     }


     ?>
     <div class="clearfix"></div>
    <hr />
    <script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v2.8&appId=1538809056383320";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
<div class="fb-comments" data-href="<?=current_url(); ?>" data-width="100%" data-numposts="30"></div>
	
   
   </div>
</div>


	<div class="container zero-padding second-section">
			 
			   <?php
    $j=0;
    foreach ($other as $value)
    {
        $class=($j==0||$j%3==0)?'left-0':'';
        echo '<div class="span4 '.$class.' "> 
            
            <a href="'.site_url('article/'.$value->id.'/'.$this->assist->slugify($value->title)).'" class="">
            
                    <img src="'.IMG_SRC.$value->thumbURL.'" class="img-responsive" class="img-responsive " alt=""/>
                       
            
            </a>
           
                    <div class="header">
                        <h3>'.date('l F d, Y',strtotime($value->publishdate)).'</h3>
                        <a href="'.site_url('article/'.$value->id.'/'.$this->assist->slugify($value->title)).'">'.$value->title.'</a> </div>
                </div>';
        $j++;
        if($j%3==0){
            echo '<div class="clearfix"></div>';
        }
    }


    ?>
			
			
		</div>