<div class="container-fluid advert-inner">
    <div class="container">
        <div class="span10 offset2 ">
            <img src="<?=base_url('assets/'); ?>img/ad.png" class="img-responsive"  width="728" height="90" alt="test"/>
        </div>
    </div>
</div>
<div class="container zero-padding">

    <div class="span10 left-0 inner">
        <h3><?=date('l F d, Y',strtotime($mainArticle->publishdate)); ?></h3>
        <h2><?=$mainArticle->title; ?></h2>
    </div>
</div>
<div class="container zero-padding">

    <div class="span1 social round">
        <h1>380</h1>
        <h2>SHARES</h2>
        <ul class="shares">
            <li><img src="<?=base_url('assets/'); ?>img/facebook-inner.png" width="40" height="40" alt=""/></li>
            <li><img src="<?=base_url('assets/'); ?>img/twitter-share.png" width="40" height="40" alt=""/></li>
            <li><img src="<?=base_url('assets/'); ?>img/youtube-inner.png" width="40" height="40" alt=""/></li>
        </ul>
    </div>
    <div class="span8  left-0 inner">

        <div class="inner-banner">
            <figure>
				<img src="<?=IMG_SRC.$mainArticle->thumbURL; ?>" class="img-responsive" alt="<?=$mainArticle->title; ?>" style="width:100%;height:400px;"/>
				<figcaption style="text-align:center;"><strong><i><?=@$mainArticle->thumbcaption; ?></i></strong></figcaption>
				
			</figure>
			<div style='padding:30px;' class="white">
				<?=$this->assist->removeimg($mainArticle->story); ?>
			</div>
        </div>
		
    </div>
    <div class="span3 round">
          <h1>Related Articles </h1>
        <ul class="sidebar">
            <?php

           foreach ($related as $val){
               echo'<li>
                <div class="span1 left-0">
                    <a href="'.site_url('article/'.$val->id.'/'.$this->assist->slugify($val->title)).'" class="">
                     <img src="'.IMG_SRC.$val->thumbURL.'" class="img-responsive" width="150" height="150" alt=""/>           
                     </a>
                </div>
                <div class="span2 left-10"><a href="'.site_url('article/'.$val->id.'/'.$this->assist->slugify($val->title)).'">'.$val->title.'</a></div>
                <div class="clearboth"></div>
            </li>';
           }

            ?>
        </ul>
		<h1>Related Videos </h1>
       <ul class="sidebar ">
            <?php

           foreach ($relatedv as $val){
               echo'<li>
                <div class="span1 left-0">
                    <a href="'.site_url('video/'.$val->id.'/'.$this->assist->slugify($val->title)).'" class="">
					   <div class="video">
							<img src="http://img.youtube.com/vi/'.$val->videoURL.'/2.jpg" class="img-responsive" width="150" height="150" alt=""/> 
                        </div>							
                     </a>
                </div>
                <div class="span2 left-10"><a href="'.site_url('video/'.$val->id.'/'.$this->assist->slugify($val->title)).'">'.$val->title.'</a></div>
                <div class="clearboth"></div>
            </li>';
           }

            ?>
        </ul>  
    </div>



</div>

<div class="container-fluid advert-inner">
    <div class="container">
        <div class="span10 offset2 ">
            <img src="<?=base_url('assets/'); ?>img/ad.png" class="img-responsive"  width="728" height="90" alt=""/>
        </div>
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