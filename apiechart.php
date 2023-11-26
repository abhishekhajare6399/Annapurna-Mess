<?php 

          date_default_timezone_set("Asia/Calcutta");
          $date =date('Y-m-d');
          $ldate = date("Y-m-d" ,strtotime($date . "- 7 days"));

                        $sql = "SELECT * FROM `order` where messid='$messid' and date between '$ldate' and '$date'";
                        $res = mysqli_query($con, $sql);
                        $count = mysqli_num_rows($res);
                        $sql1 = "SELECT * FROM attendance inner join user on user.userid=attendance.userid where messtype='Regular' and attendance.messid='$messid' and attendance.date between '$ldate' and '$date'";
                        $res1 = mysqli_query($con, $sql1);
                        $count1 = mysqli_num_rows($res1);

                        $sql2 = "SELECT * FROM attendance inner join user on user.userid=attendance.userid where messtype='Non-Regular' and attendance.messid='$messid' and attendance.date between '$ldate' and '$date'";
                        $res2 = mysqli_query($con, $sql2);
                        $count2 = mysqli_num_rows($res2);
                    ?>

<div id="piechart"></div>
                        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

                        <script type="text/javascript">
                        // Load google charts
                        google.charts.load('current', {
                            'packages': ['corechart']
                        });
                        google.charts.setOnLoadCallback(drawChart);

                        // Draw the chart and set the chart values
                        function drawChart() {
                            var data = google.visualization.arrayToDataTable([
                                ['Task', 'Average Customer In last 7 Days'],
                                ['Regular Customer', <?php echo $count1?>],
                                ['Non-Regular Customer', <?php echo $count2?>],
                                ['New Customer', <?php echo $count?>],
                            ]);

                            // Optional; add a title and set the width and height of the chart
                            var options = {
                                'title': 'Average Customer Details of Last 7 Days :'
                            };

                            // Display the chart inside the <div> element with id="piechart"
                            var chart = new google.visualization.PieChart(document.getElementById('piechart'));
                            chart.draw(data, options);
                        }
                        </script>