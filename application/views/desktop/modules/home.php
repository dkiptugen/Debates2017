<div class="container-fluid advert-inner">
	<div class="container">
		<div class="col-lg-10 offset2 ">
	    	<?php $this->view("ads/top_ad-728x90"); ?>
		</div>
    </div>
 </div>

<div class="container zero-padding down">

<div class="col-lg-6 left-0">
   	<a href="<?=site_url('article/'.@$featured[0]->id.'/'.$this->assist->slugify(@$featured[0]->title)); ?>">
      <?php 
 
      if($relatedvideo[0]!=NULL)
           {

              echo '<div class="video">
              <img src="http://img.youtube.com/vi/'.$relatedvideo[0]->videoURL.'/hqdefault.jpg" class="img-fluid" style="width:100%;" />
              <div class="play-icon"><svg width="60" height="42" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"> <g> <title>Videos</title> <g id="icomoon-ignore"/>
        <use x="5.397434" y="-68.326835" transform="matrix(0.15880563740596462,0,0,0.1590301359360811,-34.233496722840435,-44.6817534019825) " id="icon" xlink:href="#svg_1"/> <path id="svg_4" d="m24,8.380953l0.190475,22.761904l16.952381,-11.333332l-17.142857,-11.428572z" stroke-linecap="null" stroke-linejoin="null" stroke-width="5" stroke="null" fill="#ffffff"/> <path id="relleno" d="m24.285713,8.666666l0,22.666666l17.238094,-11.523809l-17.238094,-11.142857z" stroke-linecap="null" stroke-linejoin="null" stroke-width="5" stroke="null" fill="#ffffff"/> </g> <defs> <svg id="svg_1" viewBox="0 0 944 1024" height="1024" width="944" xmlns:xlink="http://www.w3.org/1999/xlink"> <g id="icomoon-ignore"/> <path id="play-svg" d="m589.426025,406.15799c0,-31.289978 -25.345032,-56.652985 -56.618042,-56.652985h-265.616974c-31.27301,0 -56.618011,25.359985 -56.618011,56.652985v151.894989c0,31.290039 25.345001,56.653015 56.618011,56.653015h265.616974c31.273987,0 56.618042,-25.361023 56.618042,-56.653015v-151.894989l0,0zm-227.311035,140.032013v-142.677002l108.192017,71.339996l-108.19101,71.339996l-0.001007,-0.002991z"/> </svg> </defs> </svg></div>    
            </div>';
           }
          else
           {
               echo '<img src="'.IMG_SRC.@$featured[0]->thumbURL.'" class="img-fluid" style="width:100%;" onerror="this.onerror=null;this.src=\'{IMAGENOTFOUND}\'" alt="'.@$featured[0]->title.'"/>';
           }
     	?>
    </a> 
   	 <div class="header">
   	  <h3><?=date('l M d, Y', strtotime(@$featured[0]->publishdate)); ?></h3>
      <h2><a href="<?=site_url('article/'.@$featured[0]->id.'/'.$this->assist->slugify(@$featured[0]->title)); ?>"><?=@$featured[0]->title; ?></a></h2>
    </div>
  </div>

  <div class="col-lg-3">

    <a href="<?=site_url('article/'.$featured[1]->id.'/'.$this->assist->slugify($featured[1]->title)); ?>">
      <?php 
 
      if($relatedvideo[1]!=NULL)
           {

              echo '<div class="video">
              <img src="http://img.youtube.com/vi/'.$relatedvideo[1]->videoURL.'/hqdefault.jpg" class="img-fluid" style="width:100%;" />
              <div class="play-icon"><svg width="60" height="42" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"> <g> <title>Videos</title> <g id="icomoon-ignore"/>
        <use x="5.397434" y="-68.326835" transform="matrix(0.15880563740596462,0,0,0.1590301359360811,-34.233496722840435,-44.6817534019825) " id="icon" xlink:href="#svg_1"/> <path id="svg_4" d="m24,8.380953l0.190475,22.761904l16.952381,-11.333332l-17.142857,-11.428572z" stroke-linecap="null" stroke-linejoin="null" stroke-width="5" stroke="null" fill="#ffffff"/> <path id="relleno" d="m24.285713,8.666666l0,22.666666l17.238094,-11.523809l-17.238094,-11.142857z" stroke-linecap="null" stroke-linejoin="null" stroke-width="5" stroke="null" fill="#ffffff"/> </g> <defs> <svg id="svg_1" viewBox="0 0 944 1024" height="1024" width="944" xmlns:xlink="http://www.w3.org/1999/xlink"> <g id="icomoon-ignore"/> <path id="play-svg" d="m589.426025,406.15799c0,-31.289978 -25.345032,-56.652985 -56.618042,-56.652985h-265.616974c-31.27301,0 -56.618011,25.359985 -56.618011,56.652985v151.894989c0,31.290039 25.345001,56.653015 56.618011,56.653015h265.616974c31.273987,0 56.618042,-25.361023 56.618042,-56.653015v-151.894989l0,0zm-227.311035,140.032013v-142.677002l108.192017,71.339996l-108.19101,71.339996l-0.001007,-0.002991z"/> </svg> </defs> </svg></div>    
            </div>';
           }
          else
           {
               echo '<img src="'.IMG_SRC.@$featured[1]->thumbURL.'" class="img-fluid" style="width:100%;" onerror="this.onerror=null;this.src=\'{IMAGENOTFOUND}\'" alt="'.@$featured[1]->title.'"/>';
           }
      ?>
    </a>
    <div class="header">
      <a href="<?=site_url('article/'.@$featured[1]->id.'/'.$this->assist->slugify(@$featured[1]->title)); ?>"><?=@$featured[1]->title; ?></a> 
    </div>

    <a href="<?=site_url('article/'.@$featured[2]->id.'/'.$this->assist->slugify(@$featured[2]->title)); ?>">
      <?php 
 
      if($relatedvideo[2]!=NULL)
           {

              echo '<div class="video">
              <img src="http://img.youtube.com/vi/'.$relatedvideo[2]->videoURL.'/hqdefault.jpg" class="img-fluid" style="width:100%;" />
              <div class="play-icon"><svg width="60" height="42" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"> <g> <title>Videos</title> <g id="icomoon-ignore"/>
        <use x="5.397434" y="-68.326835" transform="matrix(0.15880563740596462,0,0,0.1590301359360811,-34.233496722840435,-44.6817534019825) " id="icon" xlink:href="#svg_1"/> <path id="svg_4" d="m24,8.380953l0.190475,22.761904l16.952381,-11.333332l-17.142857,-11.428572z" stroke-linecap="null" stroke-linejoin="null" stroke-width="5" stroke="null" fill="#ffffff"/> <path id="relleno" d="m24.285713,8.666666l0,22.666666l17.238094,-11.523809l-17.238094,-11.142857z" stroke-linecap="null" stroke-linejoin="null" stroke-width="5" stroke="null" fill="#ffffff"/> </g> <defs> <svg id="svg_1" viewBox="0 0 944 1024" height="1024" width="944" xmlns:xlink="http://www.w3.org/1999/xlink"> <g id="icomoon-ignore"/> <path id="play-svg" d="m589.426025,406.15799c0,-31.289978 -25.345032,-56.652985 -56.618042,-56.652985h-265.616974c-31.27301,0 -56.618011,25.359985 -56.618011,56.652985v151.894989c0,31.290039 25.345001,56.653015 56.618011,56.653015h265.616974c31.273987,0 56.618042,-25.361023 56.618042,-56.653015v-151.894989l0,0zm-227.311035,140.032013v-142.677002l108.192017,71.339996l-108.19101,71.339996l-0.001007,-0.002991z"/> </svg> </defs> </svg></div>    
            </div>';
           }
          else
           {
               echo '<img src="'.IMG_SRC.@$featured[2]->thumbURL.'" class="img-fluid" style="width:100%;" onerror="this.onerror=null;this.src=\'{IMAGENOTFOUND}\'" alt="'.@$featured[2]->title.'"/>';
           }
      ?>
    </a>
    <div class="header">
      <a href="<?=site_url('article/'.@$featured[2]->id.'/'.$this->assist->slugify(@$featured[2]->title)); ?>"><?=@$featured[2]->title; ?></a> 
    </div>
  </div>
  
	    
  
