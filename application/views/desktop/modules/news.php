<div class="container-fluid advert-inner">
	<div class="container">
	<div class="col-lg-10 offset2 ">
        <?php $this->view("ads/top_ad-728x90"); ?>
	</div>
    </div>
 </div>

<div class="container zero-padding">

<div class="col-lg-8 left-0">
	
			  
			  <?php
        $j=1;
        foreach ($others as $value)
            {
                if($value->related_video!=0)
                  {
                    $video=$this->article_model->getVideo($value->related_video,$value->title);
                  }
                $class=($j%2==0)?'left-0':'';
                echo '<div class="col-lg-6 '.$class.'"><a href="'.site_url('article/'.$value->id.'/'.$this->assist->slugify($value->title)).'"> ';
                    if(isset($video))
                        {
                           echo ' 
            <div class="video">
                    <img src="http://img.youtube.com/vi/'.$video->videoURL.'/hqdefault.jpg" class="img-responsive" class="img-responsive " alt=""/>
                    <div class="play-icon"><svg width="60" height="42" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"> <g> <title>Videos</title> <g id="icomoon-ignore"/>
        <use x="5.397434" y="-68.326835" transform="matrix(0.15880563740596462,0,0,0.1590301359360811,-34.233496722840435,-44.6817534019825) " id="icon" xlink:href="#svg_1"/> <path id="svg_4" d="m24,8.380953l0.190475,22.761904l16.952381,-11.333332l-17.142857,-11.428572z" stroke-linecap="null" stroke-linejoin="null" stroke-width="5" stroke="null" fill="#ffffff"/> <path id="relleno" d="m24.285713,8.666666l0,22.666666l17.238094,-11.523809l-17.238094,-11.142857z" stroke-linecap="null" stroke-linejoin="null" stroke-width="5" stroke="null" fill="#ffffff"/> </g> <defs> <svg id="svg_1" viewBox="0 0 944 1024" height="1024" width="944" xmlns:xlink="http://www.w3.org/1999/xlink"> <g id="icomoon-ignore"/> <path id="play-svg" d="m589.426025,406.15799c0,-31.289978 -25.345032,-56.652985 -56.618042,-56.652985h-265.616974c-31.27301,0 -56.618011,25.359985 -56.618011,56.652985v151.894989c0,31.290039 25.345001,56.653015 56.618011,56.653015h265.616974c31.273987,0 56.618042,-25.361023 56.618042,-56.653015v-151.894989l0,0zm-227.311035,140.032013v-142.677002l108.192017,71.339996l-108.19101,71.339996l-0.001007,-0.002991z"/> </svg> </defs> </svg></div>    
            </div>';
                        }
                    else
                        {
                            echo '<img src="'.IMG_SRC.$value->thumbURL.'" class="img-responsive" alt=""/></a>';
                        }
                
                       echo' <div class="header">
                        <h3>'.date('l F d, Y',strtotime($value->publishdate)).'</h3>
                        <a href="'.site_url('article/'.$value->id.'/'.$this->assist->slugify($value->title)).'">'.$value->title.'</a> </div>
                     </div>';
                if($j%2==0)
                    {
                        echo '<div class="clearfix"></div>';
                    }
                $j++;

            }
        ?>
			

</div>
	<div class="col-lg-4">
		<div class="side-advert">
	    	  <?php $this->view("ads/sidebar_ad-300x250"); ?>
	    </div>
		
	    <?php $this->view('desktop/modules/popular'); ?>
				
		   
    
		</div>

	</div>
   


</div>

<div class="container-fluid advert-inner">
	<div class="container">
	<div class="col-lg-10 offset2 ">
        <?php $this->view("ads/center_ad-728x90"); ?>
	</div>
    </div>
 </div>
    
	<div class="container zero-padding second-section">
	    <?php
    $j=0;
    foreach ($videos as $value)
        {
            $class=($j==0||$j%3==0)?'left-0':'';
            echo '<div class="col-lg-4 '.$class.' "> 
            
            <a href="'.site_url('video/'.$value->vid.'/'.$this->assist->slugify($value->title)).'" class="">
            <div class="video">
                    <img src="http://img.youtube.com/vi/'.$value->videoURL.'/hqdefault.jpg" class="img-responsive" class="img-responsive " alt=""/>
                    <div class="play-icon"><svg width="60" height="42" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"> <g> <title>Videos</title> <g id="icomoon-ignore"/>
        <use x="5.397434" y="-68.326835" transform="matrix(0.15880563740596462,0,0,0.1590301359360811,-34.233496722840435,-44.6817534019825) " id="icon" xlink:href="#svg_1"/> <path id="svg_4" d="m24,8.380953l0.190475,22.761904l16.952381,-11.333332l-17.142857,-11.428572z" stroke-linecap="null" stroke-linejoin="null" stroke-width="5" stroke="null" fill="#ffffff"/> <path id="relleno" d="m24.285713,8.666666l0,22.666666l17.238094,-11.523809l-17.238094,-11.142857z" stroke-linecap="null" stroke-linejoin="null" stroke-width="5" stroke="null" fill="#ffffff"/> </g> <defs> <svg id="svg_1" viewBox="0 0 944 1024" height="1024" width="944" xmlns:xlink="http://www.w3.org/1999/xlink"> <g id="icomoon-ignore"/> <path id="play-svg" d="m589.426025,406.15799c0,-31.289978 -25.345032,-56.652985 -56.618042,-56.652985h-265.616974c-31.27301,0 -56.618011,25.359985 -56.618011,56.652985v151.894989c0,31.290039 25.345001,56.653015 56.618011,56.653015h265.616974c31.273987,0 56.618042,-25.361023 56.618042,-56.653015v-151.894989l0,0zm-227.311035,140.032013v-142.677002l108.192017,71.339996l-108.19101,71.339996l-0.001007,-0.002991z"/> </svg> </defs> </svg></div>    
            </div>
            </a>
           
                    <div class="header">
                        <h3>'.date('l F d, Y',strtotime($value->publishday)).'</h3>
                        <a href="'.site_url('video/'.$value->vid.'/'.$this->assist->slugify($value->title)).'">'.$value->title.'</a> </div>
                </div>';
             $j++;
            if($j%3==0){
                echo '<div class="clearfix"></div>';
            }
        }
    
    
   ?>

			 
			
		</div>