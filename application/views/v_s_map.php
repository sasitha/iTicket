<!DOCTYPE html>
<html>
	<!--<head>-->
		<title></title>
		<br><br>
		<link rel="stylesheet" type="text/css" href="<?php echo base_url('stylsheets/book.css'); ?>"></link>
		<link rel="stylesheet" type="text/css" href="<?php echo base_url('stylsheets/notbook.css'); ?>"></link>
		<link rel="stylesheet" type="text/css" href="<?php echo base_url('stylsheets/map.css'); ?>"></link>
		<link rel="stylesheet" type="text/css" href="<?php echo base_url('stylsheets/pay_b.css'); ?>"></link>
		<link rel="stylesheet" type="text/css" href="<?php echo base_url('stylsheets/juidate.css'); ?>"></link>
		<link rel="stylesheet" type="text/css" href="<?php echo base_url('stylsheets/paydialog.css'); ?>"></link>
		<link rel="stylesheet" type="text/css" href="<?php echo base_url('stylsheets/check_button.css'); ?>"></link>
		<script type="text/javascript" src="<?php echo base_url('jscr/jquery_min.js'); ?>"></script>
		<script type="text/javascript" src="<?php echo base_url('jscr/jui.js'); ?>"></script>
		<script type="text/javascript" src="<?php echo base_url('jscr/blockui.js'); ?>"></script>

		<!-- from data base get prices-->
		<?php
		//$seat_types = sizeof($prices);
		$row_number = 0;
		$odc_v = 0;
		$bal_v = 0;
		$box_v = 0;
		foreach ($prices as $r) {
			if ($r -> s_id == 1) {
				$odc_v = $r -> cost;
			}
			if ($r -> s_id == 2) {
				$bal_v = $r -> cost;
			}
			if ($r -> s_id == 3) {
				$box_v = $r -> cost;
			}
		}
		?>
		<!-- from data base get type-->
		<?php $odc_t = 1;
			$bal_t = 2;
			$box_t = 3;
		?>
		<!-- passing to script -->
	<script type="text/javascript">
	var odc_value =<?php echo $odc_v; ?>;
	var bal_value = <?php echo $bal_v; ?>;
	var box_value = <?php echo $box_v; ?>;
	var fromc = "<?php echo site_url('sitemap_c/check_hall') ;?>";
	var bookc = "<?php echo site_url('sitemap_c/book_ticket') ;?>";

	//var url_to = ;
	function count(e_id) {

		//$('#ammount').html('Your total is Rs '+totala+'.00');
	}
		</script>
		<script type="text/javascript" src="<?php echo base_url('jscr/calculate.js'); ?>"></script>
	<!--</head>-->
	<!--<body>-->
		<!--information -->
		<?php echo "<div id=\"datetime\" class = \"dt\">";
			echo "<div id=\"location\">";?>
		<?php
			foreach ($filmhall as $r) {
				echo "<h3>" . $r -> hall_name . "</h3>";
				echo "<h5>" . $r -> location . "<h5>";
			}
			?>
			</div>
			<!--spaces-->
			<div class="dati"> Date <input id="date" type="text" size = "8" />  </div>
			<div id="time" class="dati">  Time 
			<select id ="stime" name="dropdown">
			<?php
			foreach ($showtims as $r) {
				echo "<option value=$r->id>$r->time</option>";
			}
			?>
			</select>
			</div>
			<br><br><br><br><br><br><br><br>
			<button id="cbk" class = "chkbtn">Check</button>
			</div>

		<!--hall plan -->
			<div id="gr" class ="ground" onclick="clear_click(event,this)">
			<div class=screen>SCREEN</div>
			<br>
			<!--adding seats-->
			<br><br><br><br><br><br>
		<?php
			$rr = 'r';
			$cc = 'c';
			if (($odc_v != 0) and sizeof($locat) > 0) {
				foreach ($locat as $r) {
					if ($r -> s_id == $odc_t) {
						$split_row_col = explode("c", $r -> location);
						if ($split_row_col[1] == 1) {
							$row_number += 1;
							echo "<br><br>";
						}
						$get_row = explode("r", $split_row_col[0]);
						echo "<div id=\"$odc_t$rr$row_number$cc$split_row_col[1]\" onClick=\"count(this.id)\" value=\"C\" class = \"n_book\"><br><br><br><br>O</div>";
						echo " ";
					}
				}
				echo "<br><br><br><br><br><br><br><br>";
			}

			//area space
			if (($bal_v != 0) and sizeof($locat) > 0) {
				foreach ($locat as $r) {
					if ($r -> s_id == $bal_t) {
						$split_row_col = explode("c", $r -> location);
						if ($split_row_col[1] == 1) {
							$row_number += 1;
							echo "<br><br>";
						}
						$get_row = explode("r", $split_row_col[0]);
						echo "<div id=\"$bal_t$rr$row_number$cc$split_row_col[1]\" onClick=\"count(this.id)\" class = \"n_book\"><br><br><br><br>B</div>";
						echo " ";
					}
				}
				echo "<br><br><br><br><br><br><br><br>";
			}
			//area space
			if (($box_v != 0) and sizeof($locat) > 0) {
				foreach ($locat as $r) {
					if ($r -> s_id == $box_t) {
						$split_row_col = explode("c", $r -> location);
						if ($split_row_col[1] == 1) {
							$row_number += 1;
							echo "<br><br>";
						}
						$get_row = explode("r", $split_row_col[0]);
						echo "<div id=\"$box_t$rr$row_number$cc$split_row_col[1]\" onClick=\"count(this.id)\" class = \"n_book\"><br><br><br><br>X</div>";
						echo " ";
					}
				}
				echo "<br><br><br><br><br><br><br><br>";
			}
			?>
			</div>
			<!--cart and helper-->
			<div class = cart>
			<p><font size="6">Helper</font></p>
			<br>
			<button class = "book_b"> </button>
			&nbsp&nbsp
			<?php echo "  Resived seats";?>
			<br><br>
			<button class = "n_book"> </button>
			<?php echo "  Available seats";?>
			<br><br>
			<!--referance-->
			<div id="kkk" class = "reference">
			<br>
			
			<?php
			//odc
			if ($odc_v != 0) {
				echo "<button class = \"n_book\"\"> O </button>";
				echo "&nbsp";
				echo " ODC &nbsp&nbsp&nbsp&nbsp" . $odc_v . ".00";
				echo "<br><br>";
			}
			//bal
			if ($bal_v != 0) {
				echo "&nbsp";
				echo "<button class = \"n_book\"\"> B </button>";
				echo "&nbsp";
				echo " BLCN &nbsp&nbsp&nbsp" . $bal_v . ".00";
				echo "<br><br>";
			}
			//box
			if ($box_v != 0) {
				echo "<button class = \"n_book\"\"> X </button>";
				echo "&nbsp";
				echo " BOX &nbsp&nbsp&nbsp&nbsp" . $box_v . ".00";
				echo "<br><br>";
			}
			?>
			</div>
			<br>
			<!--payments-->
			<div id ="ammount" class="amm"> </div>
			<br>
			<button class = "py" id="pay"> Pay </button>
			<br><br>
			</div>
			<!--payment form-->
			
			<div class=dialog id=myform >
  		<!--<form>-->
      <label id="plid"> Enter N.I.C </label>
      <input type="text" id="name" id="plid"></input>
      <br>
      <label id="plid"> Emial </label>
      <input type="text" id="email" id="plid"></input>
      <br>
      <label id="cpid"> </label>
      <br>
      <label> Payment daitails will send to your email</label>
      <br>
      <input type="checkbox" id="cheknl" name="nwsletter">Send monthly news letter to me</input><br><br>
      <div align="center">
        <button class="py" id="btnOK"> Ok</button>
      </div>
 		<!--</form>-->
  </div>
		

		<!--jquery test-->
	<!--</body>-->
</html>