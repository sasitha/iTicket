<!doctype html>
<?php $this->load->view('header'); ?>
<td id= "navigation">
    <ul class= "subjects">
         <?php
               
        ?>
    </ul>
   
    
</td>

<td id= "page">
				
    <?php
        foreach ($link as $lnk){
            $video_link = $lnk->trailer_link;
        }
       
    ?>
    <hr>
            <object width="425" height="344">  
                <param name="movie" value="<?php echo $video_link ?>" />  
                <param name="allowFullScreen" value="true" />  
                <param name="allowscriptaccess" value="always" />  
                <embed src="<?php echo $video_link ?>" type="application/x-shockwave-flash" allowscriptaccess="always" allowfullscreen="true" width="425" height="344">  
                </embed>  
            </object> 	
  
</td>

    

<?php $this->load->view('footer'); ?>
