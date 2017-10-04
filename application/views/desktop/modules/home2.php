<div class="container-fluid advert-inner">
    <div class="container">
        <div class="span10 offset2 ">
            <img src="<?=base_url('assets/'); ?>img/ad.png" class="img-responsive"  width="728" height="90" alt=""/>
        </div>
    </div>
</div>

<div class="container zero-padding down">

<div class="span6 left-0"> 
    <a href="<?=site_url('article/'.$featured[0]->id.'/'.$this->assist->slugify($featured[0]->title)); ?>">
	<img src="<?=IMG_SRC.$featured[0]->thumbURL; ?>" class="img-responsive" alt="" style='width:100%;'/>
	</a>
    <div class="header">
      <h2><a href="<?=site_url('article/'.$featured[0]->id.'/'.$this->assist->slugify($featured[0]->title)); ?>"><?=@$featured[0]->title; ?></a></h2>
    </div>
</div>
  <div class="span3"> <a href="<?=site_url('article/'.$featured[1]->id.'/'.$this->assist->slugify($featured[1]->title)); ?>"><img src="<?=@IMG_SRC.$featured[1]->thumbURL; ?>" class="img-responsive" alt=""/></a>
    <div class="header"> <a href="<?=site_url('article/'.$featured[1]->id.'/'.$this->assist->slugify($featured[1]->title)); ?>"><?=@$featured[1]->title; ?></a> </div>
    <a href="<?=site_url('article/'.$featured[2]->id.'/'.$this->assist->slugify($featured[2]->title)); ?>"><img src="<?=@IMG_SRC.$featured[2]->thumbURL; ?>" class="img-responsive" alt=""/></a>
    <div class="header"> <a href="<?=site_url('article/'.$featured[2]->id.'/'.$this->assist->slugify($featured[2]->title)); ?>"><?=@$featured[2]->title; ?></a> </div>
  </div>
  <div class="span3">
     <?php $this->view('desktop/modules/popular'); ?>
  </div>

    
</div>
<div class="container-fluid poll-section">
    <div class="container">
    <div class="span4 offset2 left-0"><img src="<?=base_url('assets/'); ?>img/vote.png" class="img-responsive" width="610" height="232" alt=""/></div>
    <div class="span7">
        <h1>Quick Poll</h1>
        What issue will guide your choice of candidate in the 2017 General Election?
        <div class="clearboth"></div>
        <ul class="voting">
            <li>
                <label class="radio">
                    <input type="radio" name="optionsRadios" id="optionsRadios2" value="option2">
                    Education
                </label>
            </li>
            <li>
                <label class="radio ">
                    <input type="radio" name="optionsRadios" id="optionsRadios2" value="option2">
                    Health
                </label>
            </li>
            <li>
                <label class="radio ">
                    <input type="radio" name="optionsRadios" id="optionsRadios2" value="option2">
                    Security
                </label>
            </li>
            <li>
                <label class="radio ">
                    <input type="radio" name="optionsRadios" id="optionsRadios2" value="option2">
                    Economy
                </label>
            </li>
            <li>
                <label class="radio">
                    <input type="radio" name="optionsRadios" id="optionsRadios2" value="option2">
                    Other
                </label>
            </li>
        </ul>
        <div class="clearboth"></div>
        <button class="btn btn-success" type="button">Send vote</button>
    </div>
</div>
</div>
<div class="container zero-padding">
    <h1>Nairobi Gubernatorial Candidates</h1>
</div>
<div class="container white-wrapper">
  <ul class="candidates">
    <li><img src="<?=base_url("assets/"); ?>img/avatar.jpg"  class="img-circle" alt=""/>
      <h3>A N Other</h3>
      <h4>Party</h4>
      <h5><a href="#">DETAILS</a></h5>
    </li>
    <li><img src="<?=base_url("assets/"); ?>img/avatar.jpg"  class="img-circle" alt=""/>
      <h3>A N Other</h3>
      <h4>Party</h4>
      <h5><a href="#">DETAILS</a></h5>
    </li>
    <li><img src="<?=base_url("assets/"); ?>img/avatar.jpg"  class="img-circle" alt=""/>
      <h3>A N Other</h3>
      <h4>Party</h4>
      <h5><a href="#">DETAILS</a></h5>
    </li>
    <li><img src="<?=base_url("assets/"); ?>img/avatar.jpg"  class="img-circle" alt=""/>
      <h3>A N Other</h3>
      <h4>Party</h4>
      <h5><a href="#">DETAILS</a></h5>
    </li>
    <li><img src="<?=base_url("assets/"); ?>img/avatar.jpg"  class="img-circle" alt=""/>
      <h3>A N Other</h3>
      <h4>Party</h4>
      <h5><a href="#">DETAILS</a></h5>
    </li>
  </ul>
</div>
<?php $this->view('desktop/modules/schedule'); ?>
<div class="container zero-padding title">
  <h1>Presidential Candidates</h1>
</div>
<div class="container white-wrapper">
  <ul class="candidates">
  
    <li><img src="<?=base_url("assets/"); ?>img/avatar.png"  class="img-circle" alt=""/>
      <h3>A N Other</h3>
      <h4>Party</h4>
      <h5><a href="#">DETAILS</a></h5>
    </li>
    <li><img src="<?=base_url("assets/"); ?>img/avatar.png"  class="img-circle" alt=""/>
      <h3>A N Other</h3>
      <h4>Party</h4>
      <h5><a href="#">DETAILS</a></h5>
    </li>
    <li><img src="<?=base_url("assets/"); ?>img/avatar.png"  class="img-circle" alt=""/>
      <h3>A N Other</h3>
      <h4>Party</h4>
      <h5><a href="#">DETAILS</a></h5>
    </li>
    <li><img src="<?=base_url("assets/"); ?>img/avatar.png"  class="img-circle" alt=""/>
      <h3>A N Other</h3>
      <h4>Party</h4>
      <h5><a href="#">DETAILS</a></h5>
    </li>
    <li><img src="<?=base_url("assets/"); ?>img/avatar.png"  class="img-circle" alt=""/>
      <h3>A N Other</h3>
      <h4>Party</h4>
      <h5><a href="#">DETAILS</a></h5>
    </li>
  </ul>
</div>
</body>