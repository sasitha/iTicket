<?php $this->load->view('header'); ?>

	<td id= "navigation">
		<h3>UP COMING MOVIES</h3>
    <ul class= "subjects">
      	<h4>* Titanic..</h4>  
      
    </ul>
   
    
</td>

<td id= "page">
	    <div id="theater">
	       <h2>Our Theaters</h2>
	       
		 </div>
	    
		 <?php   echo form_open_multipart('theaters_controller/theater_uploader');?>
		 	 <p>
		        <label for= 'theater_name'> Theater Name</label>
		        <input type= 'text' name= 'theater_name' id= 'theater_name' />        
		    </p>
		    <p>
		        <label for= 'film_name'> Film Name</label>
		        <input type= 'text' name= 'film_name' id= 'film_name' />        
		    </p>
		    
		    <p>
		        <label for= 'description'> Description</label>
		        <input type= 'text' name= 'description' id= 'description' />
		    </p>
		    <div id="upload_form">
	   			<h5>upload images of theater</h5>
	 		<?php
	 			echo form_open_multipart('theaters_controller/theater_uploader');
				echo form_upload('userfile');
				echo form_submit('upload','Upload');
				echo form_close();
	 		?>
	 			
	 		 </div>
	    </div>
	  </body>
</html>
<?php $this->load->view('footer'); ?>