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
}
?>