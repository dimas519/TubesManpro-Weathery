<html lang="en">
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
   
        <!-- Header -->
    


    <div class="">


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

<br><br><br>    <br><br>



    <div class="container w3-center">
            <form action="#" class="search-d2" method="get">
                <input type="text" placeholder="  Search City" name="search-city">
                <button type="button" class="bkn-btn"><i class="fa fa-map-marker"></i></button>
                <input type="date" name="date-picker-daily" class="dp">
                <input type="date" name="date-picker-daily" class="dp">
                <button type="submit" class="btn-search-d2">SEARCH</button>
            </form>
        </div>





        <!-- <div class="">
            <form action="" class="w3-center search-d2">
                <div class="w3-row ">
                    <div class="w3-col s4 empty"></div>
                    <div class=" ">
                        <div >
                            <select name="kota" id="kota" class="w3-input w3-padding">
                                AMBIL DARI DB

                                example 
                                 <option value="id0">Adelaide</option>
                                <option value="id1">Sydney</option>
                            </select>
                        </div>
                        
                        <div class="">
                            <input type="date" name="from" id="from" class="dp">
                        </div>
                        <div style="margin-left: 0px !important;">
                            <input type="date" name="to" id="to" class=" dp">
                        </div>
                    </div>
                    <div class="w3-col s1 ">
                        <input type="submit" value="SEARCH" class="btn-search-d2">

                    </div>


                </div>
            </form> 



                <br><br>
              
            <div>  -->
                <br><br>




                <!-- buttonnya -->
                <div class="accor-bar">
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
                                <p>Monday</p>
                                <p>18</p>
                                <?php  
                                if(true){?>
                                    <img src="../assets/Logo.png" alt="" style="width:80px;">
                                <?php  
                                    }else{


                                    
                                        
                                    }?>
                                <h4>15.5 C</h4>
                                <h5>8.8/15.9</h5>

                            </div>

                        <?php  } ?>
                    </div>
                                    
                    <div class="w3-row">
                        <div class="w3-col s3 empty"></div>
                        <?php   
                        for($i=$i;$i<7;$i++){
                        ?>
                        <div class="w3-col s2 w3-center back w3-card-4 w3-margin w3-round-xlarge">
                                <p>Monday</p>
                                <p>18</p>
                                <?php  
                                if(true){?>
                                    <img src="../assets/Logo.png" alt="" style="width:80px;">
                                <?php  
                                    }else{


                                    
                                        
                                    }?>
                                <h4>15.5 C</h4>
                                <h5>8.8/15.9</h5>

                            </div>

                            <?php  } ?>
                    </div>
                </div>


                <br>
            <div class="accor-bar">
                <button class="w3-btn w3-bar" onclick="showContent('calendar')">
                    <span class="w3-left">Rainfall </span>
                    <i class="fa fa-angle-down w3-right"></i>
                </button>
            </div>
            <div id="calendar" class="w3-container w3-hide">
            </div>

            <br>
                <div class="accor-bar">
                <button class="w3-btn w3-bar" onclick="showContent('calendar')">
                    <span class="w3-left">Humidity </span>
                    <i class="fa fa-angle-down w3-right"></i>
                </button>
            </div>
            <div id="calendar" class="w3-container w3-hide">
            </div>

            <br>
                <div class="accor-bar">
                <button class="w3-btn w3-bar" onclick="showContent('calendar')">
                    <span class="w3-left">Sushine </span>
                    <i class="fa fa-angle-down w3-right"></i>
                </button>
            </div>
            <div id="calendar" class="w3-container w3-hide">
            </div>

            <br>
                <div class="accor-bar">
                <button class="w3-btn w3-bar" onclick="showContent('calendar')">
                    <span class="w3-left">Preasure </span>
                    <i class="fa fa-angle-down w3-right"></i>
                </button>
            </div>
            <div id="calendar" class="w3-container w3-hide">
            </div>







            </div>
        </div>

    </div>









    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>