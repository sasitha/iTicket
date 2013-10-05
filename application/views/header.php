<html>
<head>
	<title>iTicket</title>
	<link href="<?php echo base_url('/stylsheets/basic.scss');?>" media="all" rel="stylesheet" type="text/css" />
</head>

<body>
<div id="header">
    <h1>iTicket</h1>
        <br><br><br><br><br>
        <div  class ="button" onclick="location.href='<?php echo base_url('/sitemap_c');?>'"> HOME</div>
        <!-- sasitha comment this
        <!--<div  class ="button" onclick="location.href='<?php echo base_url();?>'"> HOME</div>-->
        <div class ="button" onclick="location.href='<?php echo base_url('/home_controller/about');?>'">ABOUT US </div>
        <div class ="button" onclick="location.href='<?php echo base_url('/home_controller/alter');?>'"> ALTER </div>
</div>
<div id= "main">
    <table id = "structure">
 	<tr>