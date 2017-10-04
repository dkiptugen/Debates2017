<?php
class Rss extends CI_Controller
	{
		protected $appid;
		protected $pass;
		public function __construct()
			{
				parent::__construct();
				$this->load->model("article_model");
				$this->pass="test360";
			}
		public function article($pass,$id)
			{
								
				if($this->pass===$pass)
				  {
						
						//Debates_home::add_count($id);
						$data['mainArticle']=$this->article_model->getArticle($id,"mobile");
						if($data['mainArticle']!==NULL)
							{
								if($data['mainArticle']->related_video!=0)
									{
										$data['video']=$this->article_model->getVideo($data['mainArticle']->related_video,"mobile");
									}
								$data['otherArticles']=$this->article_model->otherArticles(array($data['mainArticle']->id),12);
								$data['relatedAticles']=$this->article_model->relatedArticles($data['mainArticle']->keywords,$data['mainArticle']->id,6);
								$data['relatedVideos']=$this->article_model->relatedvideos($data['mainArticle']->keywords,1,6);
								$resp= array(
										'status' => 1,
										'message' => 'success',
										'data' => json_encode($data)
										
									);
							}
						else
							{
								$resp= array(
										'status' => 0,
										'message' => 'fail',
										'data' => 'Invalid article Id'
										
									);
							}
						
				    }
				else
					{
						$resp= array(
										'status' => 0,
										'message' => 'fail',
										'data' => 'Password does not match'
										
									);
					}					
				 header('Content-type: application/json'); 
                 echo json_encode($resp);  
			}
		public function homepage($pass)
			{
				
				
				try
					{   
						
						$this->load->library("poll");

						if($this->pass===$pass)
				          	{   
				          		$data["popular"]=$this->article_model->popular(6);
								$data["poll"]=$this->poll->getpoll(9721716)->pdResponse->demands->demand[0]->poll;
								$data['featured']=$this->article_model->featured();
								$data['videos']=$this->article_model->videos(array('NULL'),4);
								foreach($data['featured'] as $val){$featured=$val->id;}
		                		$data['others']=$this->article_model->otherArticles($featured);
		                		unset($featured);
		                		$resp= array(
										'status' => 1,
										'message' => 'success',
										'data' => json_encode($data)
										
									);
		                	}
						else
							{
								$resp= array(
												'status' => 0,
												'message' => 'fail',
												'data' => 'Password does not match'
												
											);
							}					
				 header('Content-type: application/json'); 
                 echo json_encode($resp);  
						
					}
				catch(Exception $e)
					{
                        file_put_contents(FCPATH."application/logs/home.log",'\n'.date('dS-M-Y h:i:sa')." => READ FAILURE: ".$e->getMessage(),FILE_APPEND);
					}
			}
		public function news($pass)
			{
				try
					{  
						if($this->pass===$pass)
				          	{   
								$data['News']=$this->article_model->otherArticles(array(1,2,3),8);
								$data["popular"]=$this->article_model->popular(12);						
								$data['videos']=$this->article_model->videos(array('NULL'),6);
							    	$resp= array(
										'status' => 1,
										'message' => 'success',
										'data' => json_encode($data)
										
									);
		                	}
						else
							{
								$resp= array(
												'status' => 0,
												'message' => 'fail',
												'data' => 'Password does not match'
												
											);
							}					
						 header('Content-type: application/json'); 
		                 echo json_encode($resp);  
						
						
					}
				catch(Exception $e)
					{
                        file_put_contents(FCPATH."application/logs/news.log",'\n'.date('dS-M-Y h:i:sa')." => READ FAILURE: ".$e->getMessage(),FILE_APPEND);
					}
			}
		public function videos($pass)
            {
                try
                {
                    
					if($this->pass===$pass)
				        { 
		                    $data['featuredVideo']=$this->article_model->featuredVideos();
		                    foreach($data['featured'] as $val){$featured=$val->vid;}
		                    $data['Othervideos']=$this->article_model->videos($featured,12);
		                    unset($featured);
                            $resp= array(
										'status' => 1,
										'message' => 'success',
										'data' => json_encode($data)
										
									);
		                	}
						else
							{
								$resp= array(
												'status' => 0,
												'message' => 'fail',
												'data' => 'Password does not match'
												
											);
							}					
					header('Content-type: application/json'); 
	                echo json_encode($resp);  
                   
                }
                catch(Exception $e) {
                    file_put_contents(FCPATH . "application/logs/videos.log", '\n' . date('dS-M-Y h:i:sa') . " => READ FAILURE: " . $e->getMessage(), FILE_APPEND);
                }
            }
        public function viewVideo($pass,$id,$title="mobile")
            {
				        if($this->pass===$pass)
				          	{  
				                $data['main_video']=$this->article_model->getVideo($id,$title);
				                if($data['main_video']===NULL)
				          	       {  
						                $data['otherVideos']=$this->article_model->videos(array($data['main_video']->id),12);
						                $data['relatedVideos']=$this->article_model->relatedVideos($data['main_video']->keywords,$data['main_video']->id);
						                $resp= array(
													'status' => 1,
													'message' => 'success',
													'data' => json_encode($data)
													
												);
						            }    
						        else
									{
										$resp= array(
														'status' => 0,
														'message' => 'fail',
														'data' => 'invalid id'
														
													);
									}	
		                	}
						else
							{
								$resp= array(
												'status' => 0,
												'message' => 'fail',
												'data' => 'Password does not match'
												
											);
							}					
				 header('Content-type: application/json'); 
                 echo json_encode($resp);  
            }
        public function livestream($pass)
			{
				try
					{
						if($this->pass===$pass)
				          	{ 
								$data['link']='https://www.youtube.com/embed/live_stream?channel=UCKVsdeoHExltrWMuK0hOWmg&autoplay=1';
								$this->load->view('desktop/structure',$data);
						        $resp= array(
										'status' => 1,
										'message' => 'success',
										'data' => json_encode($data)
										
									);
		                	}
						else
							{
								$resp= array(
												'status' => 0,
												'message' => 'fail',
												'data' => 'Password does not match'
												
											);
							}					
						header('Content-type: application/json'); 
		                echo json_encode($resp); 
					}
				catch(Exception $e)
					{
                        file_put_contents(FCPATH."application/logs/livestream.log",'\n'.date('dS-M-Y h:i:sa')." => READ FAILURE: ".$e->getMessage(),FILE_APPEND);
					}
			}
	}