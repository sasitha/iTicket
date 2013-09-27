<!doctype html>
<?php $this->load->view('header'); ?>


<?php
    
    echo form_open_multipart('home_controller/home');
	if (sizeof($names) > 0){
	    foreach($names as $name){
	         echo form_submit('submit', $name->film_name);        
	    }
	    echo form_close();
	}
    

?>

<?php $this->load->view('footer'); ?>