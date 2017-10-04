<?php /**
* 

*/
class Poll extends CI_Controller 
	{ 	
		protected $ci;
		public $partnerGUID;
		public $usercode;
		function __construct()
			{
				$this->partnerGUID='2224e9b5-d1fe-69c8-53b8-0000197a58e4';
				$this->usercode='$P$B4FoZoiRu8s6n29h337eJaYTjof0tQ1';
				 $this->ci =& get_instance();
			}
		function vote($pollid,$answerid,$othertext="")
			{
				
           
             	$curl_data = json_encode( 
								array(
									"pdRequest" => array(
									"partnerGUID" => '0d57d76d-2458-00c8-a2de-000045592746', 
									"userCode" =>'$P$B0MqaAyG765NwuCIhUxCF8xtb8tcCt.',
									"demands" => array( 
									    "demand" => array(
									        "vote"=>array(
									            "answers_text"=>$answerid,
                                                "other_text"=>$othertext,
                                                "url"=>"",
                                                "ip"=>$this->ci->input->ip_address(),
                                                "tags"=>array(
									                       "tag"=>array(
									                           "name"=>"email",
									                           "value"=>"online@standardmedia.co.ke"
									                       )
									                   ),
                                                "poll_id"=>(int)$pollid,
                                                "widget_id"=>"0",
                                                
                                                "cookie"=>"1"
									                        ),
									        "id" => "vote" 
									                    ) 
									                ) 
									            )
									            ) 
									        );  
                //return $curl_data;
                return $this->send_json_query($curl_data);   
			}
		public function getpoll($pollid)
			{
                $curl_data = json_encode( 
        array( 
                "pdRequest" => array(
                    "partnerGUID" => $this->partnerGUID, 
                    "userCode" => '$P$B4FoZoiRu8s6n29h337eJaYTjof0tQ1', 
                    "demands" => array( 
                        "demand" => array(
                            "poll" => array( 
                                "id" => (int)$pollid 
                            ), 
                            "id" => "GetPoll"
                        ) 
                    ) 
                ) 
            ) 
        ); 
            
                return $this->send_json_query($curl_data);
			}
		public function getpollResults($pollid)
			{
				$curl_data = json_encode( 
									        array( 
									                "pdRequest" => array(
									                    "partnerGUID" => $this->partnerGUID, 
									                    "userCode" =>'$P$B4FoZoiRu8s6n29h337eJaYTjof0tQ1', 
									                    "demands" => array( 
									                        "demand" => array(
									                            "poll" => array( 
									                                "id" =>  (int)$pollid
									                            ), 
									                            "id" => "GetPollResults"
									                        ) 
									                    ) 
									                ) 
									            ) 
									        ); 
				return $this->send_json_query($curl_data);
			}
		function send_json_query($curl_data)
			{
			    $ch = curl_init();
			    curl_setopt( $ch, CURLOPT_URL, "https://api.polldaddy.com/" );
			    curl_setopt( $ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
			    curl_setopt( $ch, CURLOPT_POST, 1 );
			    curl_setopt( $ch, CURLOPT_RETURNTRANSFER, 1 );
			    curl_setopt( $ch, CURLOPT_POSTFIELDS, $curl_data );
			    $data = curl_exec( $ch );
			    curl_close( $ch );
			    return json_decode( $data );
			}
	}
	?>