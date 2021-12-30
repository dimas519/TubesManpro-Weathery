
<?php  
    if(!isset($_GET['city'])||$_GET['city']==-1 || !isset($_GET['month']) || !isset($_GET['year']) ){
        header("location:monthluOne.php?code=1");
    }


    require_once '../Database/database.php';
    $query="SELECT * FROM prediksi WHERE Date LIKE '$_GET[year]-$_GET[month]-%%' AND Location=$_GET[city]";
    $db=new DB();
    $data=$db->executeSelectQuery($query);


    if(count($data)==0){
        header("location:monthlyOne.php?code=2&city=$_GET[city]");
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Daily</title>
    <link rel="stylesheet" href="../lib/w3.css">
    <link rel="stylesheet" href="../lib/font-awesome.css">
    <link rel="stylesheet" href="../style/global.css">
    <link rel="stylesheet" href="../style/dwm.css">
    <link rel="stylesheet" href="../style/dwm2.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="../js/Chart.bundle.js"></script>
    <script src="../js/utils.js"></script>

    <style type="text/css">
        .calendar-table {
            table-layout: fixed;
            width: 900px;
            height: 700px;
            border-collapse: collapse;
            margin: auto;
        }

        .calendar-table th {
            text-align: center;
        }

        .calendar-table td {
            border: 1px solid black;
            background-color: #F4EBE1;
        }

        .calendar-date {
            padding: 10px;
            vertical-align: top;
        }

        .calendar-image {
            width: 70px;
            display: block;
            margin: auto;
        }

        .calendar-temp {
            display: block;
            text-align: center;
            padding: 10px;
        }

        .calendar-title {
            font-size: 40px;
            font-weight: 700;
            text-align: center;
            padding: 20px;
        }

    </style>

</head>
<body>
    <!-- Header -->
    <nav class="navbar w3-top w3-container">
        <div style="flex: 1;">
            <img class="navbar-logo" src="../assets/Logo.png" width="100px">
                <span>Weathery</span>
        </div>
        <div style="flex: 1;  margin-top: 20px;">
            <ul>
                <li><a href="../index.html">Home</a></li>
                <li><a href="main.html" class="active">Weather</a></li>
                <li><a href="prediction.html">Prediction</a></li>
            </ul>
        </div>
    </nav>

    <section class="main" >
        <div class="container">
            <form action="monthlyTwo.php" class="search-d2" method="get">
                <input type="text" placeholder="  Search City" name="search-city" style="margin: 5px;">
                <button type="button" class="bkn-btn"><i class="fa fa-map-marker"></i></button>
                <form action="monthlyTwo.php" class="monthly-pick" method="get">
                    <select name="month" id="dd_month" class="custom-sel" style="margin: 5px;" >
                        <option disabled selected> Month </option>
                        <option value="1">January</option>
                        <option value="2">February</option>
                        <option value="3">March</option>
                        <option value="4">April</option>
                        <option value="5">May</option>
                        <option value="6">June</option>
                        <option value="7">July</option>
                        <option value="8">August</option>
                        <option value="9">September</option>
                        <option value="10">October</option>
                        <option value="11">November</option>
                        <option value="12">December</option>
                    </select>
                    <select name="year" id="dd_year" class="custom-sel" style="margin: 5px;">
                        <option disabled selected> Year </option>
                        <option value="2008">2008</option>
                        <option value="2009">2009</option>
                        <option value="2010">2010</option>
                        <option value="2011">2011</option>
                        <option value="2012">2012</option>
                        <option value="2013">2013</option>
                        <option value="2014">2014</option>
                        <option value="2015">2015</option>
                        <option value="2016">2016</option>
                        <option value="2017">2017</option>
                    </select>
                <button type="submit" class="btn-search-d2" style="margin: 5px;">SEARCH</button>
                </form>
            </form>     
        </div>
    </section>



    <?php  
        $temp3=0;
        $temp9=0;
        $rf=0;
        $eva=0;
        $windSpeed=0;
        $humi=0;
        $press=0;
        $sunshine=0;
        $i=0;
        foreach ($data as $row){
            $temp3+=$row['Temp3pm'];
            $temp9+=$row['Temp9am'];
            $rf+=$row['Rainfall'];
            $eva+=$row['Evaporation'];
            $windSpeed+=(($row['WindSpeed3pm']+$row['WindSpeed9am'])/2);
            $humi+=(($row['Humidity3pm']+$row['Humidity9am'])/2);
            $press+=(($row['Pressure3pm']+$row['Pressure9am'])/2);
            $sunshine+=$row['Sunshine'];
            $i++;
        }
        ?>

    <div class="weather-box w3-card-4 w3-round-xxlarge">
        <div style="padding: 30px; margin-left: 30px;">
            <h2 style="font-family: rokkitt;">MONTHLY AVERAGE</h2>
            <h1 class="w3-center" style="font-family: rokkitt; font-size: 50px;"><?php  echo round((($temp3/$i+$temp9/$i)/2),2) ?> ˚C</h1>
                <p>Rainfall : <?php echo round(($rf/$i),2)  ?> mm</p>
                <p>Evaporation : <?php echo $eva/$i  ?> mm</p>
                <p>Sunshine : <?php echo $sunshine/$i  ?> hour</p>
                <p>WindSpeed : <?php echo round(($windSpeed/$i),2)  ?> km/hr</p>
                <p>Humidity : <?php echo round(($humi/$i),2)  ?> %</p>
                <p>Pressure : <?php echo round(($press/$i),2)  ?> hpa </p>
        </div>
            <div class="w3-center" style="flex:1;">
                <img src="../assets/logo.png" width="200px" style="margin-top: 5rem; ">
                <p style="font-size: 30px;"><?php  echo round(($temp9/$i),2) ?> ˚C/ <?php  echo round(($temp3/$i),2) ?> ˚C</p>
            </div>
    </div>


    <!-- Calendar -->
    <div class="accor-bar">
        <button class="w3-btn w3-bar" onclick="showContent('calendar')">
            <span class="w3-left">Calendar </span>
            <i class="fa fa-angle-down w3-right"></i>
        </button>
    </div>
    <div id="calendar" class="w3-container w3-hide">
        <?php
            if (isset($_GET['month']) && isset($_GET['year'])) {
                $month = $_GET['month'];
                $year = $_GET['year'];     
                $monthName = date('F', mktime(0, 0, 0, $month, 10));
                echo '<div class="calendar-title">'. $monthName .' '. $year .'</div>';
                echo create_calendar($month,$year,$data);
            }
            else{
                echo '<div class="calendar-title">February 2011</div>';
                echo create_calendar(02,2011,null);
            }

            function create_calendar($month,$year,$data){
                $calendar = '<table class="calendar-table">';
                $days = array('Sunday','Monday','Tuesday','Wednesday','Thursday','Friday','Saturday');
                $calendar .= '<tr><th>' .implode('</th><th>', $days).'</th></tr>';
                
                $day = date('w',mktime(0,0,0,$month,1,$year)); //tanggal 1 di hari apa
                $all_days = date('t',mktime(0,0,0,$month,1,$year)); //total tanggal di bulan tsb
                $date = 1;

                $calendar .= '<tr>'; 
                for($i=0; $i < $day; $i++){ //print kotak kosong awal
                    $calendar .= '<td> </td>';
                    $date++;
                }

                for($nth_day=1; $nth_day <= $all_days; $nth_day++){ //print kotak tanggal
                    $calendar .= '<td><div class="calendar-date"> <b>'. $nth_day  . '</b> </div>';

                    if($data[$nth_day-1]['RainToday']==0){
                        $calendar .= '<img src="../assets/Logo.png" class="calendar-image">';
                    }else{
                        $calendar .= '<img src="../assets/Rain.png" class="calendar-image">';
                    }
                    $minTemp=$data[$nth_day-1]['MinTemp'];
                    $maxTemp=$data[$nth_day-1]['MaxTemp'];
                    $calendar .= " <span class='calendar-temp'> $minTemp ˚C /  $maxTemp ˚C</span></td>";

                

                    if($day == 6){
                        $calendar.= '</tr>';
                        if($date != $all_days){
                            $calendar .= '<tr>';
                            $day = 0;
                        }
                    }
                    else{
                        $day++;
                    } 
                }

                for($i=1; $i < 8-$day; $i++){ //print kotak kosong akhir
                    $calendar .= '<td> </td>';
                }

                $calendar.= '</tr>';
                $calendar .= '</table>';

                return $calendar;
            }
        ?>
    </div>
    <br>


 <!-- helper chart -->
 <?php  
        foreach ($data as $row){
        ?>
        <p class="chartDate w3-hide"> <?php  echo $row['Date'] ?></p>
        <p class="chartRainFall w3-hide"><?php echo $row['Rainfall']  ?></p>
        <p class="chartMinTemp w3-hide"><?php echo $row['MinTemp']  ?></p>
        <p class="chartMaxTemp w3-hide"><?php echo $row['MaxTemp']  ?></p>
        <p class="chartSunshine w3-hide"><?php echo $row['Sunshine']  ?></p>
        <p class="chartEvaporation w3-hide"><?php echo $row['Evaporation']  ?></p>
        <?php  } ?>


     <!-- Rainfall -->
     <div class="accor-bar">
                <button class="w3-btn w3-bar" onclick="showContent('rainfall')">
                    <span class="w3-left">Rainfall </span>
                    <i class="fa fa-angle-down w3-right"></i>
                </button>
            </div>
            <div id="rainfall" class="w3-container w3-hide">
                <div style="width: 50%;margin-left:25rem">
                    <canvas  id="canvasRainfall"></canvas>
                </div>
            </div>
            <br>

            <!-- Humidity -->
            <div class="accor-bar">
                <button class="w3-btn w3-bar" onclick="showContent('humidity')">
                    <span class="w3-left">Min- Max Temperature </span>
                    <i class="fa fa-angle-down w3-right"></i>
                </button>
            </div>
            <div id="humidity" class="w3-container w3-hide">
            <div style="width: 50%;margin-left:25rem">
                    <canvas id="canvasMinMax"></canvas>
                    <canvas id="canvasMaxMax"></canvas>
                </div>
            </div>
            <br>

            <!-- Sunshine -->
            <div class="accor-bar">
                <button class="w3-btn w3-bar" onclick="showContent('sunshine')">
                    <span class="w3-left">Sunshine </span>
                    <i class="fa fa-angle-down w3-right"></i>
                </button>
            </div>
            <div id="sunshine" class="w3-container w3-hide">
                <div style="width: 50%;margin-left:25rem">
                    <canvas id="canvasSunshine"></canvas>
                </div>
            </div>
            <br>

            <!-- Preasure -->
            <div class="accor-bar">
                <button class="w3-btn w3-bar" onclick="showContent('preasure')">
                    <span class="w3-left">Evaporation </span>
                    <i class="fa fa-angle-down w3-right"></i>
                </button>
            </div>
            <div id="preasure" class="w3-container w3-hide">
                <div style="width: 50%;margin-left:25rem">
                    <canvas id="canvasEvaporation"></canvas>
                </div>
            </div>
    <br>

    </div>
        </div>

    </div>


    <script src="../js/ChartBuilder.js"></script>
    <script>
        buildRainfall();
        buildMinTemp();
        buildMaxTemp();
        buildSunshine();
        buildEvaporation();
    </script>


    <script type="text/javascript">
        function showContent(id) {
            var x = document.getElementById(id);
            if(x.className.indexOf("w3-show") == -1){ 
                x.className += " w3-show";
            }
            else{ 
                x.className = x.className.replace(" w3-show", "");
            }
        }
    </script>
</body>
</html>