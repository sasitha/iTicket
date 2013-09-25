<?php
    //phpinfo();
   /**
    * 
    */
   class sitemap_c extends CI_Controller {
       
       function index(){
       	$this->load->model("ticket_m");
		$seats['prices'] = $this->ticket_m->get_prices(1);//accea to hall id 1
		$seats['locat']= $this->ticket_m->get_locations(1);
		$seats['filmhall']=$this->ticket_m->get_filmhall(1);
		$seats['showtims']=$this->ticket_m->get_showtime(1);
       	$this->load->view("v_s_map",$seats);
		//$this->load->view("dbhelper",$seats);
       }
	   
	   function check_hall_01(){
	   	
	   }
   }
   
?>