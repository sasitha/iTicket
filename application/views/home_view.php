<?php $this->load->view('header'); ?>


<?php



?>
<div id ="gallery">
<?php
if (isset($films_data)) {
    foreach ($films_data as $film_data) {
        ?>
            <div class ="thumbs">
                <a href =<?php echo base_url('home_controller/video_player') . '/' . $film_data->film_name ?> >
                    <img src = "<?php echo $film_data->thumb_link; ?> "
                         title ="<?php echo $film_data->film_name; ?>"
                    />
                </a>
            </div>

            <?php
        }
    }
    ?>
</div>


<?php $this->load->view('footer'); ?>