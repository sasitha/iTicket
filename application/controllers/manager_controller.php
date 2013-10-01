<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/*this is the manager controller 
 * this will handle all the request from the managesr
 */

class manager_controller extends CI_Controller{
    
    public function __construct() {
        parent::__construct();
    }
    
    public function index($data){
        echo "this is the idex page";
    }
    
    public function add_operator(){
        //loading model
        $this->load->model('manager_model');
        $f_h_names['f_h_data'] = $this->manager_model->get_film_hall_data();
        
        //loading view
        $this->load->view('add_operator_view', $f_h_names);
        
        //getting data from the view
        $data = array(
            'f_name' => $this->input->post('f_name'),
            'l_name' => $this->input->post('l_name'),
            'email' => $this->input->post('email'),
            'nic'   => $this->input->post('nic'),
            'f_hall' => $this->input->post('f_hall')
        );
        
        if($this->input->post('submit')){
            $this->manager_model->add_operator($data);           
            
        }
    }
    
    public function test($data){
        echo $data['f_name'];
        echo $data['f_hall'];
    }
}
?>

