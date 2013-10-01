<?php

/**
 * 
 */
class theaters_controller extends CI_Controller {
	
	public function index()
	{
		$this->home();
	}
	
	function theater_uploader() 
	{
		$this->load->model('theater_model');
		
		$this->load->view('theaters_view');
		
		if($this->input->post('upload')){
			$this->theater_model->do_upload();
		}
		 return;
	}
	public function home()
	{
		echo "film detail viewer..";
	}
}


?>