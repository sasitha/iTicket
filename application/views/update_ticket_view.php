<?php
$scripts= array("grid.js", "version.js", "detector.js", "formatinf.js","errorlevel.js","bitmat.js","datablock.js","bmparser.js"
,"datamask.js","rsdecoder.js","gf256poly.js","gf256.js","decoder.js","qrcode.js","findpat.js","alignpat.js","databr.js");
for ($i = 0;$i <sizeof($scripts);$i++){
	$link =  base_url('/jscr/qr_read/'.$scripts[$i]);
	echo "<script type=\"text/javascript\" src=\"$link\"></script>";	
	//echo "<br>";
}
?>
<script type="text/javascript" src="<?php echo base_url('jscr/jquery_min.js'); ?>"></script>
<script type="text/javascript">
	var image_up = '<?php echo base_url('qr_upload/get_qr'); ?>';
	var locations = '<?php echo base_url('saveqr/ticket.png'); ?>';
</script>
<br>
<ul>
	<li type="square">
		You can change your ticket reservation using this page
	</li>
	<br>
	<li type="square">
		NOTE that for now ( in future we will add the change seats function ) you can only change reservation date and time
	</li>
	<br>
	<li type="square">
		NOTE that if your new reservation time conflict with some ones's reservation time, you are not allowed to
		reserve that time
	</li>
	<br>
	<li type="square">
		SO please check your reserved seats will available for your new date
	</li>
	<br>
	<li type="square">
		NOTE alter reservation is not allowed with in 24hr before your original reservation
	</li>
	<br>
	<li type="square">
		NOTE no money refundable
	</li>
	<br>
	<li type="square">
		If you need any other help visit <a href="<?php echo base_url('/home_controller/about'); ?>"> ABOUT </a>
	</li>
</ul>

<br>
<p align="center">
	<form method="post" enctype="multipart/form-data"  action="upload.php">
		<input type="file" name="images" id="images" accept="image/*" />
		<button type="submit" id="btn">
			Upload Qr Image!
		</button>
		
	</form>
<button id="dd" onclick="ddd()" >DECODE</button>
	<div id ="reupload" align="center">

	</div>

</p>

<script type="text/javascript" src="<?php echo base_url('jscr/upload_qr.js'); ?>"></script>

<br>

