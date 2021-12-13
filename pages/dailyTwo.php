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
                <li><a href="main.html" class="active">Weather</a></li>
                <li><a href="prediction.html">Prediction</a></li>
            </ul>
        </div>
    </nav>
    
    <!-- Searchbar -->
    <section class="main">
        <div class="container">
            <form action="#" class="search-d2" method="get">
                <input type="text" placeholder="  Search City" name="search-city" value="<?php $city ?>">
                <button type="button" class="bkn-btn"><i class="fa fa-map-marker"></i></button>
                <input type="date" name="date-picker-daily" class="dp" value="<?php $daily ?>">
                <button type="submit" class="btn-search-d2">SEARCH</button>
            </form>
        </div>
        <!-- Searchbar Ends-->
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
                                <p class="temp"><?php echo $tempMorning?> &#8451</p>
                            </div>
                            <div class="w3-half w3-center">
                                <img src="../assets/Logo.png" alt="Weather Condition" style="width: 7rem;">
                                <p class="temp-desc"><span class="lo-temp"><?php echo $tempMorningLo?> &#8451</span> / <span class="hi-temp"><?php echo $tempMorningHi?> &#8451</span></p>
                            </div>
                            <div class="w3-container">
                                <p class="desc">Cloud : <span class="cloud-num"><?php echo $morningCloud?></span></p>
                            </div>
                            <div class="w3-container">
                                <p class="desc">Rainfall : <span class="rf-num"><?php echo $morningRainfall?></span> mm</p>
                            </div>
                            <div class="w3-container">
                                <p class="desc">Evaporation : <span class="eva-num"><?php echo $morningEvap?></span> mm</p>
                            </div>
                            <div class="w3-container">
                                <p class="desc">Sunshine : <span class="ss-num"><?php echo $morningSun?></span> hour</p>
                            </div>
                            <div class="w3-container">
                                <p class="desc">WindSpeed : <span class="wsnum"><?php echo $morningWindSpeed?></span> km/h</p>
                            </div>
                            <div class="w3-container">
                                <p class="desc">WindDirection : <span class="wd-num"><?php echo $morningWindDir?></span></p>
                            </div>
                            <div class="w3-container">
                                <p class="desc">Humidity : <span class="hum-num"><?php echo $morningHumidty?></span> %</p>
                            </div>
                            <div class="w3-container" style="padding-bottom: 2rem;">
                                <p class="desc">Pressure : <span class="pres-num"><?php echo $morningPressure?></span> hpa</p>
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
                                <p class="temp">15.5 &#8451</p>
                            </div>
                            <div class="w3-half w3-center">
                                <img src="../assets/Logo.png" alt="Weather Condition" style="width: 7rem;">
                                <p class="temp-desc"><span class="lo-temp"><?php echo $tempAfternoonLo?> &#8451</span> / <span class="hi-temp"><?php echo $tempAfternoonHi?> &#8451</span></p>
                            </div>
                            <div class="w3-container">
                                <p class="desc">Cloud : <span class="cloud-num"><?php echo $AfternoonCloud?></span></p>
                            </div>
                            <div class="w3-container">
                                <p class="desc">Rainfall : <span class="rf-num"><?php echo $AfternoonRainfall?></span> mm</p>
                            </div>
                            <div class="w3-container">
                                <p class="desc">Evaporation : <span class="eva-num"><?php echo $AfternoonEvap?></span> mm</p>
                            </div>
                            <div class="w3-container">
                                <p class="desc">Sunshine : <span class="ss-num"><?php echo $AfternoonSunshine?></span> hour</p>
                            </div>
                            <div class="w3-container">
                                <p class="desc">WindSpeed : <span class="wsnum"><?php echo $AfternoonWindspeed?></span> km/h</p>
                            </div>
                            <div class="w3-container">
                                <p class="desc">WindDirection : <span class="wd-num"><?php echo $AfternoonWindDir?></span></p>
                            </div>
                            <div class="w3-container">
                                <p class="desc">Humidity : <span class="hum-num"><?php echo $AfternoonHumidity?></span> %</p>
                            </div>
                            <div class="w3-container" style="padding-bottom: 2rem;">
                                <p class="desc">Pressure : <span class="pres-num"><?php echo $AfternoonPressure?></span> hpa</p>
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