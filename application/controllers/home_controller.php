

<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of home_controller
 *
 * @author madushanka
 */
class home_controller extends CI_Controller {

    //put your code here
    public function __construct() {
        parent::__construct();
    }

    public function index() {
        $this->home();
    }


    public function video_player($film_id) {
        //loading model
        $this->load->model('films_model');
        $trailer_link['link'] = $this->films_model->play_video($film_id);

        //loading view
        $this->load->view('video_player_view', $trailer_link);
    }

    public function home() {
        //loading model
        $this->load->model('films_model');
        $film_names['films_data'] = $this->films_model->get_film_data();

        //loading view
        $this->load->view('home_view', $film_names);
    }

    public function qr_display() {
        //loading model
        $this->load->model('qr_model');

        //calling to the controller function 
        $qr_data['data'] = $this->qr_model->qr_display();

        //loading view
        $this->load->view('qr_view', $qr_data);
    }
    
    public function about(){
        $this->load->view('about');
    }
	
	public function alter(){
		$this->load->view('header');
        $this->load->view('update_ticket_view');
		$this->load->view('footer');
    }
	
}

?>
