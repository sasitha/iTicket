<?php
    //phpinfo();
    class ticket_m extends CI_model{
		public function get_prices($film_hall_id){
			$this->db->select('s_id,cost');//retrived types
			$this->db->from('seat_prices');//table name
			$this->db->where('f_h_id',$film_hall_id);//condition
			$qu = $this->db->get();
			//$qu = $this->db->query("SELECT * FROM location");
			if($qu->num_rows()>0){
				foreach ($qu->result() as $row) {
					$data[]=$row;
				}
				return $data;
			}
		}
		public function get_locations($film_hall_id)
		{
			$this->db->select('s_id,location');
			$this->db->from('location');//table name
			$this->db->where('f_h_id',$film_hall_id);
			$qu = $this->db->get();
			//$qu = $this->db->query("SELECT * FROM location");
			if($qu->num_rows()>0){
				foreach ($qu->result() as $row) {
					$data[]=$row;
				}
				return $data;
			}
		}   
		
		public function get_filmhall($film_hall_id)
		{
			$this->db->select('hall_name,location');
			$this->db->from('film_hall');//table name
			$this->db->where('f_hall_id',$film_hall_id);
			$qu = $this->db->get();
			//$qu = $this->db->query("SELECT * FROM location");
			if($qu->num_rows()>0){
				foreach ($qu->result() as $row) {
					$data[]=$row;
				}
				return $data;
			}
		} 
		
		public function get_showtime($film_hall_id)
		{
			$this->db->select('id,time');
			$this->db->from('show_times');//table name
			$this->db->where('f_h_id',$film_hall_id);
			$qu = $this->db->get();
			//$qu = $this->db->query("SELECT * FROM location");
			if($qu->num_rows()>0){
				foreach ($qu->result() as $row) {
					$data[]=$row;
				}
				return $data;
			}
		}
		
		public function get_book_seats($film_hall_id,$date,$time){
			$que = "SELECT s_id,location
    				FROM location
    				WHERE l_id in
    				(SELECT lo_id from ticket
    				WHERE fil_id = ? AND
    				s_date = ? AND
    				show_time_id = ?)";
			$qu = $this->db->query($que,array($film_hall_id,mysql_real_escape_string($date),mysql_real_escape_string($time)));
			if($qu->num_rows()>0){
				$add = $qu->result_array();	
				return $add;			
			}  
		}
		
		public function add_to_mail_list($cli_mail){
			$quer = "SELECT id 
					FROM newsletter 
					WHERE email = ?";
			$qu = $this->db->query($quer,$cli_mail);
			if ($qu->num_rows()==0){
				//get max id to resolve conflecting
				$fmqu = "SELECT max(id)+1 FROM newsletter";
				$fqu = $this->db->query($fmqu)->result_array();
				$c0 = '1';
				//convert it to string
				foreach ($fqu as $c1) {
					foreach($c1 as $c2){
						if($c2 != NULL){
						$c0=$c2;
						}
					}
				}
				//add to db
				$inqu = "INSERT INTO newsletter 
						(id,email) VALUES (?,?)";
				$qu = $this->db->query($inqu,array($c0,$cli_mail));
			}
		}
		
		
		public function add_seat($cli_mail,$cli_nic,$film_hall,$film_id,$show_date,$show_time,$location_arr,$price){
			//first add client 
			$cqu = "SELECT max(c_id)+1 FROM client";
			$c_r_qu = $this->db->query($cqu)->result_array();
			$temp_cid = '1';
			foreach ($c_r_qu as $c1) {
				foreach($c1 as $c2){
					if($c2 != NULL){
						$temp_cid=$c2;
					}
				}
			}
			//adding to client table
			$c_inqu = "INSERT INTO client 
						(c_id,n_ic,email) VALUES (?,?,?)";
			$qu = $this->db->query($c_inqu,array($temp_cid,$cli_nic,$cli_mail));
			$location = explode('#', $location_arr);
			$this->add_ticket($temp_cid, $location, $film_hall, $show_date, $show_time);
		} 
		
		private function add_ticket($client,$location,$fhid,$sdate,$sime){
			$tqu = "SELECT max(t_id)+1 FROM ticket";
			$t_r_qu = $this->db->query($tqu)->result_array();
			$temp_tid = '1';
			foreach ($t_r_qu as $c1) {
				foreach($c1 as $c2){
					if($c2 != NULL){
						$temp_tid=$c2;
					}
				}
			}
			//adding ticket/*
			$location_id_arr = $this->get_id_array($fhid,$location);
			$t_inqu = "INSERT INTO ticket 
						(t_id,cl_id,lo_id,fil_id,s_date,show_time_id) VALUES (?,?,?,?,?,?)";
			for($j =0;$j<sizeof($location_id_arr);$j++){
				$nid_tid = strval(intval($temp_tid)+$j);				
				$t_in_run = $this->db->query($t_inqu,array($nid_tid,$client,$location_id_arr[$j],$fhid,$sdate,$sime));
			}
		}
		
		
		
		private function get_id_array($fhid,$location){
			$location_id_arr = array();
			for($i=0;$i<sizeof($location);$i++){
				$parts = explode('r', $location[$i]);
				$lok = 'r'.$parts[1];
				$resid = $this->get_location_id($fhid, $parts[0],$lok);
				array_push($location_id_arr,$resid);
			}
			return $location_id_arr;
		}
		
		private function get_location_id($fhid,$sid,$location){	
			$result = "";
			$fl = "SELECT l_id
					FROM location 
					WHERE f_h_id = ? AND
					s_id = ? AND
					location = ?";
			$fl_qu = $this->db->query($fl,array($fhid,$sid,$location))->result_array();
			foreach ($fl_qu as $c1) {
				foreach($c1 as $c2){
					$result = $c2;
				}				
			}
			return $result;			
		}
		
		public function check_availability($f_h_i,$time,$date,$location_str){
			$not = 0;
			$location = explode('#',$location_str);
			$location_id_arr = $this->get_id_array($f_h_i,$location);
			$che_que = "SELECT t_id FROM ticket
			WHERE lo_id = ? AND
			s_date = ? AND 
			show_time_id = ?";
			for ($i=0; $i<sizeof($location_id_arr);$i++){
				$fl_qu = $this->db->query($che_que,array($location_id_arr[$i],$date,$time));
				if($fl_qu->num_rows()>0){
					$not = 1;
					$test ="INSERT INTO test (data) VALUES (?)";
					$testrun = $this->db->query($test,$not);
				}
			}
			if($not==0){
				return FALSE;
			}else{
				return TRUE;
			}
		}		  				
}
?>