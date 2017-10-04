<?php
class Article_model extends CI_Model
	{
		public function __construct()
			{
				parent::__construct();
			}
		public function featured($limit=6)
			{
				$this->db->select("std_article.thumbURL,std_article.id,std_article.title,std_article.publishdate,std_category.name,std_category.id as catid,related_video")
						 ->join("std_category","std_category.id=std_article.categoryid")
				         ->where('source','debates')
						 ->where("std_article.inactive is NULL")
						 ->where("std_category.name","News")
				         ->order_by('std_article.publishday','desc')
				         ->order_by('std_article.homepagelistorder','Asc')
				         ->order_by('std_article.listorder','Asc')				         
				         ->limit($limit);
				$dbh=$this->db->get('std_article');
				$data=$dbh->result();
				$rows=$dbh->num_rows();
				if($rows<$limit)
				  {
					  $limit=$limit-$rows;
					  $this->db->select("std_article.thumbURL,std_article.id,std_article.title,std_article.publishdate,std_category.name,std_category.id as catid,related_video")
						 ->join("std_category","std_category.id=std_article.categoryid")
				         ->where('source','main')
						     ->where("std_article.inactive is NULL")
				         ->like('Keywords', 'election')
				         ->order_by('std_article.publishday','desc')
				         ->order_by('std_article.homepagelistorder','Asc')
				         ->order_by('std_article.listorder','Asc')				         
				         ->limit($limit);
				    $dbh=$this->db->get('std_article');
				    $data=array_merge($data,$dbh->result());
				  }
				$rows=$dbh=NULL;
				return $data;         
			}
		public function getArticle($id,$title)
            {
                $this->db->where("inactive is null")				         
						 //->where('source',SOURCE)
                         ->where('id',$id);
                $dbh=$this->db->get('std_article');
                if($dbh!=false)
                    {
                        return $dbh->row();
                    }
            }
    public function pressRelease($limit)
      {
          $this->db->select("thumbURL,std_article.id,title,std_article.publishdate")
                   ->join("std_category","std_category.id=std_article.categoryid")
                   ->where('source',SOURCE)
                   ->where('std_category.shortname','PressRelease')
                   ->where("std_article.inactive is NULL")
                   ->order_by('publishday','desc')
                   ->limit($limit);
          $dbh=$this->db->get('std_article');
          if($dbh!=false)
            {
              return $dbh->result();
            }
      }
   
    public function update_counter($slug) 
      { 
        date_default_timezone_set('Africa/Nairobi');
        $cut_of_date = date('Y-m-d');
        $current_date_time = date('Y-m-d H:i:s');
        $max_std_trend_time = date('Y-m-d H:i:s', mktime(date('H'), date('i') - 10, 0, date('m'), date('d'), date('Y')));
        $id = $slug;
        //$id = mysql_real_escape_string($id);
        $this->db->where('std_article_hits_id',$id)
                 ->where("std_article_hits_date",$cut_of_date);// return current article views 
        $count = $this->db->get('std_article_hits')->row();
        if($this->db->get('std_article_hits')->num_rows()>0) 
          {
            $this->db->where('std_article_hits_id',$id);// then increase by one 
            $this->db->set('std_article_hits', ($count->std_article_hits + 1)); 
            $this->db->update('std_article_hits'); 
          }
        else
          {
             $data=array("std_article_hits_article_id"=>$id,"std_article_hits"=>1,"std_article_hits_date"=>$cut_of_date);
            $this->db->insert('std_article_hits',$data); 
          } 
        $this->db->where("std_trend_timestamp <=",$max_std_trend_time);
        $this->db->delete('std_article_trends');
        $this->db->insert('std_article_trends',array("std_trend_article_id"=>$id,"std_trend_hits"=>1,"std_trend_timestamp"=>$current_date_time)); 
      } 
    public function popular($limit=15)
          {
            try
               {
                  $this->db->select("std_article.id,std_article.title,std_article.publishdate,std_article.thumbURL,std_article.thumbcaption,std_article.createdby,std_article.author");
                  $this->db->from("std_article");
                  $this->db->join("std_article_hits","std_article.id=std_article_hits.`std_article_hits_article_id`");
                  $this->db->join("std_category","std_category.id=std_article.categoryid");
                  $this->db->where("std_category.name !='political profiles' ");
                  $this->db->where("source",'debates');
                  //$this->db->order_by("publishday",'DESC');
                  $this->db->where('std_article.inactive is null');
                  $this->db->order_by("std_article_hits","DESC");
                  $this->db->limit($limit);
                  $dbh=$this->db->get();
                  if($dbh!=false)
                    {
                      return $dbh->result();
                    }
                  else
                    {
                      $this->popular();
                    }
                }
            catch(Exception $e)
                {

                }
          }
        public function getVideo($id,$title)
            {
                //$this->db->where("inactive is null")

				         $this->db->select('*,concat(firstname," ",lastname) as author')
                          ->join('um_user','um_user.id=ktn_video.updatedby')
						              ->where('ktn_video.id',$id);
                $dbh=$this->db->get('ktn_video');
                if($dbh!=false)
                    {
                        return $dbh->row();
                    }
            }
		public function videos($fe,$limit)
			{
				$this->db->select('title,ktn_video.id as vid,videoURL,ktn_video.title,ktn_video.listorder,date_format(ktn_video.publishdate,"%Y-%m-%d") as publishday,ktn_video.description,ktn_video.publishdate,ktn_video.Keywords ,concat(firstname," ",lastname) as author')
                    ->join('ktn_video_category','ktn_video_category.id=ktn_video.categoryid')
					          ->join('ktn_video_type','ktn_video_type.id=ktn_video_category.videotypeid')
                    ->join('um_user','um_user.id=ktn_video.createdby')
                    //->where('ktn_video.inactive is NULL')
                    //->where('video_ready','Y')
                    ->where('ktn_video_type.name','Debates')
					          ->where_not_in('ktn_video.id',$fe)
                    ->order_by("publishday","DESC")
                    ->order_by('listorder','ASC')
                    ->limit($limit);
        $dbh=$this->db->get('ktn_video');
				$rows=$dbh->num_rows();
				$data=$dbh->result();
				if($rows<$limit)
					{
						$limit=$limit-$rows;
						$this->db->select('title,ktn_video.id as vid,videoURL,ktn_video.title,ktn_video.listorder,date_format(publishdate,"%Y-%m-%d") as publishday,description,ktn_video.publishdate,ktn_video.Keywords ,concat(firstname," ",lastname) as author')
								->from('ktn_video')
								->join('ktn_video_category','ktn_video_category.id=ktn_video.categoryid')
								->join('um_user','um_user.id=ktn_video.createdby')
                //->where('video_ready','Y')

								//->where('ktn_video.inactive is NULL')
								->where('name','Checkpoint')
								->where_not_in('ktn_video.id',$fe)
								->like('Keywords', 'election')
								->limit($limit);
						$dbh=$this->db->get();
						$data=array_merge($data,$dbh->result());
					}
				return $data;
          		
			}
        public function relatedVideos($keywords,$id,$limit=5)
            {
                $array_like = explode(';', $keywords);
                $like_statements = array();
                foreach($array_like as $value) {
                    $like_statements[] = "keywords LIKE '%" . $this->add_slash($value) . "%'";
                }

                $like_string = "(" . implode(' OR ', $like_statements) . ")";
                $this->db->where($like_string)
                         ->where_not_in('id',$id)
                         ->where('video_ready','Y')
                         ->limit($limit);
                $dbh=$this->db->get("ktn_video");
                if($dbh!=false)
                    {
                        return $dbh->result();
                    }
            }
         public function add_slash($string)
          {
                  return str_replace("'","\'", $string);
          }
        public function relatedArticles($keywords,$id,$limit=5)
            {
                 $array_like = explode(';', $keywords);
                 $like_statements = array();
                foreach($array_like as $value) {
                    $like_statements[] = "keywords LIKE '%" . $this->add_slash($value) . "%'";
                }

                $like_string = "(" . implode(' OR ', $like_statements) . ")";
                $this->db->where($like_string)
				         ->where("inactive is null")
						// ->where("source",SOURCE)
                         ->where_not_in('id',$id)
                         ->limit($limit);
                $dbh=$this->db->get("std_article");
                if($dbh!=false)
                    {
                        return $dbh->result();
                    }
            }
        public function featuredVideos($limit=6)
            {
				
                $this->db->select('title,ktn_video.id as vid,videoURL,ktn_video.title,ktn_video.listorder,date_format(ktn_video.publishdate, "%Y-%m-%d") as publishday,ktn_video.description,ktn_video.publishdate,ktn_video.Keywords,concat(firstname," ",lastname) as author')
                    ->from('ktn_video')
                    ->join('ktn_video_category','ktn_video_category.id=ktn_video.categoryid')
					          ->join('ktn_video_type','ktn_video_type.id=ktn_video_category.videotypeid')
                    ->join('um_user','um_user.id=ktn_video.createdby')
                    ->where('ktn_video.video_ready','Y')
                    //->where('ktn_video.inactive is NULL')
                    ->where('ktn_video_type.name','Debates')
                    ->order_by("publishday","DESC")
                    ->order_by('listorder','ASC')
                    ->limit($limit);
                $dbh=$this->db->get();
				$rows=$dbh->num_rows();
				$data=$dbh->result();
				if($rows<$limit)
					{
						$limit=$limit-$rows;
						$this->db->select('title,ktn_video.id as vid,videoURL,ktn_video.title,ktn_video.listorder,date_format(ktn_video.publishdate,"%Y-%m-%d") as publishday,ktn_video.description,ktn_video.publishdate,ktn_video.Keywords,concat(firstname," ",lastname) as author')
								->from('ktn_video')
								->join('ktn_video_category','ktn_video_category.id=ktn_video.categoryid')
                ->join('um_user','um_user.id=ktn_video.createdby')
								->where('video_ready','Y')
								//->where('ktn_video.inactive is NULL')
								->where('name','Checkpoint')
								->like('Keywords', 'election')
								->order_by("publishday","DESC")
								->order_by('listorder','ASC')
								->limit($limit);
						$dbh=$this->db->get();
						$data=array_merge($data,$dbh->result());
					}
                
                return $data;
                
            }
		public function otherArticles($featured,$limit=12)
		    {
				$this->db->select("std_article.thumbURL,std_article.id,std_article.title,std_article.publishdate,std_category.name,std_category.id as catid,related_video")
						 ->join("std_category","std_category.id=std_article.categoryid")
				         ->where('source','debates')
						 ->where("std_article.inactive is NULL")
						 ->where("std_category.name","News")
						 ->where_not_in('std_article.id',$featured)
				         ->order_by('std_article.publishday','desc')			         
				         ->limit($limit);
				$dbh=$this->db->get('std_article');
				$data=$dbh->result();
				$rows=$dbh->num_rows();
				if($rows<$limit)
				  {
					  $limit=$limit-$rows;
					 $this->db->select("std_article.thumbURL,std_article.id,std_article.title,std_article.publishdate,std_category.name,std_category.id as catid")
							  ->join("std_category","std_category.id=std_article.categoryid")
							  ->where('source','main')
							 ->where("std_article.inactive is NULL")
							 ->where_not_in('std_article.id',$featured)
							 ->like('std_article.Keywords', 'election')
							 ->order_by('std_article.publishday','desc')
							 ->limit($limit);
				    $dbh=$this->db->get('std_article');
					$data=array_merge($data,$dbh->result());
				  }
				
			    return $data;
          			
		    }
	}