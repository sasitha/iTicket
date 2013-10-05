<script type="text/javascript" src="<?php echo base_url('jscr/jquery_min.js'); ?>"></script>

<script type="text/javascript">
function ddd(){
	//alert($('#file').val());	
	qrcode.callback = function(data) { alert(data); };
	qrcode.decode("chart.png");
}

</script>

<br>
<ul>
  <li type="square"> You can change your ticket reservation using this page</li>
  <br>
  <li type="square"> NOTE that for now ( in future we will add the change seats function ) you can only change reservation date and time</li>
  <br>
  <li type="square"> NOTE that if your new reservation time conflict with some ones's reservation time, you are not allowed to 
  	reserve that time</li>
  	<br>
  <li type="square">SO please check your reserved seats will available for your new date</li>
  <br>
   <li type="square">NOTE alter reservation is not allowed with in 24hr before your original reservation </li>
  <br>
   <li type="square">NOTE no money refundable</li>
  <br>
  <li type="square"> If you need any other help visit <a href="<?php echo base_url('/home_controller/about'); ?>"> ABOUT </a></li>
</ul>

<br>
<p align="center">
<!--<form action="update_ticket_view.php" method="post"
enctype="multipart/form-data">-->
<label for="file">File name :- </label>
<input type="file" name="file" id="file" size="100"  accept="image/*" ><br>

<button id="dd" onclick="ddd()" >DECODE</button>
<!--<input type="submit" name="submit" value="Submit">-->
<div id ="reupload" align="center">

</div>
</form>
</p>

<div id="out">
	mamam ammama
	weew
	ftgrhyth
	gdrte
</div>
<br>
	
	
	

