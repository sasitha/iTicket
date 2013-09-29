

<?php $this->load->view('header'); ?>
<link rel="stylesheet" type="text/css" href="<?php echo base_url('stylsheets/juidate.css'); ?>"></link>
<script type="text/javascript" src="<?php echo base_url('jscr/jquery_min.js'); ?>"></script>
<script type="text/javascript" src="<?php echo base_url('jscr/jui.js'); ?>"></script>
<script type="text/javascript" src="<?php echo base_url('jscr/video_uploader.js'); ?>"></script>

<td id= "navigation">
    <ul class= "subjects">
        
      
    </ul>
   
    
</td>

<td id= "page">
	
    <h2>Upload a movie trailler</h2>			
    <?php   echo form_open_multipart('home_controller/video_uploder');?>
    <p>
        <label for= 'film_name'> Film Name</label>
        <input type= 'text' name= 'film_name' id= 'film_name' />        
    </p>
    
    <p>
        <label for= 'description'> Description</label>
        <input type= 'text' name= 'description' id= 'description' />
    </p>
    
    <p>
        <label for= 'showing_date'>Showing date</label>
        <input id="showdate" type= 'text' name= 'showing_date' id= 'showing_date' />
    </p>
    <?php
        echo form_upload('video');
        echo form_upload('image');
        echo form_submit('upload', 'Upload');
        echo form_close();
    ?>
    
			
</td>



<?php $this->load->view('footer'); ?>

