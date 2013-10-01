<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/* this is the operator view
 * 
 */
?>

<?php $this->load->view('header'); ?>

<td id ="navigation">
    <ul class ="subjects">

    </ul>
</td>

<td id ="page">
    <h2>Add an operator</h2>
    <?php echo form_open_multipart('manager_controller/add_operator'); ?>

    <?php
    $data = array(
        'name' => 'f_name',
        'id' => 'f_name'
    );
    echo form_label('First Name', 'f_name');
    echo form_input($data)
    ?>
    <br><br><br>
    <?php
    //last name
    $data = array(
        'name' => 'l_name',
        'id' => 'l_name'
    );
    echo form_label('Last Name', 'l_name');
    echo form_input($data)
    ?>
    <br><br><br>
    <?php
    //email
    $data = array(
        'name' => 'email',
        'id' => 'email'
    );
    echo form_label('Email', 'email');
    echo form_input($data)
    ?>
    <br><br><br>
    <?php
    //nic
    $data = array(
        'name' => 'nic',
        'id' => 'nic'
    );
    echo form_label('National ID Number', 'nic');
    echo form_input($data)
    ?>
    <br><br><br>
    <?php
    //hilm hall names
    $options = array();
    if(isset($f_h_data)){
        foreach($f_h_data as $data){
            $options[$data->f_hall_id] = $data->hall_name;
        }
    }
   
    $data = 'id = "f_hall" name = "f_hall"';
    
    echo form_label('Film Hall Name', 'f_hall');
    echo form_dropdown('f_hall', $options, '',$data);
    ?>  
    <br><br><br>
    <?php 
    
    echo form_submit('submit', 'Add Operator');
    echo form_close();
    

    ?>
</td>




<?php $this->load->view('footer'); ?>
