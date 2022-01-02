<?php  
    if(!isset($_GET['city'])||!isset($_GET['date']) ){
        header("location:dailyOne.php?code=1");
    }


    require_once '../Database/database.php';
    require_once '../Database/converter.php';



    $query="SELECT * FROM prediksi WHERE Location = $_GET[city] AND Date ="." '$_GET[date]' ";
    $queryKota="SELECT * FROM kota";

    $db=new DB();
    $data=$db->executeSelectQuery($query);
    $kota=$db->executeSelectQuery($queryKota);
    if(count($data)==0){
        header("location:dailyOne.php?code=2&city=$_GET[city]");
    }
?>


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

    <!-- <link rel="stylesheet" href="../style/dwm.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">  -->
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
                <li><a href="mainWeather.php" class="active">Weather</a></li>
                <li><a href="mainPrediction.php">Prediction</a></li>
            </ul>
        </div>
    </nav>
    
    <!-- Searchbar -->
    <section class="main">
        <div class="container">
            <form action="#" class="monthly-pick search-d2" method="get">


            <select type="text" placeholder="  Search City" name="city" id=dropDownCity class="custom-sel" style="padding: 0.7rem 0;">
                <option  disabled selected value="-1">Search City</option>
                <?php  
                foreach($kota as $kolom){
                   ?>
                <option value= <?php  $id=$kolom['IdKota']; echo $id; if($id==$_GET['city']){echo" Selected";};    ?> > <?php echo $kolom['NamaKota'];  ?>  </option>
            

                <?php 
                }         
                ?>
                </select>

                <input type="date" name="date" class="dp" value="<?php echo $_GET['date'];?>">
                <button type="submit" class="btn-search-d2">SEARCH</button>
            </form>
        </div>
    </section>
    
    <section class="weather">
        <div class="w3-row">
            <div class="w3-container w3-half w3-center">
                <div class="w3-card-2 w3-round-xxlarge w3-hover-shadow" style="flex: 1; width: 70%; margin-left: auto; margin-right: auto; background-color: antiquewhite;">
                    <div class="w3-container header-morning-afternoon">
                        Morning
                    </div>
                    <div class="w3-container temp">
                        <div class="w3-row">
                            <div class="w3-half w3-center">
                                <p class="temp"> <?php echo $data[0]['Temp9am'] ?> &#8451</p>
                            </div>
                            <div class="w3-half w3-center">
                                <img src= <?php 
                                if($data[0]['RainToday']==0){
                                    echo "../assets/Logo.png";
                                }else{
                                    echo "../assets/Rain.png";
                                }
                                ?>     alt="Weather Condition" style="width: 7rem;">
                                <p class="temp-desc"><span class="lo-temp"><?php echo $data[0]['MinTemp'] ?> &#8451</span> / <span class="hi-temp"><?php echo $data[0]['MaxTemp'] ?> &#8451</span></p>
                            </div>
                            <div class="w3-container">
                                <p class="desc">Cloud : <span class="cloud-num"><?php echo $data[0]['Cloud9am'] ?></span></p>
                            </div>
                            <div class="w3-container">
                                <p class="desc">Rainfall : <span class="rf-num"><?php echo $data[0]['Rainfall'] ?></span> mm</p>
                            </div>
                            <div class="w3-container">
                                <p class="desc">Evaporation : <span class="eva-num"><?php echo $data[0]['Evaporation'] ?></span> mm</p>
                            </div>
                            <div class="w3-container">
                                <p class="desc">Sunshine : <span class="ss-num"><?php echo $data[0]['Sunshine'] ?></span> hour</p>
                            </div>
                            <div class="w3-container">
                                <p class="desc">WindSpeed : <span class="wsnum"><?php echo $data[0]['WindSpeed9am'] ?></span> km/h</p>
                            </div>
                            <div class="w3-container">
                                <p class="desc">WindDirection : <span class="wd-num"><?php  echo Converter::converter($data[0]['WindDir9am']) ?></span></p>
                            </div>
                            <div class="w3-container">
                                <p class="desc">Humidity : <span class="hum-num"><?php echo $data[0]['Humidity9am'] ?></span> %</p>
                            </div>
                            <div class="w3-container" style="padding-bottom: 2rem;">
                                <p class="desc">Pressure : <span class="pres-num"><?php echo $data[0]['Pressure9am'] ?></span> hpa</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="w3-container w3-half w3-center">
                <div class="w3-card-2 w3-round-xxlarge w3-hover-shadow" style="flex: 1; width: 70%; margin-left: auto; margin-right: auto; background-color: antiquewhite;">
                    <div class="w3-container header-morning-afternoon">
                        Afternoon
                    </div>
                    <div class="w3-container temp">
                        <div class="w3-row">
                            <div class="w3-half w3-center">
                                <p class="temp"><?php echo $data[0]['Temp3pm'] ?> &#8451</p>
                            </div>
                            <div class="w3-half w3-center">
                                <img src= <?php 
                                if($data[0]['RainToday']==0){
                                    echo "../assets/Logo.png";
                                }else{
                                    echo "../assets/Rain.png";
                                }
                                ?> alt="Weather Condition" style="width: 7rem;">
                                <p class="temp-desc"><span class="lo-temp">  <?php echo $data[0]['MinTemp'] ?> &#8451</span> / <span class="hi-temp"><?php echo $data[0]['MaxTemp'] ?> &#8451</span></p>
                            </div>
                            <div class="w3-container">
                                <p class="desc">Cloud : <span class="cloud-num"><?php echo $data[0]['Cloud3pm'] ?></span></p>
                            </div>
                            <div class="w3-container">
                                <p class="desc">Rainfall : <span class="rf-num"><?php echo $data[0]['Rainfall'] ?></span> mm</p>
                            </div>
                            <div class="w3-container">
                                <p class="desc">Evaporation : <span class="eva-num"><?php echo $data[0]['Evaporation'] ?></span> mm</p>
                            </div>
                            <div class="w3-container">
                                <p class="desc">Sunshine : <span class="ss-num"><?php echo $data[0]['Sunshine'] ?></span> hour</p>
                            </div>
                            <div class="w3-container">
                                <p class="desc">WindSpeed : <span class="wsnum"><?php echo $data[0]['WindSpeed3pm'] ?></span> km/h</p>
                            </div>
                            <div class="w3-container">
                                <p class="desc">WindDirection : <span class="wd-num"> <?php  echo Converter::converter($data[0]['WindDir3pm']) ?></span></p>
                            </div>
                            <div class="w3-container">
                                <p class="desc">Humidity : <span class="hum-num"><?php echo $data[0]['Humidity3pm'] ?></span> %</p>
                            </div>
                            <div class="w3-container" style="padding-bottom: 2rem;">
                                <p class="desc">Pressure : <span class="pres-num"><?php echo $data[0]['Pressure3pm'] ?></span> hpa</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </section>
    
    <footer>

    </footer>
</body>
</html>