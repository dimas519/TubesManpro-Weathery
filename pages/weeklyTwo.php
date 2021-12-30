<?php  
    if(!isset($_GET['city'])||$_GET['city']==-1 ||!isset($_GET['from']) ||!isset($_GET['to'])   ){
       header("location:weeklyOne.php?code=1");
    }


    require_once '../Database/database.php';
    require_once '../Database/converter.php';
    $query="SELECT * FROM prediksi WHERE Location=$_GET[city] and Date BETWEEN "." '$_GET[from]' AND "." '$_GET[to]' ";
    $db=new DB();
    $data=$db->executeSelectQuery($query);

    if(count($data)<7){
        header("location:weeklyOne.php?code=2&city=$_GET[city]");
    }
?>





<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style/global.css">
    <link rel="stylesheet" href="../style/index.css">
    <link rel="stylesheet" href="../style/dwm2.css">

    <link rel="stylesheet" href="../lib/w3.css">
    <link rel="stylesheet" href="../lib/font-awesome.css">

    

    
    <title>Document</title>
</head>
<body>

<style>
    canvas{
        -moz-user-select: none;
        -webkit-user-select: none;
        -ms-user-select: none;
    }
</style>








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

    <div class="container w3-center" style="margin-top: 10%;">
        <form action="#" class="search-d2" method="get">
            <input type="text" placeholder="  Search City" name="search-city">
            <button type="button" class="bkn-btn"><i class="fa fa-map-marker"></i></button>
            <input type="date" name="date-picker-daily" class="dp">
            <input type="date" name="date-picker-daily" class="dp">
            <button type="submit" class="btn-search-d2">SEARCH</button>
        </form>
    </div>

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
                <h2 style="font-family: rokkitt;">WEEKLY AVERAGE</h2>
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

                <!-- buttonnya -->
                <div class="accor-bar" style="margin-top:20px">
                    <button class="w3-btn w3-bar" onclick="javaScript:document.getElementById('day1').classList.toggle('w3-hide')">
                    <span class="w3-left">
                    Day to Day
                    </span>
                     <i class="fa fa-angle-down w3-right" ></i></button>
                </div>
                  
                <!-- isi -->
                <div id="day1" class ="w3-hide">
                    <div class="w3-row">
                        <div class="w3-col s2 empty"></div>
                        <?php  
                        $i=0;
                        for ($i=$i;$i<4;$i++){?>
                            <div class="w3-col s2 w3-center back w3-card-4 w3-margin w3-round-xlarge">
                                <?php  
                                $dateArr=getdate(strtotime($data[$i]['Date']));
                                ?>
                                <p><?php  echo $dateArr['weekday']; ?></p>
                                <p><?php  echo $dateArr['mday'];?></p>
                                <?php  
                                if($data[$i]['RainToday']==1){?>
                                    <img src="../assets/Logo.png" alt="" style="width:80px;">
                                <?php
                                    }else{
                                ?>
                                 <img src="../assets/Rain.png" alt="" style="width:80px;">
                                <?php }?>
                                <h4><?php $avg=(($data[$i]['Temp9am']+$data[$i]['Temp3pm'])/2); echo $avg;  ?> ˚C</h4>
                                <h5><?php echo $data[$i]['MinTemp']?>˚C / <?php echo $data[$i]['MaxTemp']  ?>˚C</h5>

                            </div>

                        <?php  } ?>
                    </div>
                                    
                    <div class="w3-row">
                        <div class="w3-col s3 empty"></div>
                        <?php   
                        for($i=$i;$i<7;$i++){?>
                        <div class="w3-col s2 w3-center back w3-card-4 w3-margin w3-round-xlarge">
                                <?php  
                                $dateArr=getdate(strtotime($data[$i]['Date']));
                                ?>
                                <p><?php  echo $dateArr['weekday']; ?></p>
                                <p><?php  echo $dateArr['mday'];?></p>
                                <?php  
                                if($data[$i]['RainToday']==1){?>
                                    <img src="../assets/Logo.png" alt="" style="width:80px;">
                                <?php
                                    }else{
                                ?>
                                 <img src="../assets/Rain.png" alt="" style="width:80px;">
                                <?php }?>
                                <h4><?php $avg=(($data[$i]['Temp9am']+$data[$i]['Temp3pm'])/2); echo $avg;  ?> ˚C</h4>
                                <h5><?php echo $data[$i]['MinTemp']?>˚C / <?php echo $data[$i]['MaxTemp']  ?>˚C</h5>

                            </div>

                            <?php  } ?>
                    </div>
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



    




    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
