
<?php 
$resid = $_SESSION['messid'];
      include'database/dbcon.php';
      date_default_timezone_set("Asia/Calcutta");
      $date = date("Y");

                        $sql = "SELECT date FROM attendance where messid='$resid' and date between '$date-01-01' and '$date-01-31'";
                        $res = mysqli_query($con, $sql);
                        $count = mysqli_num_rows($res);
                        $selectquery  = "SELECT SUM(plate) as total FROM  `order` where messid='$resid' and date between '$date-01-01' and '$date-01-31'";
                        $query = mysqli_query($con,$selectquery);
                        $result =mysqli_fetch_array($query);
                        $t=$result['total'];
                        $count = $count + $t;

                        $sql1 = "SELECT date FROM attendance where messid='$resid' and date between '$date-02-01' and '$date-02-31'";
                        $res1 = mysqli_query($con, $sql1);
                        $count1 = mysqli_num_rows($res1);
                        $selectquery1 = "SELECT SUM(plate) as total FROM  `order` where messid='$resid' and date between '$date-02-01' and '$date-02-31'";
                        $query1 = mysqli_query($con,$selectquery1);
                        $result1 =mysqli_fetch_array($query1);
                        $t1=$result1['total'];
                        $count1 = $count1 + $t1;

                        $sql2 = "SELECT date FROM attendance where messid='$resid' and date between '$date-03-01' and '$date-03-31' ";
                        $res2= mysqli_query($con, $sql2);
                        $count2 = mysqli_num_rows($res2);
                        $selectquery2 = "SELECT SUM(plate) as total FROM  `order` where messid='$resid' and date between '$date-03-01' and '$date-03-31' ";
                        $query2 = mysqli_query($con,$selectquery2);
                        $result2 =mysqli_fetch_array($query2);
                        $t2=$result2['total'];
                        $count2 = $count2 + $t2;

                        $sql3 = "SELECT date FROM attendance where messid='$resid' and date between '$date-04-01' and '$date-04-31'";
                        $res3 = mysqli_query($con, $sql3);
                        $count3 = mysqli_num_rows($res3);
                        $selectquery3 = "SELECT SUM(plate) as total FROM  `order` where messid='$resid' and date between  '$date-04-01' and '$date-04-31'";
                        $query3 = mysqli_query($con,$selectquery3);
                        $result3 =mysqli_fetch_array($query3);
                        $t3=$result3['total'];
                        $count3 = $count3 + $t3;

                        $sql4 = "SELECT date FROM attendance where messid='$resid' and date between '$date-05-01' and '$date-05-31'";
                        $res4 = mysqli_query($con, $sql4);
                        $count4 = mysqli_num_rows($res4);
                        $selectquery4 = "SELECT SUM(plate) as total FROM  `order` where messid='$resid' and date between '$date-05-01' and '$date-05-31'";
                        $query4 = mysqli_query($con,$selectquery4);
                        $result4 =mysqli_fetch_array($query4);
                        $t4=$result4['total'];
                        $count4 = $count4 + $t4;

                        $sql5 = "SELECT date FROM attendance where messid='$resid' and date between '$date-06-01' and '$date-06-31' ";
                        $res5 = mysqli_query($con, $sql5);
                        $count5 = mysqli_num_rows($res5);
                        $selectquery5 = "SELECT SUM(plate) as total FROM  `order` where messid='$resid' and date between '$date-06-01' and '$date-06-31' ";
                        $query5 = mysqli_query($con,$selectquery5);
                        $result5 =mysqli_fetch_array($query5);
                        $t5=$result5['total'];
                        $count5 = $count5 + $t5;

                        $sql6 = "SELECT date FROM attendance where messid='$resid' and date between '$date-07-01' and '$date-07-31'";
                        $res6 = mysqli_query($con, $sql6);
                        $count6 = mysqli_num_rows($res6);
                        $selectquery6 = "SELECT SUM(plate) as total FROM  `order` where messid='$resid' and date between '$date-07-01' and '$date-07-31'";
                        $query6 = mysqli_query($con,$selectquery6);
                        $result6 =mysqli_fetch_array($query6);
                        $t6=$result6['total'];
                        $count6 = $count6  + $t6;

                        $sql7 = "SELECT date FROM attendance where messid='$resid' and date between '$date-08-01' and '$date-08-31'";
                        $res7 = mysqli_query($con, $sql7);
                        $count7 = mysqli_num_rows($res7);
                        $selectquery7 = "SELECT SUM(plate) as total FROM  `order` where messid='$resid' and date between '$date-08-01' and '$date-08-31'";
                        $query7 = mysqli_query($con,$selectquery7);
                        $result7 =mysqli_fetch_array($query7);
                        $t7=$result7['total'];
                        $count7 = $count7  + $t7;

                        $sql8 = "SELECT date FROM attendance where messid='$resid' and date between '$date-09-01' and '$date-09-31'";
                        $res8 = mysqli_query($con, $sql8);
                        $count8 = mysqli_num_rows($res8);
                        $selectquery8 = "SELECT SUM(plate) as total FROM  `order` where messid='$resid' and date between '$date-09-01' and '$date-09-31'";
                        $query8 = mysqli_query($con,$selectquery8);
                        $result8 =mysqli_fetch_array($query8);
                        $t8=$result8['total'];
                        $count8 = $count8  + $t8;

                        $sql9 = "SELECT date FROM attendance where messid='$resid' and date between '$date-10-01' and '$date-10-31'";
                        $res9 = mysqli_query($con, $sql9);
                        $count9 = mysqli_num_rows($res9);
                        $selectquery9 = "SELECT SUM(plate) as total FROM  `order` where messid='$resid' and date between '$date-10-01' and '$date-10-31'";
                        $query9 = mysqli_query($con,$selectquery9);
                        $result9 =mysqli_fetch_array($query9);
                        $t9=$result9['total'];
                        $count9 = $count9  + $t9;

                        $sql10 = "SELECT date FROM attendance where messid='$resid' and date between '$date-11-01' and '$date-11-31'";
                        $res10 = mysqli_query($con, $sql10);
                        $count10 = mysqli_num_rows($res10);
                        $selectquery10 = "SELECT SUM(plate) as total FROM  `order` where messid='$resid' and date between '$date-11-01' and '$date-11-31'";
                        $query10 = mysqli_query($con,$selectquery10);
                        $result10 =mysqli_fetch_array($query10);
                        $t10=$result10['total'];
                        $count10 = $count10 + $t10;

                        $sql11 = "SELECT date FROM attendance where messid='$resid' and date between '$date-12-01' and '$date-12-31'";
                        $res11 = mysqli_query($con, $sql11);
                        $count11 = mysqli_num_rows($res11);
                        $selectquery11 = "SELECT SUM(plate) as total FROM  `order` where messid='$resid' and date between '$date-12-01' and '$date-12-31'";
                        $query11 = mysqli_query($con,$selectquery11);
                        $result11 =mysqli_fetch_array($query11);
                        $t11=$result11['total'];
                        $count11 = $count11 + $t11;
                    ?>


          <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
  <div id="chart_div">
  <script type="text/javascript">

google.charts.load('current', {packages: ['corechart', 'bar']});
google.charts.setOnLoadCallback(drawStacked);

function drawStacked() {
    var data = google.visualization.arrayToDataTable([
         ['Element', 'Total Order', { role: 'style' }],
         ['January', <?php echo $count?>, 'Red'],            // RGB value
         ['February', <?php echo $count1?>, 'dark yellow'],            // English color name
         ['March', <?php echo $count2?>, 'green'],

       ['April', <?php echo $count3?>, 'dark red' ],
         ['May',<?php echo $count4?>, 'silver'],            // English color name
         ['June', <?php echo $count5?>, 'purple'],

       ['July', <?php echo $count6?>, 'Russet' ],
       ['August', <?php echo $count7?>, 'Orange'],            // RGB value
         ['September', <?php echo $count8?>, 'Dark blue'],            // English color name
         ['October', <?php echo $count9?>, 'Pink'],

       ['November', <?php echo $count10?>, 'Yellow' ],
       ['December', <?php echo $count11?>, 'Blue' ], // CSS-style declaration
      ]);

     
      var options = {'title':'Monthly Plate Count :'};
      var chart = new google.visualization.ColumnChart(document.getElementById('chart_div'));
      chart.draw(data, options);
    }
    
    </script>