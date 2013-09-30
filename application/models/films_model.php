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
    var $img_path;

    public function __construct() {
        parent::__construct();
        $this->gallery_path = realpath(APPPATH . '../videos/');
        $this->img_path = realpath(APPPATH . '../images/');
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
        $this->upload->initialize($config);
        if (!$this->upload->do_upload('video')) {
            echo $this->upload->display_errors();
        } else {
            $video_data = $this->upload->data();

            //appending video data for the data array
            $data['trailer_link'] = base_url('videos/' . $video_data['file_name']);
            $data['thumb_link'] = base_url('images/'.$video_data['raw_name'].'.jpg');

            //iserting data to the database
            $this->db->insert('films', $data);
            
            //configuring to upload an image
            $config['upload_path'] = $this->img_path;
            $this->upload->initialize($config);
            
            //uploading the image
            if (!$this->upload->do_upload('image')) {
                echo $this->upload->display_errors();
            } else {
                //configuring to make thumbnai image
                $image = $this->upload->data();
                
               
                $thumb_conf = array(
                    'image_library' => 'gd2',
                    'source_image' => $image['full_path'],
                    'maintain_ratio' => FALSE,
                    'width' => 200,
                    'height' => 300
                );
                $this->load->library('image_lib', $thumb_conf);
                $this->image_lib->initialize($thumb_conf);
                if (!$this->image_lib->resize()) {
                    $this->image_lib->display_errors();
                    echo "error";
                }
            }
        }

        return;
    }

    //play a video 
    public function play_video($film_id) {

        $this->db->select('trailer_link');
        $this->db->from('films');
        $this->db->where('film_id', $film_id);

        $result = $this->db->get();

        if ($result->num_rows() > 0) {
            foreach ($result->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
    }

    //display the thumbnail of all the  videos 
    public function get_film_data() {
        $this->db->select('film_id, film_name , thumb_link');
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
