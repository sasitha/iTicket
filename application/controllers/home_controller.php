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

    public function video_uploder() {
        //loading uploader model
        $this->load->model('films_model');

        //loading view
        $this->load->view('video_uploader_view');

        //creating data array to upload to the database
        $data = array(
            'film_name' => $this->input->post('film_name'),
            'description' => $this->input->post('description'),
            'showing_date' => $this->input->post('showing_date')
        );

        if ($this->input->post('upload')) {
            $this->films_model->upload_video($data);
        }
        return;
    }

    public function video_player($film_name) {
        //loading model
        $this->load->model('films_model');
        $trailer_link['link'] = $this->films_model->play_video($film_name);

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

}

?>
