<?php
    
    class qr_model extends CI_Model{
        private $add_key = "12345";
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
		
		
    }

?>
