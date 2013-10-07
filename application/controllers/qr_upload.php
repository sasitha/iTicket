<?php
//include 'all';
class qr_upload extends CI_Controller{
	private $save_path;
	private $client_id;
	public function qr_upload(){
		parent::__construct();
		$this->save_path = realpath(APPPATH.'../saveqr');
	}
	
	public function save_qr($path){
		
	}
	
	public function get_qr(){
		//$image = $this->input->post($_FILES["images"]);
		$image;
		foreach ($_FILES["images"]["error"] as $key => $error) {
    		if ($error == UPLOAD_ERR_OK) {
        		///$name = $_FILES["images"]["name"][$key];
        		$name = "ticket.png";
				$image = $name;
        		move_uploaded_file( $_FILES["images"]["tmp_name"][$key], $this->save_path.'/'. $name);
    		}
		}
	}
	public function check_qr(){		
		$data = $this->input->post("qdata");
		$this->load->model("qr_model");
		//get_up_client
		$client_data =  $this->qr_model->get_up_client($data);
		echo $client_data;
		//client id		
	}
	
	public function update(){
		$date = $this->input->post("u_date");
		$time = $this->input->post("u_time");
		$this->load->model("qr_model");
		$ucid = $this->qr_model->get_up_client_id();
		$newli = $this->qr_model->do_update($ucid,$date,$time);
		echo $newli;
	}	
}
?>


