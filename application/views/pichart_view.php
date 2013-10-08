<?php

    if(isset($s_data)){
        foreach ($s_data as $data){
            $seat_count[$data['s_id']] = intval($data['count']);
        }
        $odc = $seat_count[1];
        $bal =$seat_count[2];
        $box =$seat_count[3];
    }
    
?>
<html>
    <head>
        <title>iTicket</title>
        <link href="<?php echo base_url('/stylsheets/basic.scss'); ?>" media="all" rel="stylesheet" type="text/css" />
        <!--Load the AJAX API-->
        <script type="text/javascript" src="https://www.google.com/jsapi"></script>
        <script type="text/javascript">

            // Load the Visualization API and the piechart package.
            google.load('visualization', '1.0', {'packages':['corechart']});

            // Set a callback to run when the Google Visualization API is loaded.
            google.setOnLoadCallback(drawChart);

            // Callback that creates and populates a data table,
            // instantiates the pie chart, passes in the data and
            // draws it.
            function drawChart() {

                // Create the data table.
                var data = new google.visualization.DataTable();
                data.addColumn('string', 'category');
                data.addColumn('number', 'amount');
                data.addRows([
                    ['ODC', <?php echo $odc; ?>],
                    ['BALCONY', <?php echo $bal; ?>],
                    ['BOX', <?php echo $box; ?>]
                ]);

                // Set chart options
                var options = {'title':'reserved ticket',
                    'width':400,
                    'height':300};

                // Instantiate and draw our chart, passing in some options.
                var chart = new google.visualization.PieChart(document.getElementById('chart_div'));
                chart.draw(data, options);
            }
        </script>
    </head>
    <body>
        <div id="header">
            <h1>iTicket</h1>
            <br><br><br><br><br>
            <div  class ="button" onclick="location.href='<?php echo base_url('/home_controller'); ?>'"> HOME</div>
            <!-- sasitha comment this
            <!--<div  class ="button" onclick="location.href='<?php echo base_url(); ?>'"> HOME</div>-->
            <div class ="button" onclick="location.href='<?php echo base_url('/home_controller/about'); ?>'">ABOUT US </div>
            <div class ="button" onclick="location.href='<?php echo base_url('/home_controller/alter'); ?>'"> ALTER </div>
        </div>
        <div id= "main">
            <table id = "structure">
                <td id ="page">
                    
                </td>
                <td id ="page">
                    <tr>
                <div id="chart_div"></div>
                </tr>
                </td>
                
            </table>

        </div>
        <div id="footer">Copyright 2013 @ codEarc solutions</div>
    </body>
</html>

</html>