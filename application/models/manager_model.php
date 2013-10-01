<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/*thsi is the manager model
 * 
 */
class manager_model extends CI_Model{
    
    public function __construct() {
        parent::__construct();
    }
    
    public function add_operator($data = NULL){
        
        $o_data = array(
          'f_name'   => $data['f_name'],
          'l_name'  => $data['l_name'],
            'email' => $data['email'],
            'nic'   => $data['nic'],
            'f_hall_id' => $data['f_hall']
        );
        
        $this->db->insert('operators', $o_data);
        
    }
    public function get_film_hall_data(){
        $this->db->select('f_hall_id, hall_name');
        $this->db->from('film_hall');
        
        $result = $this->db->get();
        
        if($result->num_rows()>0){
            foreach ($result->result() as $row){
                $data[] = $row;
            }
            return $data;
        }
    }
}



?>