<div class="col-lg-3 left-0 white-wrapper">
  <?php $this->view("poll"); ?>   
</div>
</div>
  
  
 <!--  <div class="container-fluid poll-section">
	<div class="container">
		<div class="col-lg-4 offset2 left-0"><img src="<? //base_url('assets/'); ?>img/vote.png" class="img-responsive" width="610" height="232" alt=""/></div>
	<div class="col-lg-7">
   
   
						</ul>
		
	</div>
    </div>
 </div> -->
  
 
	<div class="container zero-padding xs-margin">
  <h1>Presidential Candidates</h1>
</div>
<div class="container white-wrapper">
 
 <div class="col-lg-3 candidates candidates-xs-view">
    
    <div class="col-lg-12 col-xs-4"><a href="<?=site_url("profile/2001238730/uhuru-kenyatta"); ?>"><img src="<?=base_url('assets/'); ?>img/uhuru.jpg"  class="img-circle" alt=""/></a></div>
      <div class="col-lg-12 col-xs-8">
      <a href="<?=site_url("profile/2001238730/uhuru-kenyatta"); ?>"><h3>Uhuru Kenyatta</h3>
        <h4>Jubilee</h4>
        <h4>Flag Bearer</h4>
        </a>
     <!--  <h5><a href="#">DETAILS</a></h5> -->
      </div>
    <div class="clearboth"></div>
  
  </div>
  
  <div class="col-lg-3 candidates candidates-xs-view">
    
    <div class="col-lg-12 col-xs-4">
      <a href="<?=site_url("profile/2001238737/william-ruto"); ?>"><img src="<?=base_url('assets/'); ?>img/ruto.jpg"  class="img-circle" alt=""/></a>
    </div>
      <div class="col-lg-12 col-xs-8">
      <a href="<?=site_url("profile/2001238737/william-ruto"); ?>">
        <h3>William Ruto</h3>
        <h4>Jubilee</h4>
        <h4> Running Mate</h4>
        </a>
     <!--  <h5><a href="#">DETAILS</a></h5> -->
      </div>
    <div class="clearboth"></div>
  
  </div>
  
