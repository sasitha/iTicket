<?php
	/**
	 * 
	 */
	class theater_model extends CI_Model {
		var $image_path;
		
		function __construct() {
			parent::__construct();
        		$this->image_path = realpath(APPPATH . '../images/');
    }

    //upload images to the system
    public function do_upload() {

     
        $config = array(
            'max_size' => 5000,
            'allowed_types' => 'jpg|jpeg|png|gif',
            'upload_path' => $this->image_path
        );
		
		$this->load->library('upload',$config);
		
		$this->upload->do_upload();
	 }
    }
	
?>