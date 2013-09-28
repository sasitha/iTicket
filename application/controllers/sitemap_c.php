<?php
    //phpinfo();
   /**
    * 
    */
   class sitemap_c extends CI_Controller {
   
   public $film_hall_id = 1;    
       function index(){
       	$this->load->model("ticket_m");
		$seats['prices'] = $this->ticket_m->get_prices(1);//accea to hall id 1
		$seats['locat']= $this->ticket_m->get_locations(1);
		$seats['filmhall']=$this->ticket_m->get_filmhall(1);
		$seats['showtims']=$this->ticket_m->get_showtime(1);
       	$this->load->view("v_s_map",$seats);
		//$this->load->view("dbhelper",$seats);
       }
	   
	   function check_hall(){
	   	
	   		$f_h_i = $this->film_hall_id;
	   		$date = $this->input->post("select_date");
			$time = $this->input->post("select_time");
	   		//$value = "name";
	   		$this->load->model("ticket_m");
	   		//$seats['book'] 
			$res =  $this->ticket_m->get_book_seats($f_h_i,$date,$time);
			//echo sizeof($res);
			if(sizeof($res)>0){
				$send_back_data = array();
				// result to array		
				foreach ($res as $value) {
    				foreach ($value as $cs){
    					array_push($send_back_data,$cs);
    				}
				}
				echo implode("Xx",$send_back_data);
			}else{
				echo "no data";
			}
			//echo ($rr);
			//}
			//echo $date.$time.$value.$f_h_i;
			//echo $date;
	   		//return $value;
	   }
   }
   
?>