<div class="col-lg-3 candidates candidates-xs-view">
    
    <div class="col-lg-12 col-xs-4"><a href="<?=site_url("profile/2001238732/raila-amolo-odinga"); ?>"><img src="<?=base_url('assets/'); ?>img/raila.jpg"  class="img-circle" alt=""/></a></div>
      <div class="col-lg-12 col-xs-8">
      <a href="<?=site_url("profile/2001238732/raila-amolo-odinga"); ?>"><h3>Raila Odinga</h3>
        <h4>NASA </h4>
        <h4>Flag Bearer</h4>
        </a>
     <!--  <h5><a href="#">DETAILS</a></h5> -->
      </div>
    <div class="clearboth"></div>
  
  </div>
  
  <div class="col-lg-3 candidates candidates-xs-view">
    
    <div class="col-lg-12 col-xs-4">
      <a href="<?=site_url("profile/2001238736/kalonzo-musyoka"); ?>"><img src="<?=base_url('assets/'); ?>img/kalonzo.jpg"  class="img-circle" alt=""/></a>
    </div>
      <div class="col-lg-12 col-xs-8">
      <a href="<?=site_url("profile/2001238736/kalonzo-musyoka"); ?>">
        <h3>Kalonzo Musyoka</h3>
        <h4>NASA</h4>
        <h4>Running Mate</h4>
        </a>
     <!--  <h5><a href="#">DETAILS</a></h5> -->
      </div>
    <div class="clearboth"></div>
  
  </div>
 
 
</div>	
					
 
 
 <?php $this->view('desktop/modules/schedule'); ?>

 
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

