

<ul class="sidebar">
<?php
    foreach ($popular as $value) {
        # code...
  
        echo'<li>
        <div class="col-lg-5  col-xs-5 col-md-5">
        <a href="'.site_url('article/'.$value->id.'/'.$this->assist->slugify($value->title)).'"><img src="'.IMG_SRC.$value->thumbURL.'" class="img-responsive" width="150" height="150" alt="" style="height:150px width:150px;"/></a></div>
        <div class="col-lg-7 col-xs-7 col-md-7"><a href="'.site_url('article/'.$value->id.'/'.$this->assist->slugify($value->title)).'">'.$value->title.'</a></div>
        <div class="clearboth"></div>
        </li>';
    }
     ?>    
        
        </ul>
      

