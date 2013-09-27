

<?php $this->load->view('header'); ?>
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
        <input type= 'text' name= 'showing_date' id= 'showing_date' />
        <?php echo $this->calendar->generate(); ?>
    </p>
    <?php
        echo form_upload('userfile');
        echo form_submit('upload', 'Upload');
        echo form_close();
    ?>
    
			
</td>



<?php $this->load->view('footer'); ?>

