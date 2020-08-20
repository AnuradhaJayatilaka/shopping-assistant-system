<?php
require("mysqlconnect.php");
?>
<html>
    <head>
        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
        <script type = "text/javascript" src = "https://www.gstatic.com/charts/loader.js">
        </script>
        <script type = "text/javascript">
            google.charts.load('current', {packages: ['corechart']});     
            var list=new Array;
        </script>
    </head>
    <body>
        <div id = "container" style = "width: 750px; height: 400px; margin: 0 auto">
        <!-- This container loads the chart   -->
        </div>

        <script language = "JavaScript">
            function myFunc(arr){
                list=arr;
            }
            
            function drawChart() {

                for(let i = 0; i < list.length; i++){
                    console.log(list[i]);
                }
                var data = google.visualization.arrayToDataTable([
                ['Month', 'Income'],
                list[0],
                list[1],
                list[2],
                list[3],
                list[4], 
                list[5],   
                list[6],   
                list[7],   
                list[8],   
                list[9],   
                list[10],   
                list[11]   
                ]);


                
                // Set chart options
                var options = {
                title : 'Monthly Income',
                vAxis: {title: 'Income LKR'},
                hAxis: {title: 'Month'},
                seriesType: 'bars',
                // series: {2: {type: 'line'}}
                };

                // Instantiate and draw the chart.
                var chart = new google.visualization.ComboChart(document.getElementById('container'));
                chart.draw(data, options);
            }
            google.charts.setOnLoadCallback(drawChart);
        </script>
        
        <?php

            $i = 0;
            $sampleArray =array();

            do {

                $month=-$i;
                $currentMonth=strtotime("$month Months");

                $startDate = date('Y-m-01',$currentMonth);
                $endDate = date('Y-m-t',$currentMonth);

                //Write the sql query for getting total sum of each month using endDate and startDate variables
                $sql1="select SUM(amount) as total from cartorder WHERE porder_date_time BETWEEN '$startDate' and '$endDate'";
                $result_sql1=mysqli_query($db,$sql1);
                $oneresult = $result_sql1->fetch_object();
                $total  = $oneresult->total;
                echo $total;
                $totalint= (double)$total;
                //$month ekai query eken ena value ekai push karanna $sampla array kiyana ekata
                $month=date("F", strtotime($startDate)); 

                //echo statements to just check the starting ending dates of each month
                echo $startDate . "<br>";
                echo $endDate . "<br>";
                echo  date("F", strtotime($startDate)). "<br>"; 

                //can use these 2 lines for pushing the vaues to array
                $row=["$month",($totalint)];
                array_push($sampleArray,$row);

                $i++;
            } while ($i < 12);

            echo "<script>
                myFunc(".json_encode($sampleArray).")
            </script>";

        ?>

    </body>   
</html>