<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
//
    //phpinfo();
   /**
    * 
    */
   class sitemap_c extends CI_Controller {
   
   private $film_hall_id = 1; 
   private $film_id = 1;   
       function index(){
       	$this->load->model("ticket_m");
		$seats['prices'] = $this->ticket_m->get_prices(1);//accea to hall id 1
		$seats['locat']= $this->ticket_m->get_locations(1);
		$seats['filmhall']=$this->ticket_m->get_filmhall(1);
		$seats['showtims']=$this->ticket_m->get_showtime(1);
		$this->load->view("header");
       	$this->load->view("v_s_map",$seats);
		$this->load->view("footer");
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
				echo implode("#",$send_back_data);
			}else{
				echo "no data";
			}
	   }
		
		function book_ticket(){
			$f_h_i = $this->film_hall_id;
			$flm_id =$this->film_id;
			$b_date = $this->Escape($this->input->post("b_date"));
			$b_time = $this->Escape($this->input->post("b_time"));
			$b_seats_arr = $this->input->post("b_s_arr");
			$cl_mail = $this->Escape($this->input->post("cl_m"));
			$cl_nic = $this->Escape($this->input->post("cl_nic"));
			$cl_news = $this->input->post("cl_nl");
			$price = $this->Escape($this->input->post("cl_price"));
			$sep = '<br>';
			/*
			 * need to add serverside validation
			 * 
			 * 
			 * 
			 */
			//load model
			$this->load->model("ticket_m");
			if($cl_news == 'true'){
				$this->ticket_m->add_to_mail_list($cl_mail);
			}
			if($this->ticket_m->check_availability($f_h_i,$b_time,$b_date,$b_seats_arr)){
				echo "please ckeck availabitily before book seat";
			}else{
				$this->load->model('qr_model');
				$qr_data['data'] = $this->qr_model->create_qr_data($cl_mail,$cl_nic,$b_seats_arr);
				echo $qr_data['data'];
				$this->ticket_m->add_seat($cl_mail,$cl_nic,$f_h_i,$flm_id,$b_date,$b_time,$b_seats_arr,$price);
			}
			//echo "$b_date.$sep.$b_time$sep$b_seats_arr$sep$cl_mail$sep$cl_nic$sep$cl_news";
			//$this->load->model("ticket_m");
			
		}
		
		private function Escape($input){
			return mysql_real_escape_string($input);
		}
	   
   }
   
?>