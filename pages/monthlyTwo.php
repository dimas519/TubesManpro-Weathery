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

    <div class="weather-box w3-card-4 w3-round-xxlarge">
        <div style="padding: 30px; margin-left: 30px;">
            <h2 style="font-family: rokkitt;">MONTHLY AVERAGE</h2>
            <h1 class="w3-center" style="font-family: rokkitt; font-size: 50px;">15.5˚C</h1>
            <p>Rainfall : 0.8 mm</p>
            <p>Evaporation : 1.6 mm</p>
            <p>Sunshine : 2.6 hour</p>
            <p>WindSpeed : 13 km/hr</p>
            <p>Humidity : 75 %</p>
            <p>Pressure : 1017.4 hpa </p>
        </div>
        <div class="w3-center" style="flex:1;">
            <img src="../assets/logo.png" width="200px" style="margin-top: 5rem;">
            <p style="font-size: 30px;">8.8˚C/ 15.9˚C</p>
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
                echo create_calendar($month,$year);
            }
            else{
                echo '<div class="calendar-title">February 2011</div>';
                echo create_calendar(02,2011);
            }

            function create_calendar($month,$year){
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
                    $calendar .= '<td><div class="calendar-date"> <b>'. $nth_day  . '</b> </div>
                                    <img src="../assets/Logo.png" class="calendar-image">
                                    <span class="calendar-temp">12.5˚C / 20.8˚C</span>
                                    </td>';
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

    <!-- Rainfall -->
    <div class="accor-bar">
        <button class="w3-btn w3-bar" onclick="showContent('rainfall')">
            <span class="w3-left">Rainfall </span>
            <i class="fa fa-angle-down w3-right"></i>
        </button>
    </div>
    <div id="rainfall" class="w3-container w3-hide">
    </div>
    <br>

    <!-- Humidity -->
    <div class="accor-bar">
        <button class="w3-btn w3-bar" onclick="showContent('humidity')">
            <span class="w3-left">Humidity </span>
            <i class="fa fa-angle-down w3-right"></i>
        </button>
    </div>
    <div id="humidity" class="w3-container w3-hide">
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
    </div>
    <br>

    <!-- Preasure -->
    <div class="accor-bar">
        <button class="w3-btn w3-bar" onclick="showContent('preasure')">
            <span class="w3-left">Preasure </span>
            <i class="fa fa-angle-down w3-right"></i>
        </button>
    </div>
    <div id="preasure" class="w3-container w3-hide">
    </div>
    <br>


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