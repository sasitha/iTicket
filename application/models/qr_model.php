<?php
    
    class qr_model extends CI_Model{
        private $add_key = "12345";
		private $cli_id;
        var $root_url;
        public function __construct() {
            parent::__construct();
            $this->root_url= "https://chart.googleapis.com/chart?cht=qr&";
        }
        
        private function qr_display($client){
          
            //collecting requere data
            $qr_data = array(
              'chs'  => 'chs=300x300&',
               'chl' => "chl=".$client
            );
            
            $qr_string = $this->root_url.$qr_data['chs'].$qr_data['chl'];
            return $qr_string;
        }
		
		private function get_client_id(){
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
			return $temp_cid;
		}
		
		public function create_qr_data($cli_mail,$cli_nic,$seats){
			$cl_id = $this->get_client_id();
			$rand = mt_rand();//random generated value
			$costr = $cl_id.$cli_mail.$cli_nic.$seats.$rand;//encoaded string
			$this->load->library('encrypt');//encrypt libry
			$keys1 = $this->encrypt->encode($costr,$this->add_key);//md5 or shar1
			//add encrypt data to db
			$adding ="INSERT INTO ticket_data (client_id,key_val) VALUES (?,?)";
			$testrun = $this->db->query($adding,array($cl_id,$keys1));
			$value = $this->qr_display($keys1);// get qr code link
			return $value;// send link to client
		}
		
		public function get_up_client($qrdata){
			$quer = "SELECT client_id FROM ticket_data WHERE key_val = ?";
			$this->cli_id = $this->return_result($this->db->query($quer,$qrdata)->result_array());
			//$tt = $this->return_result($cli_id);
			$fquery_name = "SELECT hall_name FROM film_hall 
						WHERE f_hall_id = 
						(SELECT fil_id FROM ticket WHERE cl_id = ?)";
			$hall_name = $this->return_result($this->db->query($fquery_name,$this->cli_id)->result_array());
			$qur_date = "SELECT s_date FROM ticket WHERE cl_id = ?"; 
			$rdate = $this->return_result($this->db->query($qur_date,$this->cli_id)->result_array());
			$qur_time= "SELECT time FROM show_times 
						WHERE id = 
						(SELECT show_time_id FROM ticket WHERE cl_id = ?)";
			$rtime = $this->return_result($this->db->query($qur_time,$this->cli_id)->result_array());
			
			//geting time
			$this->load->model("ticket_m");
			$qufhid = "SELECT fil_id FROM ticket WHERE cl_id = ?";
			$fid = $this->return_result($this->db->query($qufhid,$this->cli_id)->result_array());
			$suggestime =$this->ticket_m->get_showtime($fid);
			$nnn =  json_encode($suggestime);
			return " <h2>....You Ticket info....  </h2><br>"."Hall name ".$hall_name."<br>"."Date ".$rdate."<br>"."Time 
			".$rtime."#".$nnn;
		}
		
		private function return_result($set){
			$expect= '';
			foreach ($set as $c1) {
				foreach ($c1 as $c2) {
					$expect = $c2;
				}				
			}			
			return $expect;
		}
		
		public function get_up_client_id(){
			return $this->cli_id;
		}
		
		
    }

?>
