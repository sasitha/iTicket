<script type="text/javascript">
	function execute() {
			//alert("home");
			//return String("kk");
			$.post( "http://localhost/iTicket/qr_upload/get", { name: "John"},function( data ) {
			alert( "Data Loaded: " + data );});
        }
</script>
<?php
//include 'all';
class qr_upload extends CI_Controller{
	var $save_path;
	private $imagepath;
	public function qr_upload(){
		parent::__construct();
		$this->save_path = realpath(APPPATH.'../saveqr');
	}
	
	public function save_qr($path){
		//$this->$imagepath = $path;
		$rr = 'hhh';
		echo "<script>rung();</script>";
		return $rr;
	}
	
	public function get_qr(){
		//$image = $this->input->post($_FILES["images"]);
		$image;
		foreach ($_FILES["images"]["error"] as $key => $error) {
    		if ($error == UPLOAD_ERR_OK) {
        		///$name = $_FILES["images"]["name"][$key];
        		$name = "ticket.png";
				$image = $name;
        		move_uploaded_file( $_FILES["images"]["tmp_name"][$key], realpath(APPPATH."../saveqr").'/'. $name);
    		}
		}
		//$name=$_REQUEST['images'];
		$path_name = realpath(APPPATH."../saveqr").'/'. $image ;		
		//$image  = $_FILES["images"];		
		//echo "<h2>Successfully Uploaded Images</h2>";
		echo "rr";
		echo "<script> execute(); </script>";
		//echo $this->get();
		/*{header('Content-type: application/x-javascript');
				//echo execute();		
		}	*/	//echo $image;
	}
	public function get(){
		if( $_POST["name"])
  		{
     		return  $_POST['name'] ;
     //echo "You are ". $_POST['age']. " years old.";
    // exit();
  		}
	}	
}
?>


