<div class="container ">
    <div class="span8 left-0 ">
      <ul class="news">
        <?php
      	foreach ($others as $value) {
                  # code...
           
            echo'<li class="newsfeed white">
      		    <div class="row">
      	                  <figure class="span2 ">
      	     	                 <img src="'.IMG_SRC.$value->thumbURL.'" alt="">
      	                  </figure>
      	                  <div class="span6 left-0">
      			         <h2>'.$value->title.'</h2>
      			         
      		            </div>
      		      <div class="clearfix"></div>
      		      </div>
      	      </li>';
                  }
      	?>
      </ul>			
    </div>			
	<div class="span3 left-1 right-0 white sidebar">
	<h2 >Popular Stories</h2>
	 <ul class='side'>
	 	<li>
	 		<a href="#">
		 	  <h3>ODM party primaries fiasco could have negative impact for the party come August</h3>
		 	</a>
		 	<p><strong class='text text-left'>Author</strong><strong class="text text-right">29 <sup>th</sup> Sep 2016</strong></p>
	 	</li>
	 	<li>
	 		<a href="#">
		 	  <h3>ODM party primaries fiasco could have negative impact for the party come August</h3>
		 	</a>
		 	<p><strong class='text text-left'>Author</strong><strong class="text text-right">29 <sup>th</sup> Sep 2016</strong></p>
	 	</li>
	 	<li>
	 		<a href="#">
		 	  <h3>ODM party primaries fiasco could have negative impact for the party come August</h3>
		 	</a>
		 	<p><strong class='text text-left'>Author</strong><strong class="text text-right">29 <sup>th</sup> Sep 2016</strong></p>
	 	</li>
	 	<li>
	 		<a href="#">
		 	  <h3>ODM party primaries fiasco could have negative impact for the party come August</h3>
		 	</a>
		 	<p><strong class='text text-left'>Author</strong><strong class="text text-right">29 <sup>th</sup> Sep 2016</strong></p>
	 	</li>
	 	

	 </ul>	
	</div>				
				
				
			
					

			
</div>



<?php $this->view('desktop/modules/schedule'); ?>