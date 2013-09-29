<?php
    
    class qr_model extends CI_Model{
        
        var $root_url;
        public function __construct() {
            parent::__construct();
            $this->root_url= "https://chart.googleapis.com/chart?cht=qr&";
        }
        
        public function qr_display(){
          
            //collecting requere data
            $qr_data = array(
              'chs'  => 'chs=300x300&',
               'chl' => "chl=".$this->input->post('data_str')
            );
            
            $qr_string = $this->root_url.$qr_data['chs'].$qr_data['chl'];
            return $qr_string;
        }
    }

?>
