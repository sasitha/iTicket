<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of films_model
 *
 * @author madushanka
 */
class films_model extends CI_Model {

    //put your code here
    var $gallery_path;

    public function __construct() {
        parent::__construct();
        $this->gallery_path = realpath(APPPATH . '../videos/');
    }

    //upload a video to the system
    public function upload_video($data) {

        //config array to hold the configuration settings for movie upload
        $config = array(
            'file_name' => 'video',
            'max_size' => 1000000,
            'allowed_types' => 'vlc|mkv|jpg|jpeg|png|mp4|mp4|3gp',
            'upload_path' => $this->gallery_path
        );

        //uploading movie
        $this->load->library('upload', $config);

        if (!$this->upload->do_upload()) {
            echo $this->upload->display_errors();
        } else {
            $video_data = $this->upload->data();

            //appending video url for the data array
            $data['trailer_link'] = base_url('videos/' . $video_data['file_name']);

            echo base_url('videos/' . $video_data['file_name']);
            //iserting data to the database
            $this->db->insert('films', $data);
        }

        return;
    }

    //play a video 
    public function play_video($film_name) {

        $this->db->select('trailer_link');
        $this->db->from('films');
        $this->db->where('film_name', $film_name);

        $result = $this->db->get();

        if ($result->num_rows() > 0) {
            foreach ($result->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
    }

    //display the thumbnail of all the  videos 
    public function display_thumbs() {
        $this->db->select('film_name');
        $this->db->from('films');

        $restult = $this->db->get();

        if ($restult->num_rows() > 0) {
            foreach ($restult->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
    }

}

?>
