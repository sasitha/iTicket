<?php $this->load->view('header'); ?>
    
<td id ="page">
    <h2>enter data to generate a QR code</h2>
    <?php echo form_open_multipart('/home_controller/qr_display'); ?>
    <p>
        <label for ="data_str"> Enter your data </label>
        <input type= 'text' name= 'data_str' id= 'data_str' />
        <input type="submit" value="Submit" />
    </p>  
       



<?php echo form_close(); ?>
<?php  if($this->input->post('data_str')){ ?>
            
            <img src ="<?php echo $data; ?>"
        
 <?php } ?>
</td>
    
<?php $this->load->view('footer'); ?>