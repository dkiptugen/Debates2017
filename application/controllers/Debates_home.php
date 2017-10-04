<?php
class Debates_home extends CI_Controller
	{
		
		public function __construct()
			{
				parent::__construct();
				$this->load->library('user_agent');
				$this->load->model("article_model");
			}
        public function test()
            {
                echo FCPATH;
            }
		public function fbfeed()
			{
                $page_ID = '686823487999333';
    			$access_token = '1601457996848009|2a9e7b13e53438eef0f7c4ff0a665c5d';
    			$number_of_posts = '10';    
    			$fbpage = file_get_contents('https://graph.facebook.com/v2.7/'.$page_ID.'?fields=posts.limit('.$number_of_posts.'){full_picture,message,created_time,picture,permalink_url}&access_token='.$access_token);
               
               $fbdata = json_decode($fbpage);
               var_dump($fbdata->posts->data[0]);
			}
		public function vote($pollid,$answerid)
	       {    
	       	    $this->load->library("poll");
	            var_dump($this->poll->vote($pollid,$answerid,""));
     	   }
		public function add_count($slug)
        	{ 
                $this->load->helper('cookie'); // load cookie helper         
        		$check_visitor = $this->input->cookie(urldecode($slug), FALSE); // this line will return the cookie which has slug name        
                $ip = $this->input->ip_address(); // this line will return the visitor ip address 
        
        	
		        if ($check_visitor == false) 
		            { 
		                  $cookie = array( "name" => urldecode($slug), "value" => "$ip", "expire" => time() + 7200, "secure" => false ); 
		                  $this->input->set_cookie($cookie);
		                  $this->article_model->update_counter(urldecode($slug));
		            }
            } 
		public function home()
			{  
				$this->load->library("poll");
				
				
				$data["popular"]=$this->article_model->popular(6);
				try
					{   
						$data["poll"]=$this->poll->getpoll(9721716)->pdResponse->demands->demand[0]->poll;
						$data['featured']=$this->article_model->featured();
						$meta=array('title'=>" | Home","description"=>$data['featured'][0]->summary,"image"=>IMG_SRC.$data['featured'][0]->thumbURL,"keywords"=>str_replace(";", "", $data['featured'][0]->Keywords),"author"=>$data['featured'][0]->author,"publishdate"=>$data['featured'][0]->publishdate,"related"=>False,"category"=>$data['featured'][0]->name);
						$data['meta']=(object)$meta;
						$j=0;
						foreach ($data['featured'] as $value)
						   {
						   	    if($value->related_video!=0)
						   	      	{
						   	      		$data['relatedvideo'][$j]=$this->article_model->getVideo($value->related_video,$value->title);
						   	      	}
						   	    else
						   	    	{
						   	    		$data['relatedvideo'][$j]=NULL;
						   	    	}							    
								$j++;
						   }
                         //file_put_contents(FCPATH."application/logs/video.log","\n".date('dS-M-Y h:i:sa')." => dev: ".json_encode($data['featured']),FILE_APPEND);
						$data['videos']=$this->article_model->videos(array('NULL'),6);
						
						foreach($data['featured'] as $val){$featured=$val->id;}
                		$data['others']=$this->article_model->otherArticles($featured);
                		unset($featured);
						$data['view']='home';
						$this->load->view('desktop/structure',$data);
					}
				catch(Exception $e)
					{
                        file_put_contents(FCPATH."application/logs/home.log",'\n'.date('dS-M-Y h:i:sa')." => READ FAILURE: ".$e->getMessage(),FILE_APPEND);
					}
			}
		public function news()
			{
				try
					{   $meta=array('title'=>" | News","description"=>"Kenya's Official Presidential debates portal delivering latest Opinion polls, News, videos and livestream in collaboration with all Kenyan media houses","image"=>"http://www.debates.co.ke/assets/img/logo.png","keywords"=>"","author"=>"","publishdate"=>"","related"=>array(),"category"=>"");
						$data['meta']=(object)$meta;
						$data["popular"]=$this->article_model->popular(12);
						$data['others']=$this->article_model->otherArticles(array(1,2,3),8);
						$data['videos']=$this->article_model->videos(array('NULL'),6);
						$data['view']='news';
						$this->load->view('desktop/structure',$data);
						
					}
				catch(Exception $e)
					{
                        file_put_contents(FCPATH."application/logs/news.log",'\n'.date('dS-M-Y h:i:sa')." => READ FAILURE: ".$e->getMessage(),FILE_APPEND);
					}
			}
		public function about()
			{
				try
					{
						$meta=array('title'=>" | About Us","description"=>"Kenya's Official Presidential debates portal delivering latest Opinion polls, News, videos and livestream in collaboration with all Kenyan media houses","image"=>"http://www.debates.co.ke/assets/img/logo.png","keywords"=>"kenyan politics, debates, debates kenya, election 2017 , Election Kenya","author"=>"","publishdate"=>date('Y-m-d H:i:s'),"related"=>False,"category"=>False);
						$data['meta']=(object)$meta;
						$data["popular"]=$this->article_model->popular(6);
						$data['view']='about';
						$this->load->view('desktop/structure',$data);
						
					}
				catch(Exception $e)
					{
                        file_put_contents(FCPATH."application/logs/about.log",'\n'.date('dS-M-Y h:i:sa')." => READ FAILURE: ".$e->getMessage(),FILE_APPEND);
					}
			}
		public function viewArticle($id,$title)
			{
				$this->add_count($id);
				$data['mainArticle']=$this->article_model->getArticle($id,$title);
				if($data['mainArticle']->related_video!=0)
				  {
				  	$data['video']=$this->article_model->getVideo($data['mainArticle']->related_video,$title);
				  }
                $data['other']=$this->article_model->otherArticles(array($data['mainArticle']->id),12);
                $data['related']=$this->article_model->relatedArticles($data['mainArticle']->keywords,$data['mainArticle']->id,6);
				$data['relatedv']=$this->article_model->relatedvideos($data['mainArticle']->keywords,1,6);
                $meta=array('title'=>" | ".$title,"description"=>$data["mainArticle"]->summary,"image"=>IMG_SRC.$data['mainArticle']->thumbURL,"keywords"=>str_replace(";",",",$data['mainArticle']->Keywords),"author"=>$data['mainArticle']->author,"publishdate"=>$data['mainArticle']->publishdate,"related"=>$data['related'],"category"=>$data['mainArticle']->name);
				$data['meta']=(object)$meta;
                $data['view']='viewArticle';
                $this->load->view('desktop/structure',$data);
                   
			}
		public function media()
			{
				try
					{
						$data["popular"]=$this->article_model->popular(6);
						$data['others']=$this->article_model->pressRelease(8);
						$meta=array('title'=>" | Media","description"=>"Kenya's Official Presidential debates portal delivering latest Opinion polls, News, videos and livestream in collaboration with all Kenyan media houses","image"=>"","keywords"=>"media briefs, political debates","author"=>"debates media Ltd","publishdate"=>"","related"=>False,"category"=>False);
						$data['meta']=(object)$meta;
						$data['view']='media';
						$this->load->view('desktop/structure',$data);
						
					}
				catch(Exception $e)
					{
						$this->output->set_output($e->getMessage());
                        file_put_contents(FCPATH."application/logs/media.log",'\n'.date('dS-M-Y h:i:sa')." => READ FAILURE: ".$e->getMessage(),FILE_APPEND);
					}
			}
		public function livestream()
			{
				try
					{
						$meta=array('title'=>" | Livestream","description"=>"Kenya's Official Presidential debates portal delivering latest Opinion polls, News, videos and livestream in collaboration with all Kenyan media houses","image"=>"http://www.debates.co.ke/assets/img/logo.png","keywords"=>"livestream,kenyan politics, election 2017","author"=>"debates media limited","publishdate"=>date("Y-m-d H:i:s"),"related"=>FALSE,"category"=>FALSE);
						$data['meta']=(object)$meta;
						$data['view']='livestream';
						$this->load->view('desktop/structure',$data);
						
					}
				catch(Exception $e)
					{
                        file_put_contents(FCPATH."application/logs/livestream.log",'\n'.date('dS-M-Y h:i:sa')." => READ FAILURE: ".$e->getMessage(),FILE_APPEND);
					}
			}
        public function viewVideo($id,$title)
            {
				
                $data['main_video']=$this->article_model->getVideo($id,$title);
                $meta=array('title'=>" | ".$title,"description"=> $data['main_video']->description,"image"=>"http://img.youtube.com/vi/".$data['main_video']->videoURL."/hqdefault.jpg","keywords"=>$data['main_video']->keywords,"author"=>$data['main_video']->author,"publishdate"=>$data['main_video']->publishdate,"related"=>FALSE,"category"=>FALSE);
				$data['meta']=(object)$meta;
                $data['other']=$this->article_model->videos(array($data['main_video']->id),12);
                $data['related']=$this->article_model->relatedVideos($data['main_video']->keywords,$data['main_video']->id);
                $data['view']='viewVideo';
                $this->load->view('desktop/structure',$data);
            }
        public function videos()
            {
                try
                {
                   
                    $data['featured']=$this->article_model->featuredVideos();
                     $meta=array('title'=>" | Videos","description"=>"Kenya's Official Presidential debates portal delivering latest Opinion polls, News, videos and livestream in collaboration with all Kenyan media houses","image"=>"http://www.debates.co.ke/assets/img/logo.png","keywords"=>"political debates, debates 2017","author"=>"","publishdate"=>"","related"=>array(),"category"=>"");
					$data['meta']=(object)$meta;
                    foreach($data['featured'] as $val){$featured=$val->vid;}
                    $data['videos']=$this->article_model->videos($featured,12);
                    unset($featured);
                    $data['view']='videos';
                    $this->load->view('desktop/structure',$data);
                   
                }
                catch(Exception $e) {
                    file_put_contents(FCPATH . "application/logs/videos.log", '\n' . date('dS-M-Y h:i:sa') . " => READ FAILURE: " . $e->getMessage(), FILE_APPEND);
                }
            }
       
		public function readrss($site,$countz)
			{
				try{
                      if($site=='standard')
                        {
                            $readrss=@simplexml_load_file('http://www.standardmedia.co.ke/rss/election.php');
                            $y='<ul class="news-list">';
					   
							if(is_object($readrss->channel->item)):
							   $count=0;
		                        foreach ($readrss->channel->item as  $value)
		                        	{		                        
								      $y.='<li class="standard-digital">
										<h4>'.date('dS M Y h:i a',strtotime($value->pubDate)).'</h4>							
										<h3><a href="'.$value->link.'">'.$value->title.'</a></h3>
										'.$value->description.'
								        </li>';
								$count++;
								if($count==$countz)break;
							}
							endif;						
								
							$y.='</ul>';
							$this->output->set_output($y);
                        }
                      elseif($site=='nation')
                      	{
                            $readrss=@simplexml_load_file('http://www.nation.co.ke/latestrss.rss');
                            $y='<ul class="news-list">';
					   
							if(is_object($readrss->channel->item)):
							   $count=0;
		                        foreach ($readrss->channel->item as  $value)
		                        	{		                        
								      $y.='<li class="ntv">
										<h4>'.date('dS M Y h:i a',strtotime($value->pubDate)).'</h4>							
										<h3><a href="'.$value->link.'">'.$value->title.'</a></h3>
										'.$this->removeimg($value->description).'
								        </li>';
								$count++;
								if($count==$countz)break;
							}
							endif;						
								
							$y.='</ul>';
							$this->output->set_output($y);
                      	}
                      elseif($site=='citizen')
                        {
                            $readrss=@simplexml_load_file('https://citizentv.co.ke/feed/?type=news');
                            $y='<ul class="news-list">';
					   
							if(is_object($readrss->channel->item)):
							   $count=0;
		                        foreach ($readrss->channel->item as  $value)
		                        	{
		                        		if($value->title!="")	
		                        			{
		                        				$y.='<li class="citizen">
													<h4>'.date('dS M Y h:i a',strtotime($value->pubDate)).'</h4>							
													<h3><a href="'.$value->link.'">'.$value->title.'</a></h3>
													'.$this->removeimg($value->description).'
								        			</li>';
												$count++;
												if($count==$countz)break;
		                        			}	                        
								      
									}
							endif;						
								
							$y.='</ul>';
							$this->output->set_output($y);
                        }
				    }
				catch(Exception $e)
				    {
                        file_put_contents(FCPATH."application/logs/related-article.log",'\n'.date('dS-M-Y h:i:sa')." => READ FAILURE: ".$e->getMessage(),FILE_APPEND);
				    }
			}
		public function mobilerss()
			{
				error_reporting(E_ALL);
				ini_set('display_errors',1);
				 $v=0;
				$citizen=@simplexml_load_file('https://citizentv.co.ke/feed/?type=news');
			    
			 	foreach($citizen->channel->item as $u) 
					{			       
			       		$title="{$u->title}"; 
			       		$link="{$u->link}";
			       		$pubdate= "{$u->pubDate}";			       
			       		$descr="{$u->description}";   
			        
			    		$src = array();
			    		preg_match( '/src="([^"]*)"/i',  $descr, $src) ;
			    
			    		if($src)
			    			{
			    				$img=$src[1];
			    			}
			    		else
			    			{			    
			     				 $img="https://upload.wikimedia.org/wikipedia/en/7/70/Citizen_TV_%28Kenya%29_logo.png";
			    			}
			 
			       
			                      
			       $newsArray[$v]= array(
			                    'id' => 0,
			                    'category_id' => 1,
			                    'keywords' => "",
			                    'title' =>$title,
			                    'media'=>"citizen",
			                    'summary' => $u->description,
			                    'story' => "",
			                    'image_url' => $img,
			                    'link' => $link,
			                    'updateddate' => date('dS M Y h:i a',strtotime($pubdate)),
			                    'publishdate' => date('dS M Y h:i a',strtotime($pubdate)),
			                    'livestream' =>"xxxx"
			                     
			                );
			                        
			              $v+=1;      
			                 
						}
				$nation=@simplexml_load_file('https://www.nation.co.ke/latestrss.rss');
			    
			 	foreach($nation->channel->item as $u) 
					{			       
			       		$title="{$u->title}"; 
			       		$link="{$u->link}";
			       		$pubdate= "{$u->pubDate}";			       
			       		$descr="{$u->description}";   
			        
			    		$src = array();
			    		preg_match( '/src="([^"]*)"/i',  $descr, $src) ;
			    
			    		if($src)
			    			{
			    				$img=$src[1];
			    			}
			    		else
			    			{			    
			     				 $img="http://sokodirectory.com/wp-content/uploads/2015/08/nation-media-group.png";
			    			}
			 
			       
			                      
			       $newsArray[$v]= array(
			                    'id' => 0,
			                    'category_id' => 1,
			                    'keywords' => "",
			                    'title' =>$title,
			                    'media'=>"ntv",
			                    'summary' => $u->description,
			                    'story' => "",
			                    'image_url' => $img,
			                    'link' => $link,
			                    'updateddate' => date('dS M Y h:i a',strtotime($pubdate)),
			                    'publishdate' => date('dS M Y h:i a',strtotime($pubdate)),
			                    'livestream' =>"xxxx"
			                     
			                );
			                        
			              $v+=1;      
			                 
						}		
				$standard=@simplexml_load_file('https://www.standardmedia.co.ke/rss/election.php');
			    
			 	foreach($standard->channel->item as $u) 
					{			       
			       		$title="{$u->title}"; 
			       		$link="{$u->link}";
			       		$pubdate= "{$u->pubDate}";			       
			       		$descr="{$u->description}";   
			        
			    		$src = array();
			    		preg_match( '/src="([^"]*)"/i',  $descr, $src) ;
			    
			    		if($src)
			    			{
			    				$img=$src[1];
			    			}
			    		else
			    			{			    
			     				 $img="<?=base_url('assets'); ?>/img/standard.png";
			    			}
			 
			       
			                      
			       $newsArray[$v]= array(
			                    'id' => 0,
			                    'category_id' => 1,
			                    'keywords' => "",
			                    'title' =>$title,
			                    'media'=>"standard-digital",
			                    'summary' => $u->description,
			                    'story' => "",
			                    'image_url' => $img,
			                    'link' => $link,
			                    'updateddate' => date('dS M Y h:i a',strtotime($pubdate)),
			                    'publishdate' => date('dS M Y h:i a',strtotime($pubdate)),
			                    'livestream' =>"xxxx"
			                     
			                );
			                        
			              $v+=1;      
			                 
						}		 
			 shuffle($newsArray);
			 //echo $newsArray[0]['title'];
			 //print_r($newsArray);

			 $y='<ul class="news">';
			 $j=0;
	        foreach($newsArray as $value)
	       		{
	       			if($value['title']!="")
	       				{
	       					$med=($value['media']=='ntv')?'Nation':$value['media'];
	       					$y.='<li class="'.$value['media'].'">
	       							<a href="'.$value['link'].'">
							
										<h2>By '.$med.' - '.date('D dS M, Y ', strtotime($value['publishdate'])).'</h2>
										<h1>'.$value['title'].'</h1>
										<h3 style="color:black; margin:10px 5px;">'.$this->removeimg($value['summary']).'</h3>
										<div class="clearfix"></div></a>
										</li><div class="clearfix"></div>';

							$j++;
							if($j==15) break;
	       				}
					
				}
			$y.='</ul>';
			echo $y;
		}
	}

?>