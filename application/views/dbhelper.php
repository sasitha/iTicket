<html>
	<head> DB Check
		
		
	</head>
<body>
	<?php
	$row_number = 0;
	foreach ($showtims as $r) {
		
		echo "<h4>".$r->id."</h4>";
		echo "<h5>".$r->time."<h5>";
		/*if ($r->s_id==1){
		$split_row_col = explode("c", $r->location);
		if($split_row_col[1]==1){
			$row_number +=1;
			echo "New row ".$row_number."<br>";
		}
		$get_row = explode("r", $split_row_col[0]);
		echo "row number ".$get_row[1]."<br>";
		echo "col number ".$split_row_col[1]."<br>";//colom number
		}
		//echo $aa[2];*/
		
	}	
?>
	
	
</body>	
	
</html>